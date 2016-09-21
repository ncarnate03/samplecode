<?php

class PaymentsController extends Controller {

    public $defaultAction = 'admin';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAdmin($id) {
        $this->pageTitle = "Payments Summary";
        Yii::app()->session['patient_id'] = Yii::app()->request->getParam("id", 0);
        $model = new Payment('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Payment']))
            $model->attributes = $_GET['Patient'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $model = new Payment;
        if (isset($_POST['Payment'])) {
            $model->attributes = $_POST['Payment'];
            $model->patient_id = Yii::app()->session['patient_id'];
            if ($model->save()) {
                if($model->send_alert == 1){
                    $mPDF1 = Yii::app()->ePdf->mpdf();
                    $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                    $mPDF1->WriteHTML($stylesheet, 1);
                    $mPDF1->WriteHTML($this->renderPartial('recipt', array("payment"=>$model), true));
                    $content = $mPDF1->Output('', EYiiPdf::OUTPUT_TO_STRING);
                    Functions::sendRecipt($model->patient_id,$content);
                }
                $status = 1;
                $message = 'Record has been created successfully...';
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
            $model->pdate = date("Y-m-d");
            $model->to_date = date("Y-m-d");
            $profile = Patientprofile::model()->findByAttributes(array("patient_id"=>Yii::app()->session['patient_id']));
            if($profile->diagnosis){
                $model->diagnosis = $profile->diagnosis;
            }
            echo $this->renderPartial('_form', array('model' => $model), true, true);
        }
        Yii::app()->end();
    }
    public function actionUpdate($id) {
        $model = Payment::model()->findByPk($id);
        if (isset($_POST['Payment'])) {
            $model->attributes = $_POST['Payment'];
            if ($model->save()) {
                if($model->send_alert == 1){
                    $mPDF1 = Yii::app()->ePdf->mpdf();
                    $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                    $mPDF1->WriteHTML($stylesheet, 1);
                    $mPDF1->WriteHTML($this->renderPartial('recipt', array("payment"=>$model), true));
                    $content = $mPDF1->Output('', EYiiPdf::OUTPUT_TO_STRING);
                    Functions::sendRecipt($model->patient_id,$content);
                }
                $status = 1;
                $message = 'Record has been created successfully...';
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
            $model->pdate = date("Y-m-d");
            $model->to_date = date("Y-m-d");
            echo $this->renderPartial('_form', array('model' => $model), true, true);
        }
        Yii::app()->end();
    }
    
    public function actionRecipt($id){
        $this->layout = false;
        $payment = Payment::model()->findByPk($id);
        # mPDF
        $mPDF1 = Yii::app()->ePdf->mpdf();
        # You can easily override default constructor's params
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        # render (full page)
        //$mPDF1->WriteHTML($this->render('recipt', array(), true));
        # Load a stylesheet
        //$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($this->renderPartial('recipt', array("payment"=>$payment), true));
 
        # Renders image
        //$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
 
        # Outputs ready PDF
        $mPDF1->Output();
 
        ////////////////////////////////////////////////////////////////////////////////////
 
        # HTML2PDF has very similar syntax
        /*$html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->renderPartial('index', array(), true));
        $html2pdf->Output();*/
 
        ////////////////////////////////////////////////////////////////////////////////////
 
        # Example from HTML2PDF wiki: Send PDF by email
        /*$content_PDF = $html2pdf->Output('', EYiiPdf::OUTPUT_TO_STRING);
        require_once(dirname(__FILE__).'/pjmail/pjmail.class.php');
        $mail = new PJmail();
        $mail->setAllFrom('webmaster@my_site.net', "My personal site");
        $mail->addrecipient('mail_user@my_site.net');
        $mail->addsubject("Example sending PDF");
        $mail->text = "This is an example of sending a PDF file";
        $mail->addbinattachement("my_document.pdf", $content_PDF);
        $res = $mail->sendmail();
        $this->renderPartial('recipt', array('model' => $model));*/
    }
    

}
