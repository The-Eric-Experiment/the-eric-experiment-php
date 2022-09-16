<div class="window-border">
  <div class="window">
    <?php if ($hide_titlebar != true): ?>
      <div class="title-bar">
        <div class="close">
          <span class="shadow">&#8212;</span>
          <span class="text">&#8212;</span>
        </div>
        <span class="title-text">
          <?= $title; ?>
        </span>
        <div class="button-container">
          <div class="button maximise">
            <span>&#9650;</span>
          </div>
        </div>
        <div class="button-container">
          <div class="button minimise">
            <span>&#9660;</span>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="window-content <?php if ($hide_titlebar == true): ?>no-title<?php endif; ?>">
      <?= $this->section('content'); ?>
    </div>
  </div>

  <div class="handle topright"></div>
  <div class="handle bottomright"></div>
  <div class="handle topleft"></div>
  <div class="handle bottomleft"></div>
</div>