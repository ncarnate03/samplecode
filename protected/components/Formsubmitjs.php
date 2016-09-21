<?php

class Formsubmitjs extends CPortlet {
    public $gridid;
    function init(){
        $this->gridid = Yii::app()->controller->id;
    }
    protected function renderContent() {
        $this->render('formsubmitjs',array('gridid'=>$this->gridid));
    }

}
