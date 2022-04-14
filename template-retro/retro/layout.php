<?php
$pageTitle = $this->e($siteName);
if ($title) {
    $pageTitle .= " | " . $title;
}
require_once getRequirePath("/engine/analytics.php");
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>
        <?= $pageTitle; ?>
    </title>
    <?= $this->section('seo') ?>
</head>

<body bgcolor="#000000" text="#fffffff" background="/templates/retro/public/starfiel.gif" vlink="#00FF00" link="#00FF00">
    <?php $this->insert('retro::page-header', ['mainMenu' => $mainMenu]) ?>

    <?= $this->section('content') ?>

    <center>
        <table border="0" celspacing="0" celpadding="0" width="100%">
            <tr>
                <td align="left">
                    <img src="/templates/retro/public/ani_raptor.gif">
                </td>
                <td align="right" valign="bottom">
                    <img src="/templates/retro/public/cat.gif">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="/templates/retro/public/flamingline.gif" height="20" width="100%">
                </td>
            </tr>
        </table>
        <br>
        <?php $this->insert('retro::tags') ?>
        <a id="theoldnet-webring-href" href="//webring.theoldnet.com/widget/a7b5c3bea8b50d7b4b97caab2eee15c1/navigate" data-website-id="a7b5c3bea8b50d7b4b97caab2eee15c1"><img src="//webring.theoldnet.com/widget/a7b5c3bea8b50d7b4b97caab2eee15c1/image" alt="The Eric Experiment" border="0"></a><br>
        <font size="-1">
            Proud member of <a href="//webring.theoldnet.com/"><b>TheOldNet</b></a> webring! Check some other cool websites!<br>
            [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/previous/navigate">Previous site</a>] -
            [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/random/navigate">Random site</a>] -
            [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/next/navigate">Next site</a>]
        </font>
        <br><br>

        <a href="/windows3x/essentialsoftware#netscapecommunicator407"><img src="/templates/retro/public/netscap4.gif" alt="Compatible with Netscape" border="0" /></a>
        <a href="/windows3x/essentialsoftware#internetexplorer501"><img src="/templates/retro/public/ie.gif" width="88" height="31" alt="Compatible with IE" border="0" /></a>
        <img src="/templates/retro/public/800x600.gif" border="0">
        <img src="/templates/retro/public/frontpg.gif" border="0">
        <a href="/windows3x/essentialsoftware#mirc591"><img src="/templates/retro/public/mircban.gif" border="0"></a>
        <a href="http://www.theoldnet.com/#frombadge" title="Are you tired of this new Internet yet? Time to Get TheOldNet!" target="_blank"><img src="//theoldnet.com/images/theoldnetanimblur2.gif" width="88" height="31" border=0></a>
        <!-- Start Old'aVista Button Code -->
        <a href="http://www.oldavista.com/" rel="embed-button" title="Old'aVista: The most powerful guide to the OLD internet!" target="_blank">
            <img src="//www.oldavista.com/public/button.gif" width="88" height="31" border="0">
        </a>
        <!-- End Old'aVista Button Code -->
        <br>
        Copyright © 1988-2020 The Eric Experiment
        <br>

        <img src="/templates/retro/public/neon-smaller.gif">
        <br>
        <img src="/templates/retro/public/skyline.gif">
    </center>
</body>

</html>