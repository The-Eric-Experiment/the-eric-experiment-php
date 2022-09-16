<?php $this->layout('modern::window', ['hide_titlebar' => true]); ?>
<div id="welcome">
    <div class="profile">
        <div class="avatar">
            <img src="/templates/modern/public/profile.jpg" alt="MEEEEE!!!">
        </div>
    </div>
    <div class="intro-content">
        <img src="/templates/modern/public/welcome.gif">
        <?= $intro; ?>
    </div>
    <div class="social-icons">
        <a href="https://twitter.com/ericmackrodt" target="_blank" class="social-icon twitter">
        </a>

        <a href="https://www.facebook.com/ericmackrodt" target="_blank" class="social-icon facebook">
        </a>

        <a href="https://www.youtube.com/c/TheEricExperiment?sub_confirmation=1" target="_blank" class="social-icon youtube">
        </a>

        <a href="https://github.com/ericmackrodt" target="_blank" class="social-icon github">
        </a>

        <a href="https://www.instagram.com/ericmackrodt/" target="_blank" class="social-icon instagram">
        </a>

        <a href="https://www.linkedin.com/in/ericmackrodt/" target="_blank" class="social-icon linkedin">
        </a>
    </div>
    <p><b>What's up with this website?</b> Check out why this website looks like this. <a href="/about-me#whatsupwiththiswebsite"><img src="/templates/modern/public/more.gif"></a></p>
    <p>
        Yes, you can run this on old browsers such as <a href="/windows3x/essentialsoftware#netscapecommunicator407">Netscape 4</a>.
    </p>
</div>