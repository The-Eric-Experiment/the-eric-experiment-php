<?php
$pageTitle = $this->e($site_name);
if ($title) {
    $pageTitle .= ' | ' . $title;
}
?>

<html>

<head>
    <title><?= $pageTitle; ?></title>
    <?= $this->section('seo'); ?>
</head>

<body bgcolor="#000000" background="/public/dark-wood.gif" text="#ffffff" link="lime" vlink="#ffbf00" alink="#ffbf00">
    <?php $this->insert('_header') ?>
    <?= $this->section('content') ?>
    <center>
        <br><img src="/public/nothing.gif" height="4"><br>
        <img src="/public/linecolor.gif"><br>
        <img src="/public/nothing.gif" height="4">
        <br>
        Copyright &copy; 1988-<?= date("Y") ?> The Eric Experiment
        <br>
        <img src="/public/logo-tiny.gif"><br>
        <img src="/public/skyline.gif">
    </center>
    <script>
        if (document.querySelector) {

            eval(
                "(function() {" +
                "function loadScript(url) {" +
                "return new Promise((resolve, reject) => {" +
                "let script = document.createElement('script');" +
                "script.type = 'text/javascript';" +
                "script.src = url;" +
                "script.onload = () => resolve();" +
                "script.onerror = () => reject(new Error('Script load error: ' + url));" +
                "document.head.appendChild(script);" +
                "});" +
                "}" +

                // Usage:
                "loadScript('/dist/js/client.js')" +
                ".then(() => {" +
                "console.log('Script loaded successfully!');" +
                "})" +
                ".catch((error) => {" +
                "console.error(error);" +
                "});" +
                "})();"
            );
        }
    </script>

</body>

</html>