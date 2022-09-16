<?php $this->layout(withVariant('layout'), []); ?>
<?php $this->push('seo'); ?>
<meta name="description" content="This is the website where you can check out the projects I have worked on, the stuff I have been attempting and more.">
<meta name="keywords" content="Retro gaming, Retro computing, Windows 3.11, Windows 3.x, DOS, MS-DOS, Playstation, Dreamcast, Mega Drive, Nintendo Gameboy, Nintendo 64">
<link rel="canonical" href="http://www.theericexperiment.com/" />
<?php $this->end(); ?>

<div class="content">
  <div class="home-section">
    <div class="home-column">
      <?php $this->insert('modern::intro', ['intro' => $intro]); ?>
    </div>
    <div class="home-column">
      <?php $this->insert('modern::site-news', []); ?>
    </div>
  </div>

  <div class="lemmings-bar home-separator"></div>
  <div class="posts-section">
    <div class="left-side">
      <?php $this->insert('modern::post-list', ['title' => 'Latest Parts of the Experiment', 'posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page, 'custom_next_link' => ['url' => '/posts?page=1', 'icon' => '/templates/retro/public/more_md_wht.gif']]); ?>
    </div>
    <?php $this->insert('modern::side-content'); ?>
  </div>

  <!-- Start Old'aVista Banner Code -->
  <p style="width: 100%; text-align: center; margin-top: 1rem;">
    <a href="http://www.oldavista.com/" rel="embed-banner" title="Old'aVista: The most powerful guide to the OLD internet!">
      <img src="//www.oldavista.com/public/banner.gif" width="468" height="60" border="0">
    </a>
  </p>
  <!-- End Old'aVista Banner Code -->
</div>