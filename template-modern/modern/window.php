<div class="window-border">
  <div class="window">
    <div class="title">
      <div class="close">
        <span class="shadow">&#8212;</span>
        <span class="text">&#8212;</span>
      </div>
      <span class="title-text">
        <?= $title ?>
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
    <div class="content">
      <?= $this->section('content') ?>
    </div>
  </div>

  <div class="handle topright"></div>
  <div class="handle bottomright"></div>
  <div class="handle topleft"></div>
  <div class="handle bottomleft"></div>
</div>