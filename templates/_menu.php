<script>
    if (document.images) {
        <?php if (!empty($main_menu)): ?>
            <?php foreach ($main_menu as $i => $item): ?>
                <?php if (!empty($item['image_on'])) : ?>
                    var image<?= $i + 1; ?>on = new Image();
                    image<?= $i + 1; ?>on.src = '/contents/public/menu/<?= $item['image_on'] ?>';
                    var image<?= $i + 1; ?>off = new Image();
                    image<?= $i + 1; ?>off.src = '/contents/public/menu/<?= $item['image_off'] ?>';
                <?php endif; ?> 
            <?php endforeach; ?>
        <?php endif; ?>
    }

    function changeImages() {
        if (document.images) {
            for (var i = 0; i < changeImages.arguments.length; i += 2) {
                document[changeImages.arguments[i]].src = eval(
                    changeImages.arguments[i + 1] + '.src'
                );
            }
        }
    }
</script>

<?php foreach ($main_menu as  $i => $item) : ?>
    <?php if (!empty($item['path'])) :?>
        <?php 
            $path = $item['path'];
            if ($path !== '/') {
                $path = "/page$path";
            }
        ?>
    <a data-menu-item="true" data-menu-icon="<?= !empty($item['icon']) ? $item['icon'] : ''; ?>" data-menu-label="<?= !empty($item['label']) ? $item['label'] : ''; ?>" href="<?= $path; ?>" target="_top"<?php if (!empty($item['image_on'])) : ?>
            onmouseover="changeImages('image<?= $i + 1; ?>','image<?= $i + 1; ?>on')"
            onmouseout="changeImages('image<?= $i + 1; ?>','image<?= $i + 1; ?>off')"<?php endif; ?>>
    <?php endif; ?>
        <img src="/contents/public/menu/<?= $item['image_off'] ?>" 
            alt="<?= !empty($item['label']) ? $item['label'] : ''; ?>"
            border="0"
            name="image<?= $i + 1; ?>">
    <?php if (!empty($item['path'])) :?>
    </a>
    <?php endif; ?>
    <?php if ($item['image_off'] === 'menu-empty-full.gif'): ?><br><?php endif; ?>
<?php endforeach; ?>
