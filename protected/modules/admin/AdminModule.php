<?php

class AdminModule extends CWebModule {
    public $menu;
    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        if(!isset(Yii::app()->user->id)){
            Yii::app()->request->redirect(BASE_URL);
        }
        else if(Yii::app()->user->role == 2){
            Yii::app()->request->redirect(USER_URL);
        }
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));
        $this->menu = array(
            'dashboard' => array('title' => 'Dashboard', 'url' => ADMIN_URL, 'ui_class' => 'fa', 'icon_class' => 'fa-home'),
            'specilities' => array('title' => 'Specilities', 'url' => ADMIN_SPECILITIES_URL, 'ui_class' => 'fa', 'icon_class' => 'fa-home'),
            'areas' => array('title' => 'Areas', 'url' => ADMIN_AREA_URL, 'ui_class' => 'fa', 'icon_class' => 'fa-home'),
            'tests' => array('title' => 'Special Tests', 'url' => ADMIN_TEST_URL, 'ui_class' => 'fa', 'icon_class' => 'fa-home'),
            'treatments' => array('title' => 'Treatments', 'url' => ADMIN_TREATMENT_URL, 'ui_class' => 'fa', 'icon_class' => 'fa-home'),
            'investigations' => array('title' => 'Investigations', 'url' => ADMIN_INVESTIGATION_URL, 'ui_class' => 'fa', 'icon_class' => 'fa-home'),
            'hospitals' => array('title' => 'Hospitals', 'url' => ADMIN_HOSPITAL_URL, 'ui_class' => 'fa', 'icon_class' => 'fa-home'),
            'users' => array('title' => 'Users', 'url' => ADMIN_USERS_URL, 'ui_class' => 'fa', 'icon_class' => 'fa-home'),
        );
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else
            return false;
    }

}
