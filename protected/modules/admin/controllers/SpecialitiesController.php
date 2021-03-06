<?php

class SpecialitiesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $defaultAction = 'admin';

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Specialities;
        if (isset($_POST['Specialities'])) {
            $model->attributes = $_POST['Specialities'];
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
        Yii::app()->end();
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (isset($_POST['Specialities'])) {
            $model->attributes = $_POST['Specialities'];
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
        Yii::app()->end();
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->pageTitle = "Manage Specialities";
        $model = new Specialities('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Specialities']))
            $model->attributes = $_GET['Specialities'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Specialities::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'subject-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
