<?php $this->layout('modern::window', ['title' => $title]); ?>

<div id="posts-container">
  <div id="post-list">
    <?php foreach ($posts as $post) : ?>
      <?php $image = getPostThumbnail($post->image); ?>
      <a href="/post/<?= $post->slug; ?>" class="post-item">
        <div class="item-inner">
          <div class="post-image">
            <img src="<?= $image; ?>" border="0" alt="<?= $post->title; ?>" />
          </div>
          <div class="post-content">
            <div class="post-title">
              <?= $post->title; ?>
            </div>
            <div class="description">
              <?= $post->description; ?>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
  <div class="pagination">
    <?php if ($previous_page != null) : ?>
      <div>
        <a href="<?= $previous_page; ?>"><img src="/templates/modern/public/arrow_text1_left.gif"></a>
      </div>
    <?php endif; ?>
    <?php if ($next_page != null) : ?>
      <div class="right">
        <?php if ($custom_next_link) : ?>
          <a href="<?= $custom_next_link['url']; ?>"><img src="<?= $custom_next_link['icon']; ?>"></a>
        <?php else : ?>
          <a href="<?= $next_page; ?>"><img src="/templates/modern/public/arrow_text1_right.gif"></a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</div>