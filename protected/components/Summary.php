<?php
Yii::import('zii.widgets.CPortlet');
class Summary extends CPortlet {
    protected function renderContent() {
        $this->render('summary');
    }

}