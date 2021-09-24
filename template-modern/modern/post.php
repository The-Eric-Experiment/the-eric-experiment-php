<?php $this->layout(withVariant('layout'), ['title' => $this->e($data->title), 'showSideContent' => true]) ?>
<?php $this->push('seo') ?>
<?php $image = "https://www.ericexperiment.com/contents/posts/" . $data->slug . '/' . $data->image; ?>
<meta name="description" content="<?= $this->e($data->description); ?>">
<link rel="canonical" href="https://www.ericexperiment.com/post/<?= $this->e($data->slug); ?>" />
<meta property="og:locale" content="en_AU" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?= $this->e($data->title); ?>" />
<meta property="og:description" content="<?= $this->e($data->description); ?>" />
<meta property="og:url" content="https://www.ericexperiment.com/post/<?= $this->e($data->slug); ?>" />
<meta property="og:site_name" content="The Eric Experiment" />
<meta property="article:section" content="Blog" />
<meta property="article:published_time" content="<?= $this->e($data->date); ?>T12:10:00+00:00" />
<meta property="article:modified_time" content="<?= $this->e($data->date); ?>T10:05:01+00:00" />
<meta property="og:updated_time" content="<?= $this->e($data->date); ?>T10:05:01+00:00" />
<meta property="og:image" content="<?= $image ?>" />
<meta property="og:image:secure_url" content="<?= $image ?>" />
<meta property="og:image:width" content="143" />
<meta property="og:image:height" content="80" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?= $this->e($data->description); ?>" />
<meta name="twitter:title" content="<?= $this->e($data->title); ?>" />
<meta name="twitter:image" content="<?= $image ?>" />
<?php $this->end() ?>

<div class="content post">
  <h1><?= $this->e($data->title); ?></h1>
  <div id="post-metadata">
    <div class="metadata">
      <span>Published:</span>
      <?= $this->e($data->date); ?>
    </div>
    <div class="metadata">
      <span>Tags:</span>
      <?php
      $len = count($data->tags);
      $i = 0;
      ?>
      <?php foreach ($data->tags as $id => $tag) : ?>
        <?php $isLast = $i == $len - 1; ?>
        <a href="/tag?id=<?= $tag->id ?>"><?= $this->e($tag->name) ?></a><?php if (!$isLast) : ?>, <?php endif; ?>
      <?php $i++ ?>
    <?php endforeach; ?>
    </div>
  </div>

  <div id="post-content">
    <?= $data->content ?>
  </div>

  <div id="disqus_thread"></div>
</div>