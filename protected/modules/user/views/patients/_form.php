<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => Yii::app()->controller->id . '-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true, 'htmlOptions' => array('class' => 'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'),
        ));
?>
<div id="summaryErrors"></div>
<div class="row">
    <div class="col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'doa', array('class' => 'control-label', 'for' => $model->getAttributeLabel('doa'))); ?>
            <?php $this->widget(
                'booster.widgets.TbDatePicker',
                array(
                    'model' => $model,
                    'attribute' => 'doa',
                    'htmlOptions' => array('class'=>'form-control'),
                    'options' => array('format' => 'yyyy-mm-dd'),
                )
            );?>
        </div><!-- /form-group -->
    </div>
    <div class="col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'dod', array('class' => 'control-label', 'for' => $model->getAttributeLabel('dod'))); ?>
            <?php $this->widget(
                'booster.widgets.TbDatePicker',
                array(
                    'model' => $model,
                    'attribute' => 'dod',
                    'htmlOptions' => array('class'=>'form-control'),
                    'options' => array('format' => 'yyyy-mm-dd'),
                )
            );?>
        </div><!-- /form-group -->
    </div>
    <div class="col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'source', array('class' => 'control-label', 'for' => $model->getAttributeLabel('source'))); ?>
            <?php echo $form->dropDownList($model, 'speciality', Functions::getFrom(), array('empty' => 'Select Source', 'class' => 'form-control')); ?>
        </div><!-- /form-group -->
    </div>
    <div class="col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'referred_by', array('class' => 'control-label', 'for' => $model->getAttributeLabel('referred_by'))); ?>
        <?php echo $form->textField($model, 'referred_by', array('class' => 'form-control col-md-7 col-xs-12', 'maxlength' => 255)); ?>
        </div><!-- /form-group -->
    </div>
    <div class="col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'speciality', array('class' => 'control-label', 'for' => $model->getAttributeLabel('speciality'))); ?>
            <?php echo $form->dropDownList($model, 'speciality', CHtml::listData(Specialities::model()->findAllByAttributes(array("status"=>STATUS_ACTIVE)), 'id', 'title'), array('empty' => 'Select Speciality', 'class' => 'form-control','id'=>'specality_id')); ?>
        </div><!-- /form-group -->
    </div>
    <div class="col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'area', array('class' => 'control-label', 'for' => $model->getAttributeLabel('area'))); ?>
            <?php echo $form->dropDownList($model, 'area', array(), array('empty' => 'Select Area', 'class' => 'form-control')); ?>
        </div><!-- /form-group -->
    </div>
</div>
<div class="ln_solid"></div>
<div class="row">
    <div class="col-sm-1 col-md-1 col-xs-12">
        <?php echo $form->labelEx($model, 'salutation', array('class' => 'control-label', 'for' => $model->getAttributeLabel('salutation'))); ?>
        <?php echo $form->dropDownList($model, 'salutation', Functions::Salutations(), array('empty' => '-Select-', 'class' => 'form-control')); ?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'first_name', array('class' => 'control-label', 'for' => $model->getAttributeLabel('first_name'))); ?>
        <?php echo $form->textField($model, 'first_name', array('class' => 'form-control col-md-7 col-xs-12', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'middle_name', array('class' => 'control-label', 'for' => $model->getAttributeLabel('middle_name'))); ?>
        <?php echo $form->textField($model, 'middle_name', array('class' => 'form-control col-md-7 col-xs-12', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'last_name', array('class' => 'control-label', 'for' => $model->getAttributeLabel('last_name'))); ?>
        <?php echo $form->textField($model, 'last_name', array('class' => 'form-control col-md-7 col-xs-12', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-2 col-md-2 col-xs-12">
        <?php echo $form->labelEx($model, 'gender', array('class' => 'control-label', 'for' => $model->getAttributeLabel('gender'))); ?>
        <div>
            <?php echo $form->radioButtonList($model,'gender',Functions::loadGenders(),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>''));?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'dominance', array('class' => 'control-label', 'for' => $model->getAttributeLabel('dominance'))); ?>            
            <div>
                <?php echo $form->radioButtonList($model,'dominance',Functions::getDominance(),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>''));?>
            </div>
        </div><!-- /form-group -->
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'dob', array('class' => 'control-label', 'for' => $model->getAttributeLabel('dob'))); ?>
        <?php $this->widget(
            'booster.widgets.TbDatePicker',
            array(
                'model' => $model,
                'attribute' => 'dob',
                'htmlOptions' => array('class'=>'form-control'),
                'options' => array('format' => 'yyyy-mm-dd'),
            )
        );?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'age', array('class' => 'control-label', 'for' => $model->getAttributeLabel('age'))); ?>
        <?php echo $form->textField($model, 'age', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'occupation', array('class' => 'control-label', 'for' => $model->getAttributeLabel('occupation'))); ?>
        <?php echo $form->textField($model, 'occupation', array('class' => 'form-control col-md-7 col-xs-12', 'maxlength' => 255)); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'contact_no', array('class' => 'control-label', 'for' => $model->getAttributeLabel('contact_no'))); ?>
        <?php echo $form->textField($model, 'contact_no', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'mobile', array('class' => 'control-label', 'for' => $model->getAttributeLabel('mobile'))); ?>
        <?php echo $form->textField($model, 'mobile', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'email_id', array('class' => 'control-label', 'for' => $model->getAttributeLabel('email_id'))); ?>
        <?php echo $form->textField($model, 'email_id', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'address', array('class' => 'control-label', 'for' => $model->getAttributeLabel('address'))); ?>
        <?php echo $form->textArea($model, 'address', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
</div>
<div class="ln_solid"></div>
<div class="row">
        <?php echo $form->checkbox($model, 'is_hospitalization',array("value"=>1)); ?>
        <?php echo $form->labelEx($model, 'is_hospitalization', array('class' => 'control-label', 'for' => $model->getAttributeLabel('is_hospitalization'))); ?>
</div>
<div class="row" id="hospitalization" style="display:none;">
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'hospital_id', array('class' => 'control-label', 'for' => $model->getAttributeLabel('hospital_id'))); ?>
        <?php echo $form->dropDownList($model, 'hospital_id', CHtml::listData(Hospital::model()->findAllByAttributes(array("status"=>STATUS_ACTIVE)), 'id', 'title'), array('empty' => 'Select Hostital', 'class' => 'form-control')); ?>
   </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'from_date', array('class' => 'control-label', 'for' => $model->getAttributeLabel('from_date'))); ?>
        <?php $this->widget(
            'booster.widgets.TbDatePicker',
            array(
                'model' => $model,
                'attribute' => 'from_date',
                'htmlOptions' => array('class'=>'form-control'),
                'options' => array('format' => 'yyyy-mm-dd'),
            )
        );?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
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
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <?php echo $form->labelEx($model, 'summary', array('class' => 'control-label', 'for' => $model->getAttributeLabel('summary'))); ?>
        <?php echo $form->textArea($model, 'summary', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
</div>
<div class="ln_solid"></div>
<div class="row">
    <div class="col-sm-6 col-md-6 col-xs-12">
        <?php echo $form->labelEx($model, 'complaints', array('class' => 'control-label', 'for' => $model->getAttributeLabel('complaints'))); ?>
        <?php echo $form->textArea($model, 'complaints', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-6 col-md-6 col-xs-12">
        <?php echo $form->labelEx($model, 'history', array('class' => 'control-label', 'for' => $model->getAttributeLabel('history'))); ?>
        <?php echo $form->textArea($model, 'history', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'personal_history', array('class' => 'control-label', 'for' => $model->getAttributeLabel('personal_history'))); ?>
</div>
<div class="row">
    <div class="col-sm-3 col-md-2 col-xs-12">
        <label>DM</label>&nbsp;<?php echo $form->checkbox($model, 'personal_history[dm]',array("value"=>1)); ?>
    </div>
    <div class="col-sm-3 col-md-2 col-xs-12">
        <label>HT</label>&nbsp;<?php echo $form->checkbox($model, 'personal_history[ht]',array("value"=>1)); ?>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-12">
        <label>Vices - </label> &nbsp;<span>Alcohol</span>&nbsp;<?php echo $form->checkbox($model, 'personal_history[alcohol]',array("value"=>1)); ?>
        <span>Tobaco</span>&nbsp;<?php echo $form->checkbox($model, 'personal_history[tobaco]',array("value"=>1)); ?>
    </div>
    <div class="col-sm-3 col-md-5 col-xs-12">
        <label class="control-label" style="margin-top:-10px;">Misc</label>
        <?php echo $form->textArea($model, 'personal_history[misc]', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
</div>
<div class="ln_solid"></div>
<div class="row">
    <label>Examination</label>
</div>
<div class="row" id="examination_ortho">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-xs-12">
            <label>Tenderness</label>&nbsp;<?php echo $form->checkbox($model, 'tenderness[id]',array("value"=>1,'class'=>'chkcls')); ?>
            <?php echo $form->textArea($model, 'tenderness[text]', array('class' => 'form-control clstext', 'maxlength' => 255)); ?>
        </div>
        <div class="col-sm-4 col-md-4 col-xs-12">
            <label>Swelling</label>&nbsp;<?php echo $form->checkbox($model, 'swelling[id]',array("value"=>1,'class'=>'chkcls')); ?>
            <?php echo $form->textArea($model, 'swelling[text]', array('class' => 'form-control clstext', 'maxlength' => 255)); ?>
        </div>
        <div class="col-sm-4 col-md-4 col-xs-12">
            <label>Warmth</label>&nbsp;<?php echo $form->checkbox($model, 'warmth[id]',array("value"=>1,'class'=>'chkcls')); ?>
            <?php echo $form->textArea($model, 'warmth[text]', array('class' => 'form-control clstext', 'maxlength' => 255)); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4 col-xs-12">
            <label>Range of Motion</label>&nbsp;<?php echo $form->checkbox($model, 'rangeofmotion[id]',array("value"=>1,'class'=>'chkcls')); ?>
            <?php echo $form->textArea($model, 'rangeofmotion[text]', array('class' => 'form-control clstext', 'maxlength' => 255)); ?>
        </div>
        <div class="col-sm-4 col-md-4 col-xs-12">
            <label>Sensation - </label>&nbsp;
            <span>Affected</span>&nbsp;<?php echo $form->checkbox($model, 'sensation[id]',array("value"=>1,'class'=>'chkcls')); ?>
            <?php echo $form->textArea($model, 'sensation[text]', array('class' => 'form-control clstext', 'maxlength' => 255)); ?>
        </div>
        <div class="col-sm-4 col-md-4 col-xs-12">
            <label>Deformaties - </label>&nbsp;
            <span>Yes</span>&nbsp;<?php echo $form->checkbox($model, 'deformaties[id]',array("value"=>1,'class'=>'chkcls')); ?>&nbsp;
            <?php echo $form->textArea($model, 'deformaties[text]', array('class' => 'form-control clstext', 'maxlength' => 255)); ?>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-xs-12">
        <?php echo $form->labelEx($model, 'posture', array('class' => 'control-label', 'for' => $model->getAttributeLabel('posture'))); ?>
        <?php echo $form->textArea($model, 'posture', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
    <div class="col-sm-6 col-md-6 col-xs-12">
        <?php echo $form->labelEx($model, 'gait_analysis', array('class' => 'control-label', 'for' => $model->getAttributeLabel('gait_analysis'))); ?>
        <?php echo $form->textArea($model, 'gait_analysis', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
</div>
<div class="ln_solid"></div>
<div class="row">
    <label>Special Tests</label>
</div>
<div class="row" >
    <?php $tests = Test::model()->findAllByAttributes(array("status"=>STATUS_ACTIVE)); ?>
    <table class="table table-bordered">
        <tbody>
            <?php foreach ($tests as $test): ?>
            <tr class="<?php echo $test->speciality_id == 1 ? "ortho" : "neuro";?>">
                    <?php $chk = ($model['special_tests'][$test->id]['value'] == 0) ? "checked" : ""; ?>
                    <td><?php echo $form->checkBox($model, "special_tests[$test->id][id]"); ?>&nbsp;<?php echo $test->title; ?></td>
                    <td>Positive &nbsp;<?php echo $form->radioButton($model, "special_tests[$test->id][value]",array("checked"=>$chk)); ?>
                        &nbsp;Negative &nbsp;<?php echo $form->radioButton($model, "special_tests[$test->id][value]"); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="ln_solid"></div>
<div class="row">
    <label>Investigation</label>
</div>
<div class="row">
    <?php $investgations = Investigation::model()->findAllByAttributes(array("status"=>STATUS_ACTIVE)); ?>
    <table class="table table-bordered">
        <tbody>
            <?php foreach ($investgations as $investgation): ?>
                <tr>
                    <td><?php echo $form->checkBox($model, "investigation[$investgation->id][id]"); ?>&nbsp;<?php echo $investgation->title; ?></td>
                    <td>
                        <?php $path = Yii::getPathOfAlias('webroot') . '/images/investigation/';?>
                        <?php $path_web = Yii::app()->getBaseUrl(). '/images/investigation/';?>
                        <?php echo $form->textArea($model, "investigation[$investgation->id][text]", array('class' => 'form-control', 'maxlength' => 255)); ?>
                        <?php echo $form->fileField($model, "investigation[$investgation->id][file][]"); ?>
                        <?php echo file_exists($path.$model->investigation[$investgation->id]['file'][0]) ? '<a href="'.$path_web.$model->investigation[$investgation->id]['file'][0].'" target="_blank">view</a>' : '';?>
                        <?php echo $form->fileField($model, "investigation[$investgation->id][file][]"); ?>
                        <?php echo file_exists($path.$model->investigation[$investgation->id]['file'][1]) ? '<a href="'.$path_web.$model->investigation[$investgation->id]['file'][1].'" target="_blank">view</a>' : '';?>
                        <?php echo $form->fileField($model, "investigation[$investgation->id][file][]"); ?>
                        <?php echo file_exists($path.$model->investigation[$investgation->id]['file'][2]) ? '<a href="'.$path_web.$model->investigation[$investgation->id]['file'][2].'" target="_blank">view</a>' : '';?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="ln_solid"></div>
<div class="row">
    <label>Treatment</label>
</div>
<div class="row">
    <div class="col-sm-4 col-md-4 col-xs-12"><label>Electro Therapy</label></div>
    <div class="col-sm-4 col-md-4 col-xs-12"><label>Excersise Therapy</label></div>
</div>
<div class="row">
    <?php $treatments = Treatment::model()->findAllByAttributes(array("status"=>STATUS_ACTIVE)); ?>
    <div class="col-sm-4 col-md-4 col-xs-12">
        <?php foreach ($treatments as $treatment): ?>
            <?php if($treatment->type == 1): ?>
                <p class="<?php echo $treatment->speciality_id == 1 ? "ortho" : "neuro";?>"><?php echo $form->checkBox($model, "treatment[$treatment->id]",array('value'=>$treatment->id,'uncheckValue'=>null)); ?>&nbsp;<?php echo $treatment->title; ?></p>
            <?php endif;?>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4 col-md-4 col-xs-12">
        <?php foreach ($treatments as $treatment): ?>
            <?php if($treatment->type == 2): ?>
                <p class="<?php echo $treatment->speciality_id == 1 ? "ortho" : "neuro";?>"><?php echo $form->checkBox($model, "treatment[$treatment->id]",array('value'=>$treatment->id,'uncheckValue'=>null)); ?>&nbsp;<?php echo $treatment->title; ?></p>
            <?php endif;?>
        <?php endforeach; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <?php echo $form->labelEx($model, 'diagnosis', array('class' => 'control-label', 'for' => $model->getAttributeLabel('diagnosis'))); ?>
        <?php echo $form->textArea($model, 'diagnosis', array('class' => 'form-control', 'maxlength' => 255)); ?>
    </div>
</div>
<div class="text-right m-top-md" style="margin-top: 10px;">
    <?php echo CHtml::submitButton('Submit', array('id' => 'sp_btn', 'class' => 'btn btn-info')); ?>
</div>
<?php $id = isset($model->speciality) ? $model->speciality : 0; ?>
<?php $this->endWidget(); ?>
<?php $this->widget("Formsubmitjs"); ?>
<?php Yii::app()->clientScript->registerScript('patients_form', '
    $("input[type=text]").removeClass("ct-form-control");
    $(".ortho").hide("slow");
    $(".neuro").hide("slow");
    getExamination('.$id.');
    $("#specality_id").change(function(e){
        var id = $(this).val();
        getAreas(id);
        getExamination(id);
    });
    function getAreas(id){
        $.ajax({
            url: "'.PATIENT_URL.'/getareas/id/"+id,
          }).done(function(data) {
            $("#Patient_area").html(data);
        });
    }
    function getExamination(id){
        if(id == 0){
            $(".ortho").hide("slow");
            $(".neuro").hide("slow");
        }
        else{
            if(id == 1){
                $(".neuro").hide("slow");
                $(".ortho").show("slow");
            }
            else{
                $(".ortho").hide("slow");
                $(".neuro").show("slow");
            }
            /*$.ajax({
                url: "'.PATIENT_URL.'/getexamination/id/"+id+"/patient_id/'.$id.'",
              }).done(function(data) {
                $("#examination_form").html(data);
            });*/
        }
    }
    if($("#Patient_is_hospitalization").is(":checked")){
        $("#hospitalization").show("slow");
    }
    $("#Patient_is_hospitalization").click(function(){
        if ($(this).is(":checked")) {
            $("#hospitalization").show("slow");
        }
        else {
            $("#hospitalization").hide("slow");
        }
    });
    
    /*if($(".chkcls").is(":checked")){
        $(this).next().show("slow");
    }
    else{
        alert("fsdfsd");
        $(".clstext").hide();
    }
    $(".chkcls").click(function(){
        $(this).next().show("slow");
    });*/

')?>
        
   
