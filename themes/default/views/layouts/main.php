<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo Yii::app()->name."-" .$this->pageTitle;?></title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo CSS_URL; ?>/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo THEME_URL; ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo CSS_URL; ?>/animate.min.css" rel="stylesheet">
        <!-- Custom styling plus plugins -->
        <link href="<?php echo CSS_URL; ?>/custom.css" rel="stylesheet">
        <link href="<?php echo CSS_URL; ?>/icheck/flat/green.css" rel="stylesheet" />
        <link href="<?php echo CSS_URL; ?>/floatexamples.css" rel="stylesheet" type="text/css" />
        <!--script src="<?php echo JS_URL; ?>/jquery.min.js"></script-->
        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><span>Physio Assists</span></a>
                        </div>
                        <div class="clearfix"></div>
                            <!-- sidebar menu -->
                            <?php $this->widget('Leftnav'); ?>
                        <!-- /sidebar menu -->
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <?php $this->widget('Topprofile'); ?>
                    </div>
                </div>
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php echo $content; ?>
                    <?php $this->widget('Formbody'); ?>
                    <?php $this->widget('ext.loading.LoadingWidget');?>
                    <!-- footer content -->
                    <?php $this->widget('Footer'); ?>
                    <!-- /footer content -->
                </div>
                <!-- /page content -->
            </div>
        </div>
        <!--script src="<?php echo JS_URL; ?>/bootstrap.min.js"></script-->
        <script src="<?php echo JS_URL; ?>/custom.js"></script>

<?php
$gridId = Yii::app()->controller->id;
$module_id = Yii::app()->controller->module->id;
Yii::app()->clientScript->registerScript('grid-helper', "
        function closeForm(){
            $('#smart-widget-form').html('');
            $('#smart-widget-form-body').hide('slow');
            $('html, body').animate({ scrollTop: $('#$gridId-grid').offset().top - 5 }, 'slow');
        }
        $(document).ajaxStart(function() {
            Loading.show();
        });
        $( document ).ajaxStop(function() {
            Loading.hide();
        });
        function create(){
            Loading.show();
            url = '" . urldecode(Yii::app()->createUrl($module_id.'/'.$gridId . '/create')) . "';
            $.ajax({
                url: url,
                beforeSend: function ( xhr ) {
                }
            }).done(function ( data ) {
                $('#smart-widget-form-body').show('slow');
                $('#smart-widget-form').html(data);
                $('html, body').animate({ scrollTop: $('#smart-widget-form-body').offset().top - 5 }, 'slow');
                Loading.hide();
                return false;
            });
            return false;
        }
        function update(id){
            Loading.show();
            url = '" . urldecode(Yii::app()->createUrl($module_id.'/'.$gridId . '/update', array('id' => ''))) . "/' + id;
	        $.ajax({
	            url: url,
	            beforeSend: function ( xhr ) {
	            }
	        }).done(function ( data ) {
                    $('#smart-widget-form-body').show('slow');
                    $('#smart-widget-form').html(data);
	            $('html, body').animate({ scrollTop: $('#smart-widget-form-body').offset().top - 5 }, 'slow');
			Loading.hide();
	            return false;
            });
        }

        function deleteAll(model){
            var checked = getChecked();
            if(checked.length == 0){
                alert('No selection');
                return false;
            }
            Loading.show();
            //url = '" . urldecode(Yii::app()->createUrl($module_id.'/'.$gridId . '/delete', array('id' => ''))) . "' + delete_id;
            url = '" . urldecode(Yii::app()->createUrl('actions/deleteall')) . "';
            $.ajax({
                method:'POST',
                url: url,
                data: {'chk_arr[]':checked,'model':model},
                beforeSend: function ( xhr ) {
                }
            }).done(function ( data ) {
                    $.fn.yiiGridView.update('" . $gridId . "-grid');
                Loading.hide();
                return false;
            });
        }
        function publishAll(model){
            var checked = getChecked();
            if(checked.length == 0){
                alert('No selection');
                return false;
            }
            Loading.show();
            url = '" . urldecode(Yii::app()->createUrl('actions/publishall')) . "';
            $.ajax({
                method:'POST',
                url: url,
                data: {'chk_arr[]':checked,'model':model},
                beforeSend: function ( xhr ) {
                }
            }).done(function ( data ) {
                    $.fn.yiiGridView.update('" . $gridId . "-grid');
                Loading.hide();
                return false;
            });
        }
        function unpublishAll(model){
            var checked = getChecked();
            if(checked.length == 0){
                alert('No selection');
                return false;
            }
            Loading.show();
            url = '" . urldecode(Yii::app()->createUrl('actions/unpublishall')) . "';
            $.ajax({
                method:'POST',
                url: url,
                data: {'chk_arr[]':checked,'model':model},
                beforeSend: function ( xhr ) {
                }
            }).done(function ( data ) {
                    $.fn.yiiGridView.update('" . $gridId . "-grid');
                Loading.hide();
                return false;
            });
        }
        function getChecked(){
            var chk = [];
            $('.select-on-check:checked').each(function(){
                chk.push($(this).val());
            });
            return chk;
        }
        /*function uploadedFilePreview(input, id){
            if (window.File && window.FileList && window.FileReader) {
                if (input.files && input.files[0]) {
                        f = input.files[0];
                        console.log(f.type);
                        if (f.type.match('image.*')) {
                                var reader = new FileReader();
                                reader.onload = (function(theFile) {
                                return function(e) {
                                        // Render thumbnail.
                                                $('#'+id+'_preview').attr('src', e.target.result);
                                };
                        })(f);	
                        reader.readAsDataURL(f);
                    }
                }
            }
            else{
                console.log('Your browser does not support File API');
            }
        }*/
					
	", CClientScript::POS_BEGIN);
?>



    </body>

</html>