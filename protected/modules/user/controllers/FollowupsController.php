<?php

class FollowupsController extends Controller {
    public $defaultAction = 'admin';
    public function actionIndex() {
        $this->render('index');
    }
    public function actionAdmin($id) {
        $this->render('admin',array('id' => $id));
    }
    public function actionCreate($id) {
        /*$model = new Followup;
        if (isset($_POST['Followup'])) {
            $model->attributes = $_POST['Followup'];
            if ($model->validate()) {
                if ($model->save()) {
                    $status = 1;
                    $message = 'Record has been created successfully...';
                }
            } else {
                $status = 0;
                $message = CHtml::errorSummary($model, NULL, NULL, array('class' => 'alert alert-block alert-error errorSummary'));
            }
            echo base64_encode(CJSON::encode(array(
                        'status' => $status,
                        'message' => $message,
            )));
        } else {
            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            echo $this->renderPartial('_form', array('model' => $model), true, true);
        }
        Yii::app()->end();*/
        $patient = Patientprofile::model()->findByAttributes(array("status"=>STATUS_ACTIVE,"patient_id"=>$id));
        $model = Followup::model()->findAllByAttributes(array("patient_id"=>$id));
        if (isset($_POST['Followup'])) {
            $data = $_POST['Followup'];
            $files = $_FILES['Followup'];
            $path = Yii::getPathOfAlias('webroot') . '/images/followup/';
            foreach ($data as $k=>$d){
                $f = Followup::model()->findByPk($k);
                if(!empty($f)){
                    $f->present = isset($d['present']) ? $d['present'] : 0;
                    $f->description = isset($d['description']) ? $d['description'] : "";
                    if(!empty($files)){
                        $file_arr = array();
                        for($i=0;$i<count($files['name'][$k]['files']);$i++){
                            $name = $files['name'][$k]['files'][$i];
                            if(!empty($name)){
                                $name_arr = explode(".", $name);
                                $ext = ".".$name_arr[count($name_arr)-1];
                                $tmp_name = $files['tmp_name'][$k]['files'][$i];
                                $new_name = "followup_".$k."_".$i.$ext;
                                $new_path = $path.$new_name;
                                if(move_uploaded_file($tmp_name, $new_path)){
                                    $file_arr[$i] = $new_name;
                                }
                            }
                        }
                        if(!empty($file_arr)){
                            $f->files= CJSON::encode($file_arr);
                        }
                    }
                    $f->save();
                }
            }
            $status = 0;
            $message = 'Record has been created successfully...';
            echo base64_encode(CJSON::encode(array(
                        'status' => $status,
                        'message' => $message,
            )));
        }
        else{
            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            echo $this->renderPartial('_form', array('model' => $model), true, true);
        }
    }

    
}
