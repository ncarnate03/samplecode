<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-2 sidebar">
                <?php $this->widget('LeftNav'); ?>
            </div>
            <div class="col-md-10">
                <div id="content">
                    <?php echo $content; ?>
                </div><!-- content -->
            </div>
        </div>
    </div></div>

<?php $this->endContent(); ?>