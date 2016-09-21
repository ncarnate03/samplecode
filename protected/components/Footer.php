<?php
Yii::import('zii.widgets.CPortlet');
class Footer extends CPortlet {
    protected function renderContent() {
        $this->render('footer');
    }

}