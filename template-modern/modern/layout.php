<?php
$pageTitle = $this->e($siteName);
if ($title) {
    $pageTitle .= ' | '.$title;
}
require_once getRequirePath('/engine/analytics.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Eric Mackrodt">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pageTitle; ?>
    </title>
    <link rel="stylesheet" href="/templates/modern/css/modern.css?bust=3" />
    <script>
        if (!!window.fetch && !window.location.protocol.includes("https") && !window.location.host.includes("localhost") && !window.location.host.includes("192.168.1.60")) {
            window.location = window.location.href.replace("http://", "https://")
        }
    </script>
    <?= $this->section('seo'); ?>
</head>

<body>
    <div id="root">
        <div id="website">
            <?php $this->insert('modern::page-header', ['mainMenu' => $mainMenu]); ?>
            <section id="page">
                <?= $this->section('content'); ?>
                <?php if ($showSideContent) : ?>
                    <?php $this->insert('modern::side-content'); ?>
                <?php endif; ?>
            </section>
        </div>
        <div class="earth-container">
            <div class="earth">
                <img src="/templates/modern/public/skyline.gif" class="skyline">
            </div>
            <footer>
                <?php $this->insert('modern::tags'); ?>
                <div class="footer-row">
                    <div class="footer-row-crazy-separator">
                        <div class="left">
                            <img src="/templates/modern/public/ani_raptor.gif">
                        </div>
                        <div class="right">
                            <img src="/templates/modern/public/cat.gif">
                        </div>
                    </div>
                </div>
                <div class="footer-row">                          
                    <div class="webring">
                        <a id="theoldnet-webring-href" href="//webring.theoldnet.com/widget/a7b5c3bea8b50d7b4b97caab2eee15c1/navigate" data-website-id="a7b5c3bea8b50d7b4b97caab2eee15c1"><img src="//webring.theoldnet.com/widget/a7b5c3bea8b50d7b4b97caab2eee15c1/image" alt="The Eric Experiment" border="0"></a><br>
                            Proud member of <a href="//webring.theoldnet.com/"><b>TheOldNet</b></a> webring! Check some other cool websites!<br>
                            [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/previous/navigate">Previous site</a>] -
                            [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/random/navigate">Random site</a>] -
                            [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/next/navigate">Next site</a>]
                        <script async type="text/javascript" src="//webring.theoldnet.com/widget/widget.js"></script>
                    </div>
                </div>
                <div class="footer-row">                          
                    <div class="webring">
                        <img src="//geekring.net/banner/geek_1.jpg" alt="geekring.net nvigation" usemap="#geekringmap">
                        <map name="geekringmap">
                            <area shape="rect" coords="9,28,111,53" alt="Previous geekring site" href="http://geekring.net/site/208/previous">
                            <area shape="rect" coords="248,28,350,53" alt="Random geekring site" href="http://geekring.net/site/208/random">
                            <area shape="rect" coords="490,28,592,53" alt="Next geekring site" href="http://geekring.net/site/208/next">
                            <area shape="rect" coords="465,6,566,22" alt="Main geekring site" href="http://geekring.net/">
                        </map>
                    </div>
                </div>
                <div class="footer-row">
                    <div id="compatibility-content">
                        <a href="/windows3x/essentialsoftware#netscapecommunicator407"><img src="/templates/modern/public/netscap4.gif" alt="Compatible with Netscape" /></a>
                        <a href="/windows3x/essentialsoftware#internetexplorer501"><img src="/templates/modern/public/ie.gif" width="88" height="31" alt="Compatible with IE" /></a>
                        <img src="/templates/modern/public/800x600.gif">
                        <img src="/templates/modern/public/frontpg.gif">
                        <a href="/windows3x/essentialsoftware#mirc591"><img src="/templates/modern/public/mircban.gif"></a>
                        <a href="http://www.theoldnet.com/#frombadge" title="Are you tired of this new Internet yet? Time to Get TheOldNet!" target="_blank">
                            <img src="//theoldnet.com/images/theoldnetanimblur2.gif" width="88" height="31" border=0>
                        </a>
                        <!-- Start Old'aVista Button Code -->
                        <a href="http://www.oldavista.com/" rel="embed-button" title="Old'aVista: The most powerful guide to the OLD internet!">
                            <img src="//www.oldavista.com/public/button.gif" width="88" height="31" border="0">
                        </a>
                        <!-- End Old'aVista Button Code -->
                    </div>
                </div>
                <div class="footer-row">
                    Copyright © 1988-2021 The Eric Experiment
                </div>
                <div class="footer-row">
                    <img src="/templates/modern/public/neon.gif">
                </div> 
            </footer>
        </div>
    </div>
    <div class="icons">
    </div>
    <script src="/templates/modern/js/client.js?b=1"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://the-eric-experiment.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</body>

</html>