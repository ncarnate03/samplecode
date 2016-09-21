<!--div class="row">
    <div class="col-sm-8 col-sm-offset-2 text">
        <h1><strong><?php echo Yii::app()->name; ?></strong> Login Form</h1>
    </div>
</div-->
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Login</h3>
                <p>Enter your username and password to log on:</p>
            </div>
            <div class="form-top-right">
                <i class="fa fa-key"></i>
            </div>
        </div>
        <div class="form-bottom">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'class' => 'login-form'
                ),
            ));
            ?>
            <div class="form-group">
                <label class="sr-only" for="form-username">Username</label>
                <?php echo $form->textField($model, 'username', array('class' => 'form-username form-control', 'placeholder' => 'Username')); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-password">Password</label>
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-password form-control', 'placeholder' => 'Password')); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
            <div class="row">
            <div class="col-md-6"><?php echo CHtml::submitButton('Login', array('class' => 'btn btn-success')); ?></div>
            <div class="col-md-6" style="text-align: right;"><a href="<?php echo HOME_URL;?>/payment">Make Payment</div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>