<?php
Yii::import('zii.widgets.CPortlet');
class Leftnav extends CPortlet {
    protected function renderContent() {
        $this->render('leftnav');
    }

}