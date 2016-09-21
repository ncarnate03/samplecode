<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => Yii::app()->controller->id . '-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true, 'htmlOptions' => array('class' => 'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'),
        ));
?>   
<div class="row">
    <table class="table table-bordered">
        <tbody>
            <?php if(!empty($model)): ?>
            <?php foreach($model as $m):?>
                <tr>
                    <td>
                        <?php //echo $form->checkBox($m, "[$m->id]present"); ?>&nbsp;<?php //echo $m->pdate; ?>
                        <input type="checkbox" name="Followup[<?php echo $m->id;?>][present]" value="1" <?php echo ($m->present == 1) ? "checked" : "";?> /><?php echo $m->pdate; ?>
                    </td>
                    <td>
                        <?php $path = Yii::getPathOfAlias('webroot') . '/images/followup/';?>
                        <?php $path_web = Yii::app()->getBaseUrl(). '/images/followup/';?>
                        <?php $files = !empty($m->files) ? CJSON::decode($m->files) : array("","","");?>
                        <?php //echo $form->textArea($m,"[$m->id][description][text]", array('class' => 'form-control', 'maxlength' => 255)); ?>
                        <textarea name="Followup[<?php echo $m->id;?>][description]" cols="100" class="form-control"><?php echo $m->description; ?></textarea>
                        <input type="file" name="Followup[<?php echo $m->id;?>][files][]" />
                        <?php echo (isset($files[0]) && !empty($files[0]) && file_exists($path.$files[0])) ? '<a href="'.$path_web.$files[0].'" target="_blank">view</a>' : '';?>
                        <input type="file" name="Followup[<?php echo $m->id;?>][files][]" />
                        <?php echo (isset($files[1]) && !empty($files[1]) && file_exists($path.$files[1])) ? '<a href="'.$path_web.$files[1].'" target="_blank">view</a>' : '';?>
                        <input type="file" name="Followup[<?php echo $m->id;?>][files][]" />
                        <?php echo (isset($files[2]) && !empty($files[2]) && file_exists($path.$files[2])) ? '<a href="'.$path_web.$files[2].'" target="_blank">view</a>' : '';?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <?php echo CHtml::submitButton('Submit', array('id' => 'sp_btn', 'class' => 'btn btn-info')); ?>
    </div>
</div>
</div>
<?php $this->endWidget(); ?>
<?php $this->widget("Formsubmitjs"); ?>
