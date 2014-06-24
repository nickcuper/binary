<?php $this->beginContent('/layouts/main'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
            $this->widget('bootstrap.widgets.BsBreadcrumb', array(
                'links' => $this->breadcrumbs,
                // will change the container to ul
                'tagName' => 'ul',
                // will generate the clickable breadcrumb links
                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                // will generate the current page url : <li>News</li>
                'inactiveLinkTemplate' => '<li>{label}</li>',
                // will generate your homeurl item : <li><a href="/dr/dr/public_html/">Home</a></li>
                'homeLink' => BsHtml::openTag('li') . BsHtml::icon(BsHtml::GLYPHICON_HOME) . BsHtml::closeTag('li')
            ));
            ?><!-- breadcrumbs -->
            <?php echo $content; ?>
        </div><!-- content -->
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>