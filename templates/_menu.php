<table id="table-menu" cellpadding="0" cellspacing="0" border="0" width="100%">
    <?php foreach ($main_menu as $item) : ?>
    <tr data-icon="<?= $item->icon ?>" data-path="<?= $item->path ?>" data-label="<?= $item->label ?>">
        <td valign="center" align="right">
            <a href="<?= $item->path ?>" target="_top" />
            <?= $item->label ?>
        </a>
    </td>
    <td>
        <?= $this->vertical_space(); ?>
    </td>
    <td valign="center" width="24">
        <a href="<?= $item->path ?>" target="_top" />
            <img src="<?= $item->icon ?>" alt="<?= $item->label ?>" border="0">
        </a>
    </td>
    </tr>
    <?php endforeach; ?>
</table>
