<?php $this->layout('_layout', ['title' => $data['title']]); ?>
<?php $image = 'https://www.ericexperiment.com'.$data['image']; ?>
<?php $this->push('seo'); ?>
<meta name="description" content="<?= $this->e($data['description']); ?>">
<link rel="canonical" href="https://www.ericexperiment.com/post/<?= $this->e($data['slug']); ?>" />
<meta property="og:locale" content="en_AU" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?= $data['title']; ?>" />
<meta property="og:description" content="<?= $this->e($data['description']); ?>" />
<meta property="og:url" content="https://www.ericexperiment.com/post/<?= $this->e($data['slug']); ?>" />
<meta property="og:site_name" content="The Eric Experiment" />
<meta property="article:section" content="Blog" />
<meta property="article:published_time" content="<?= $this->e($data['date']); ?>T12:10:00+00:00" />
<meta property="article:modified_time" content="<?= $this->e($data['date']); ?>T10:05:01+00:00" />
<meta property="og:updated_time" content="<?= $this->e($data['date']); ?>T10:05:01+00:00" />
<meta property="og:image" content="<?= $image; ?>" />
<meta property="og:image:secure_url" content="<?= $image; ?>" />
<meta property="og:image:width" content="143" />
<meta property="og:image:height" content="80" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?= $this->e($data['description']); ?>" />
<meta name="twitter:title" content="<?= $data['title']; ?>" />
<meta name="twitter:image" content="<?= $image; ?>" />
<?php $this->end(); ?>
<img src="/public/nothing.gif" width="1" height="5"><br><img src="/public/black_pixel.gif" width="100%" height="1"><br><img src="/public/nothing.gif" width="1" height="5"><br>

<font size="5">
  <b><?= $data['title']; ?></b>
</font><br>
<img src="/public/nothing.gif" width="1" height="5"><br>
<img src="/public/black_pixel.gif" width="100%" height="1"><br>
<img src="/public/nothing.gif" width="1" height="10"><br>
<b>Published: </b><?= $this->e($data['date']); ?>
<br />
<b>Tags: </b>
<?php
$len = count($data['tags']);
$i = 0;
?>
<?php foreach ($data['tags'] as $id => $tag) : ?>
  <?php $isLast = $i == $len - 1; ?>
  <a href="/tag?id=<?= $tag['id']; ?>"><?= $tag['name']; ?></a><?php if (!$isLast) : ?>, <?php endif; ?>
  <?php ++$i; ?>
<?php endforeach; ?>
<br>
<img src="/public/nothing.gif" width="1" height="10"><br>
<img src="/public/anibar.gif" width="100%" height="1" style="width: 100%; height: 1px"><br>
<img src="/public/nothing.gif" width="1" height="2"><br>
<?= $this->section('content'); ?>
<div id="disqus_thread"></div>