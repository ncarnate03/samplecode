<?php

class PatientsController extends Controller {
    public $defaultAction = 'admin';
    public function actionIndex() {
        $this->render('index');
    }
    public function actionAdmin(){
        $this->pageTitle = "Manage Patients";
        $model = new Patient('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Patient']))
            $model->attributes = $_GET['Patient'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }    
    public function actionCreate() {
        $model = new Patient;
        if (isset($_POST['Patient'])) {
            $model->attributes = $_POST['Patient'];
            $model->tenant_id = Functions::getTenant();
            if ($model->save()){
                //if (){
                    self::processProfile($model->id,$_POST['Patient'],$_FILES['Patient'],"new");
                    $status = 1;
                    $message = 'Record has been created successfully...';
                //}
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
            $model->source = 1;
            $model->gender = 1;
            $model->dominance = 1;
            $model->dob = "";
            $model->doa = date("Y-m-d");
            $model->dod = date("Y-m-d");
            echo $this->renderPartial('_form', array('model' => $model), true, true);
        }
        Yii::app()->end();
    }
    public function actionUpdate($id) {
        $model = Patient::model()->findByPk($id);
        $profile = Patientprofile::model()->findByAttributes(array("status"=>1,"patient_id"=>$id));
        if (isset($_POST['Patient'])) {
            $model->attributes = $_POST['Patient'];
            if ($model->save()){
                //if (){
                    self::processProfile($model->id,$_POST['Patient'],$_FILES['Patient'],"update");
                    $status = 1;
                    $message = 'Record has been created successfully...';
                //}
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
            /*$model->source = 1;
            $model->gender = 1;
            $model->dominance = 1;
            $model->doa = date("Y-m-d");
            $model->dod = date("Y-m-d");*/
            $model->dob = ($model->dob == "" || $model->dob == "0000-00-00") ? "" : $model->dob;
            if(!empty($profile)){
                //print_r($profile);die;
                $model->speciality = $profile->speciality;
                $model->referred_by = $profile->referred_by;
                $model->doa = $profile->doa;
                $model->dod = $profile->dod;
                $model->is_hospitalization = $profile->is_hospitalization;
                if(!empty($profile->hospitalization_data)){
                    $hdata = CJSON::decode($profile->hospitalization_data);
                    $model->hospital_id = $hdata['id'];
                    $model->from_date = $hdata['from_date'];
                    $model->to_date = $hdata['from_date'];
                    $model->summary = $hdata['summary'];
                }
                if(!empty($profile->examination)){
                    $exa = CJSON::decode($profile->examination);
                    $model->tenderness = $exa['tenderness'];
                    $model->swelling = $exa['swelling'];
                    $model->warmth = $exa['warmth'];
                    $model->rangeofmotion = $exa['rangeofmotion'];
                    $model->sensation = $exa['sensation'];
                    $model->deformaties = $exa['deformaties'];
                    $model->posture = $exa['posture'];
                    $model->gait_analysis = $exa['gait_analysis'];
                }
                
                $model->complaints = $profile->compalints;
                $model->history = $profile->history;
                $model->diagnosis = $profile->diagnosis;
                $model->personal_history = CJSON::decode($profile->personal_history);
                //$model->examination = CJSON::decode($profile->examination);
                $model->special_tests = CJSON::decode($profile->special_tests);
                //print_r($model->special_tests);die;
                $model->investigation = CJSON::decode($profile->investigation);
                $model->treatment = CJSON::decode($profile->treatment);
                //print_r($model->treatment);die;
            }
            echo $this->renderPartial('_form', array('model' => $model), true, true);
        }
        Yii::app()->end();
    }

    
    public function processProfile($id,$data,$files,$type){
        $arr_inv = array();
        $profile = Patientprofile::model()->findByAttributes(array("status"=>1,"patient_id"=>$id));
        if(empty($profile) || $type == 'new'){
            $profile = new Patientprofile;
        }
        if(!empty($data)){
            if(isset($data['is_hospitalization']) && $data['is_hospitalization'] == 1){
                $harr['id'] = $data['hospital_id']; 
                $harr['from_date'] = $data['from_date']; 
                $harr['to_date'] = $data['to_date']; 
                $harr['summary'] = $data['summary']; 
            }
            $profile->referred_by = $data['referred_by'];
            $profile->doa = $data['doa'];
            $profile->dod = $data['dod'];
            $profile->speciality = $data['speciality'];
            $profile->patient_id = $id;
            $profile->is_hospitalization = $data['is_hospitalization'];
            $profile->hospitalization_data = !empty($harr) ? CJSON::encode($harr) : "";
            $profile->compalints = $data['complaints'];
            $profile->history = $data['history'];
            $profile->diagnosis = $data['diagnosis'];
            $profile->personal_history = CJSON::encode($data['personal_history']);
            $arr_inv['tenderness'] = $data['tenderness'];
            $arr_inv['swelling'] = $data['swelling'];
            $arr_inv['warmth'] = $data['warmth'];
            $arr_inv['rangeofmotion'] = $data['rangeofmotion'];
            $arr_inv['sensation'] = $data['sensation'];
            $arr_inv['deformaties'] = $data['deformaties'];
            $arr_inv['posture'] = $data['posture'];
            $arr_inv['gait_analysis'] = $data['gait_analysis'];
            $profile->examination = CJSON::encode($arr_inv);
            if(!empty($data['special_tests'])){
                $s_arr = array();
                foreach ($data['special_tests'] as $k=>$v){
                    if($v['id'] == 1){
                        $s_arr [$k] = $v; 
                    }
                }
            }
            $profile->special_tests = !empty($s_arr) ? CJSON::encode($s_arr) : "";
            if(!empty($data['investigation'])){
                $path = Yii::getPathOfAlias('webroot') . '/images/investigation/';
                $i_arr = array();
                foreach ($data['investigation'] as $k=>$v){
                        //if($v['id'] == 1){
                        for($i=0;$i<count($v['file']);$i++){
                            $name = $files['name']['investigation'][$k]['file'][$i];
                            if(!empty($name)){
                                $name_arr = explode(".", $name);
                                $ext = ".".$name_arr[count($name_arr)-1];
                                $tmp_name = $files['tmp_name']['investigation'][$k]['file'][$i];
                                $new_name = "investigation_".$k."_".$i.$ext;
                                $new_path = $path.$new_name;
                                if(move_uploaded_file($tmp_name, $new_path)){
                                    $v['file'][$i] = $new_name;
                                }
                            }
                        //}
                        $i_arr[$k] = $v;
                    }
                }
            }
            $profile->investigation = !empty($i_arr) ? CJSON::encode($i_arr) : "";
            $profile->treatment = !empty($data['treatment']) ? CJSON::encode($data['treatment']) : "";
            if($profile->save()){
                self::generateDates($profile);
            }
        }
    }
    
    public static function generateDates($profile){
        $range_arr = Functions::getDateRange($profile->doa,$profile->dod);
        if(!empty($range_arr)){
            foreach ($range_arr as $date){
                $ndate = Followup::model()->findByAttributes(array("pdate"=>$date,"patient_id"=>$profile->patient_id));
                if(empty($ndate)){
                    $model = new Followup();
                    $model->pdate = $date;
                    $model->patient_id = $profile->patient_id;
                    $model->save();
                }
            }
        }
    }

    public function actionGetareas($id){
        $areas = Area::model()->findAllByAttributes(array("speciality_id"=>$id,"status"=>STATUS_ACTIVE));
        $str = "<option value=''>Select Area</option>";
        if(!empty($areas)){
            foreach ($areas as $area){
                $str .= "<option value='".$area->id."'>".$area->title."</option>";
            }
        }
        echo $str;die;
    }
    public function actionGetexamination($id,$patient_id){
        if($patient_id == 0){
            $model = new Patient;
        }
        else{
            $model = Patient::model()->findByPk($patient_id);
            $profile = Patientprofile::model()->findByAttributes(array("status"=>1,"patient_id"=>$patient_id));
        }
        $speciality = Specialities::model()->findByPk($id);
        $tests = Test::model()->findAllByAttributes(array("speciality_id"=>$id,"status"=>STATUS_ACTIVE));        
        if(!empty($speciality)){
            if($speciality->id == 1){
                $this->renderPartial("_orthoform",array("model"=>$model));
            }
        }
    }
    
}
