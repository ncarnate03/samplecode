<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => Yii::app()->controller->id . '-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true, 'htmlOptions' => array('class' => 'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'),
        ));
?>   
<div id="summaryErrors"></div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'pdate', array('class' => 'control-label', 'for' => $model->getAttributeLabel('pdate'))); ?>
    <?php $this->widget(
        'booster.widgets.TbDatePicker',
        array(
            'model' => $model,
            'attribute' => 'pdate',
            'htmlOptions' => array('class'=>'form-control'),
            'options' => array('format' => 'yyyy-mm-dd'),
        )
    );?>
</div><!-- /form-group -->
<div class="form-group">
    <?php echo $form->labelEx($model, 'to_date', array('class' => 'control-label', 'for' => $model->getAttributeLabel('to_date'))); ?>
    <?php $this->widget(
        'booster.widgets.TbDatePicker',
        array(
            'model' => $model,
            'attribute' => 'to_date',
            'htmlOptions' => array('class'=>'form-control'),
            'options' => array('format' => 'yyyy-mm-dd'),
        )
    );?>
</div><!-- /form-group -->
<div class="form-group">
    <?php echo $form->labelEx($model, 'amount', array('class' => 'control-label', 'for' => $model->getAttributeLabel('amount'))); ?>
    <?php echo $form->textField($model, 'amount', array('class' => 'form-control input-sm', 'maxlength' => 255)); ?>
</div><!-- /form-group -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <?php echo $form->labelEx($model, 'diagnosis', array('class' => 'control-label', 'for' => $model->getAttributeLabel('diagnosis'))); ?>
        <?php echo $form->textArea($model, 'diagnosis', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'mode', array('class' => 'control-label', 'for' => $model->getAttributeLabel('mode'))); ?>
    <?php echo $form->dropDownList($model, 'mode',  Functions::PaymentModes(), array('class' => 'form-control')); ?>
</div><!-- /form-group -->
<div class="form-group" id="descrption_div" style="display: none;">
    <?php echo $form->labelEx($model, 'description', array('class' => 'control-label', 'for' => $model->getAttributeLabel('description'))); ?>
    <?php echo $form->textArea($model, 'description', array('class' => 'form-control', 'maxlength' => 255)); ?>
</div>
<div class="form-group">
    <?php echo $form->checkBox($model, 'send_alert', array('value' => 1, 'uncheckValue' => 0, 'checked' => ($model->send_alert == 1) ? true : false)); ?>   
    <?php echo '<label>Send Email</label>'; ?>
</div>
<div class="form-group">
    <div class="col-md-6">
        <?php echo CHtml::submitButton('Submit', array('id' => 'sp_btn', 'class' => 'btn btn-info')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
<?php $this->widget("Formsubmitjs"); ?>
<?php 
Yii::app()->clientScript->registerScript('patients_form', '
    if($("#Payment_mode").val() != 1){
        $("#descrption_div").show("slow");
    }
    $("#Payment_mode").click(function(){
        if ($(this).val() == 2 || $(this).val() == 3) {
            $("#descrption_div").show("slow");
        }
        else {
            $("#descrption_div").hide("slow");
        }
    });
')?>