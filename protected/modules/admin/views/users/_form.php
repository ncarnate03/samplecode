<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => Yii::app()->controller->id . '-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true, 'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>   
<div id="summaryErrors"></div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'first_name', array('class' => 'control-label', 'for' => $model->getAttributeLabel('first_name'))); ?>
    <?php echo $form->textField($model, 'first_name', array('class' => 'form-control input-sm', 'maxlength' => 255)); ?>
</div><!-- /form-group -->
<div class="form-group">
    <?php echo $form->labelEx($model, 'last_name', array('class' => 'control-label', 'for' => $model->getAttributeLabel('last_name'))); ?>
    <?php echo $form->textField($model, 'last_name', array('class' => 'form-control input-sm', 'maxlength' => 255)); ?>
</div><!-- /form-group -->
<div class="form-group">
    <?php echo $form->labelEx($model, 'email', array('class' => 'control-label', 'for' => $model->getAttributeLabel('email'))); ?>
    <?php echo $form->textField($model, 'email', array('class' => 'form-control input-sm', 'maxlength' => 255)); ?>
</div><!-- /form-group -->
<div class="form-group">
    <?php echo $form->labelEx($model, 'contact_no', array('class' => 'control-label', 'for' => $model->getAttributeLabel('contact_no'))); ?>
    <?php echo $form->textField($model, 'contact_no', array('class' => 'form-control input-sm', 'maxlength' => 255)); ?>
</div><!-- /form-group -->
<div class="form-group">
    <?php echo $form->labelEx($model, 'username', array('class' => 'control-label', 'for' => $model->getAttributeLabel('username'))); ?>
    <?php echo $form->textField($model, 'username', array('class' => 'form-control input-sm', 'maxlength' => 255)); ?>
</div><!-- /form-group -->
<div class="form-group">
    <?php echo $form->labelEx($model, 'password', array('class' => 'control-label', 'for' => $model->getAttributeLabel('password'))); ?>
    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control input-sm', 'maxlength' => 255)); ?>
</div><!-- /form-group -->
<div class="text-right m-top-md">
    <?php echo CHtml::submitButton('Submit', array('id' => 'user_btn', 'class' => 'btn btn-info')); ?>
</div>
<?php $this->endWidget(); ?>
<?php $this->widget("Formsubmitjs"); ?>
