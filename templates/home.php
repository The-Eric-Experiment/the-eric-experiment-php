<?php $this->layout('_layout', []) ?>
<table width="700" cellspacing="4" cellpadding="0" border="0">
    <tr>
        <td align="center"><img src="/public/welcome.gif"></td>
    </tr>
</table>
<img src="/public/anibar.gif" width="700">
<br>
<?= $this->vertical_space(6); ?>
<table width="700" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td width="200" valign="top">
            <?php $this->insert('home-news') ?>
        </td>
        <td>
            <?= $this->vertical_space(); ?>
        </td>
        <td width="350" valign="top">
            <?php $this->insert('home-posts') ?>
        </td>
        <td>
            <?= $this->vertical_space(); ?>
        </td>
        <td width="150" valign="top" align="center">
            <?php $this->insert('_menu') ?>
        <br>
            <img src="/public/raptor_walk_md_clr.gif" alt="raptor">
        </td>
    </tr>
</table>
<img src="/public/flamingline.gif" width="700">
<table width="700" cellspacing="4" cellpadding="0" border="0">
    <tr>
        <td align="center">
            <!-- Start Old'aVista Banner Code -->
            <p>
                <a href="http://www.oldavista.com/" rel="embed-banner" title="Old'aVista: The most powerful guide to the OLD internet!">
                    <img src="//www.oldavista.com/public/banner.gif" width="468" height="60" border="0">
                </a>
            </p>
            <!-- End Old'aVista Banner Code -->
        </td>
    </tr>
    <tr>
        <td align="center">
            <?= $this->insert('_tags') ?>
            <br>
            <a id="theoldnet-webring-href" href="//webring.theoldnet.com/widget/a7b5c3bea8b50d7b4b97caab2eee15c1/navigate" data-website-id="a7b5c3bea8b50d7b4b97caab2eee15c1"><img src="//webring.theoldnet.com/widget/a7b5c3bea8b50d7b4b97caab2eee15c1/image" alt="The Eric Experiment" border="0"></a><br>
            <font size="-1">
                Proud member of <a href="//webring.theoldnet.com/"><b>TheOldNet</b></a> webring! Check some other cool websites!<br>
                [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/previous/navigate">Previous site</a>] -
                [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/random/navigate">Random site</a>] -
                [<a href="//webring.theoldnet.com/member/a7b5c3bea8b50d7b4b97caab2eee15c1/next/navigate">Next site</a>]
            </font>
            <br><br>
            <img src="//geekring.net/banner/geek_1.jpg" alt="geekring.net nvigation" usemap="#geekringmap">
            <map name="geekringmap">
                <area shape="rect" coords="9,28,111,53" alt="Previous geekring site" href="http://geekring.net/site/208/previous">
                <area shape="rect" coords="248,28,350,53" alt="Random geekring site" href="http://geekring.net/site/208/random">
                <area shape="rect" coords="490,28,592,53" alt="Next geekring site" href="http://geekring.net/site/208/next">
                <area shape="rect" coords="465,6,566,22" alt="Main geekring site" href="http://geekring.net/">
            </map>
            <br><br>
            The Yesterweb Webring <br>
            <a href="https://webring.yesterweb.org/noJS/index.php?d=prev&url=https://ericexperiment.com/">Previous</a>
            <a href="https://webring.yesterweb.org/noJS/index.php?d=rand&url=https://ericexperiment.com/">Random</a>
            <a href="https://webring.yesterweb.org/noJS/index.php?d=next&url=https://ericexperiment.com/">Next</a>
            <br>
        </td>
    </tr>
</table>