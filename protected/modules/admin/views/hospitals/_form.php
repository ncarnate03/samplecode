<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => Yii::app()->controller->id . '-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true, 'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>   
<div id="summaryErrors"></div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'title', array('class' => 'control-label', 'for' => $model->getAttributeLabel('title'))); ?>
    <?php echo $form->textField($model, 'title', array('class' => 'form-control input-sm', 'maxlength' => 255)); ?>
</div><!-- /form-group -->
<div class="form-group">
    <?php echo $form->labelEx($model, 'description', array('class' => 'control-label', 'for' => $model->getAttributeLabel('description'))); ?>
    <?php echo $form->textArea($model, 'description', array('rows' => 3, 'class' => 'form-control')); ?>
</div><!-- /form-group -->
<div class="text-right m-top-md">
    <?php echo CHtml::submitButton('Submit', array('id' => 'sp_btn', 'class' => 'btn btn-info')); ?>
</div>
<?php $this->endWidget(); ?>
<?php $this->widget("Formsubmitjs"); ?>
