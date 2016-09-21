<div class="row">
    <div class="col-sm-6 m-bottom-sm">
        <h4 class="no-margin"><?php echo $this->pageTitle; ?></h4>
    </div><!-- ./col -->
</div><!-- .row -->
<div id="followupp_form">

</div>
<?php Yii::app()->clientScript->registerScript('followup_form', '
    $.ajax({
        url: "'.FOLLOWUP_URL.'/create/id/'.$id.'",
      }).done(function(data) {
        $("#followupp_form").html(data);
    });
')?>
