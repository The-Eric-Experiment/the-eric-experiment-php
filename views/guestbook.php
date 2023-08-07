<?php
require_once __DIR__ . '/../engine/load.php';
require_once __DIR__ . '/../engine/http.php';

session_start();

$pg = $_GET['p'] ?? '1';

$page = (int) $pg;

$form_errors = [];

$guestbook_service_url = getenv('GUESTBOOK_SERVICE_URL', true) ?: getenv('GUESTBOOK_SERVICE_URL');

function generateFieldNames() {
    $baseNames = ['name', 'email', 'message', 'phone', 'address', 'zip_code', 'country', 'city', 'birthdate', 'gender', 'nick', 'captcha'];
    $shuffledNames = $baseNames;
    shuffle($shuffledNames);

    $fieldNames = [];
    for ($i = 0; $i < count($baseNames); $i++) {
        $fieldNames[$baseNames[$i]] = $shuffledNames[$i];
    }

    return $fieldNames;
}

function getDayOfMonth() {
    // Step 1: Create a DateTimeZone object for the West Coast (Pacific Time)
    $westCoastTimeZone = new DateTimeZone('America/Los_Angeles');

    // Step 2: Create a DateTime object with the current date and the West Coast timezone
    $currentDate = new DateTime('now', $westCoastTimeZone);

    // Step 3: Extract the day of the month as an integer
    return (int) $currentDate->format('j');
}


function generateCaptchaValue() {
    return rand(1000, 9999);
}

// Process the submitted comment form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nick = trim($_POST[$_SESSION['fieldNames']['name']]);
    $message = trim($_POST[$_SESSION['fieldNames']['message']]);
    $captcha = $_POST[$_SESSION['fieldNames']['captcha']];

    
    if (!isset($nick) || ($nick == '')) {
        $form_errors[] = 'You need to enter your name/nickname/handle.';
    }

    if (strlen($nick) < 3 || strlen($message) < 3) {
        $form_errors[] = "Nickname and message must be at least 3 characters long.";
    }

    if (!isset($captcha) || ($captcha == '') || strcasecmp($captcha, $_SESSION['captchaValue'] + getDayOfMonth()) != 0) {
        $form_errors[] = "Incorrect security code. We need to make sure you're a human.";
    }
    
    if (!isset($message) || ($message == '')) {
        $form_errors[] = "You need to enter your message, otherwise what's the point?";
    }
    
    if (isset($message) && strlen($message) > 500) {
        $form_errors[] = 'You have exceeded the 500 character limit for your message.';
    }
    
    $isUrl = isset($message) && preg_match('/https?:\/\/([^\.]+\.)?[^\.]+\.[^\/\.]{2,4}[\/]?/', $message, $output_array);
    
    if ($isUrl !== false) {
        $form_errors[] = 'URLs are not permitted in the guestbook message.';
    }
    
    if (empty($form_errors)) {
        $ip = getRemoteIP();
        $userAgent = getUserAgent();

        $user_search_url = 'http://'.$guestbook_service_url.'/v1/guestbook/ericexperiment.com';
        $resp = http_request($user_search_url, 'POST', ['message' => $message, 'ip' => $ip, 'userAgent' => $userAgent, 'nickname' => $nick]);

        if ($resp['status'] === 400) {
            foreach ($resp['data'] as $item) {
                if (isset($item)) {
                    $form_errors[] = $item;
                }
            }
        }
    }
} else {
    require_once 'engine/analytics.php';
}

// Generate field names
$fieldNames = generateFieldNames();
$_SESSION['fieldNames'] = $fieldNames;

$_SESSION['captchaValue'] = generateCaptchaValue();

// Fetch existing comments for the current slug
$guestbook_list_url = 'http://'.$guestbook_service_url.'/v1/guestbook/ericexperiment.com?page='.(string) $page;
$response = http_request($guestbook_list_url, 'GET');

$num_results = count($response['data']['messages']);

$templates->registerFunction('getFieldName', function ($name) use ($fieldNames) {
    return $fieldNames[$name];
});

$templates->registerFunction('getBrowserInfo', function (string $ua) {
    $uaResult = new WhichBrowser\Parser($ua);

    return $uaResult->toString();
});

$templates->registerFunction('getPageUrl', function ($pg) {
    $query = $_GET;
    // replace parameter(s)
    $query['p'] = (string) $pg;
    // rebuild url
    $query_result = http_build_query($query);

    $url_parts = parse_url($_SERVER['REQUEST_URI']);
    $constructed_url = $url_parts['path'].'?'.$query_result;

    // new link
    return $constructed_url;
});

$templates->registerFunction('formatDate', function ($input) {
    // YUCK
    $transformed_date = preg_replace('/\.[0-9]+Z$/', 'Z', $input);

    return date('d/m/y g:i A', strtotime($transformed_date));
});

render('guestbook', [
  'message_list' => $response['data']['messages'],
  'num_results' => $num_results,
  'page' => $page,
  'nick' => $nick,
  'message' => $message,
  'pages' => $response['data']['pages'],
  'success' => $success,
  'is_spam' => $is_spam,
  'has_been_sent' => $has_been_sent,
  'has_errors' => $has_errors,
  'form_errors' => $form_errors,
]);