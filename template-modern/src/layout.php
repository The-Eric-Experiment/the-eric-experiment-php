<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Eric Mackrodt">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->e($siteName) ?>
        <?php if ($title) : ?>
            | <?= $title ?>
        <?php endif; ?>
    </title>
    <link rel="stylesheet" href="/templates/modern/css/modern.css" />
    <script>
        if (!!window.fetch && !window.location.protocol.includes("https") && !window.location.host.includes("localhost")) {
            window.location = window.location.href.replace("http://", "https://")
        }
    </script>
    <?= $this->section('seo') ?>
</head>

<body>
    <div id="root">
        <div id="website">
            <header>
                <div id="logo-container">
                    <a class="logo-link" href="/">
                        <img id="logo" src="/templates/modern/public/logo.png" title="Logo" />
                    </a>
                </div>
                <?php $this->insert('modern::main-menu') ?>
            </header>
            <section id="page">
                <?= $this->section('content') ?>
                <?php if ($showSideContent) : ?>
                    <?php $this->insert('modern::side-content') ?>
                <?php endif; ?>
            </section>
            <footer>
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
                <?php $this->insert('modern::tags') ?>
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
                <div class="footer-row">
                    <img src="/templates/modern/public/skyline.gif">
                </div>
            </footer>
        </div>
    </div>
    <script async src="/templates/modern/js/client.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1B8B8NBRJD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-1B8B8NBRJD');
    </script>

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