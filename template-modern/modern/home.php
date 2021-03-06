<?php $this->layout(withVariant('layout'), ['showSideContent' => true]) ?>
<?php $this->push('seo') ?>
<meta name="description" content="This is the website where you can check out the projects I have worked on, the stuff I have been attempting and more.">
<meta name="keywords" content="Retro gaming, Retro computing, Windows 3.11, Windows 3.x, DOS, MS-DOS, Playstation, Dreamcast, Mega Drive, Nintendo Gameboy, Nintendo 64">
<link rel="canonical" href="http://www.theericexperiment.com/" />
<?php $this->end(); ?>

<div class="content">
  <div class="home-section">
    <div class="home-column">
      <div id="welcome">
        <div class="profile">
          <div class="avatar">
            <img src="/templates/modern/public/profile.jpg" alt="MEEEEE!!!">
          </div>
        </div>
        <div class="content">
          <img src="/templates/modern/public/welcome.gif">
          <?= $intro ?>
        </div>
      </div>
      <div>
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
      </div>
      <div>
        <p><b>What's up with this website?</b> Check out why this website looks like this. <a href="/about-me#whatsupwiththiswebsite"><img src="/templates/modern/public/more.gif"></a></p>
        <p>
          Yes, you can run this on old browsers such as <a href="/windows3x/essentialsoftware#netscapecommunicator407">Netscape 4</a>.
        </p>
      </div>
    </div>
    <div class="home-column">
      <?php $this->insert('modern::site-news', []) ?>
    </div>
  </div>

  <div class="lemmings-bar home-separator"></div>
  <h1>Latest parts of the experiment</h1>
  <?php $this->insert('modern::post-list', ['posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page, 'custom_next_link' => ['url' => '/posts?page=1', 'icon' => '/templates/retro/public/more_md_wht.gif']]) ?>
  <!-- Start Old'aVista Banner Code -->
  <p style="width: 100%; text-align: center; margin-top: 1rem;">
    <a href="http://www.oldavista.com/" rel="embed-banner" title="Old'aVista: The most powerful guide to the OLD internet!">
      <img src="//www.oldavista.com/public/banner.gif" width="468" height="60" border="0">
    </a>
  </p>
  <!-- End Old'aVista Banner Code -->
</div>