<?php

class ActionsController extends Controller {
    public $layout = false;
    
    public function actionTest(){
        print_r($_POST);die;
    }

    public function actionDeleteall() {
        $chk_arr = isset($_REQUEST['chk_arr']) ? $_REQUEST['chk_arr'] : array();
        $modelclass = isset($_REQUEST['model']) ? $_REQUEST['model'] : "";
        if(!empty($chk_arr) && !empty($modelclass)){
            foreach ($chk_arr as $id){
                $model = $this->loadModel($modelclass,$id);
                $model->doa = !empty($model->profile) ? $model->profile->doa : date("Y-m-d");
                $model->dod = !empty($model->profile) ? $model->profile->dod : date("Y-m-d");
                $model->speciality = !empty($model->profile) ? $model->profile->speciality : 1;
                $model->status = 2;
                $model->save();
            }
        }
        Yii::app()->end();
    }
    public function actionpublishall() {
        $chk_arr = isset($_REQUEST['chk_arr']) ? $_REQUEST['chk_arr'] : array();
        $modelclass = isset($_REQUEST['model']) ? $_REQUEST['model'] : "";
        if(!empty($chk_arr) && !empty($modelclass)){
            foreach ($chk_arr as $id){
                $model = $this->loadModel($modelclass,$id);
                $model->status = 1;
                $model->save();
            }
        }
    }
    public function actionunpublishall() {
        $chk_arr = isset($_REQUEST['chk_arr']) ? $_REQUEST['chk_arr'] : array();
        $modelclass = isset($_REQUEST['model']) ? $_REQUEST['model'] : "";
        if(!empty($chk_arr) && !empty($modelclass)){
            foreach ($chk_arr as $id){
                $model = $this->loadModel($modelclass,$id);
                $model->status = 0;
                $model->save();
            }
        }
    }
    public function loadModel($modelclass,$id) {
        $model = $modelclass::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}
