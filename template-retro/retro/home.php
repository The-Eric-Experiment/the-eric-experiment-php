<?php $this->layout(withVariant('layout'), []) ?>

<center>
  <table cellspacing="5" cellpadding="0" border="0" width="610">
    <tr>
      <td valign="top" width="50%">
        <table bordercolordark="#000000" border="0">
          <tr>
            <td valign="top">
              <img src="/templates/retro/public/avatar.jpg">
            </td>
            <td>
              <img src="/templates/retro/public/welcome.gif">
              <font size="-1">
                <?= $intro ?>
              </font>
            </td>
          </tr>  
        </table>
      </td>
      <td width="50%" valign="top">
      <?php $this->insert('retro::site-news', []) ?>
      </td>
    </tr>
  </table>

  <br>
  <img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif"><img src="/templates/retro/public/lemmings_walking.gif">
  <br><br>
  <font size="4">
    <b>Latest parts of the experiment</b>
  </font><br>
  <?php $this->insert('retro::categories') ?>
  <br>
  <?php $this->insert('retro::post-list', ['posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page, 'custom_next_link' => ['url' => '/posts?page=1', 'icon' => '/templates/retro/public/more_md_wht.gif']]) ?>
  <br>
  <?php $this->insert('retro::categories') ?>
  <!-- Start Old'aVista Banner Code -->
  <p>
    <a href="http://www.oldavista.com/" rel="embed-banner" title="Old'aVista: The most powerful guide to the OLD internet!" target="_blank">
      <img src="//www.oldavista.com/public/banner.gif" width="468" height="60" border="0">
    </a>
  </p>
  <!-- End Old'aVista Banner Code -->
</center>