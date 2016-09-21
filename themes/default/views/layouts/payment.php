<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo Yii::app()->name . "-" . $this->pageTitle; ?></title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo LOGIN_URL; ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo LOGIN_URL; ?>/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo LOGIN_URL; ?>/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo LOGIN_URL; ?>/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo LOGIN_URL; ?>/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo LOGIN_URL; ?>/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo LOGIN_URL; ?>/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo LOGIN_URL; ?>/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo LOGIN_URL; ?>/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body onload="submitPayuForm();">
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <?php echo $content; ?>
                </div>
                <!--div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <h3>Powered By - Ncarnate Infotech</h3>
                        </div>
                    </div>
                </div-->
            </div>

        </div>


        <!-- Javascript -->
        <script src="<?php echo LOGIN_URL; ?>/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo LOGIN_URL; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo LOGIN_URL; ?>/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo LOGIN_URL; ?>/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>