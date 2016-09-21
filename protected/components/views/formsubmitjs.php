<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => $gridid.'-form',
    'options' => array(
        /* Ajaxform json response conflict with mutlipart */
        //'dataType' => 'json',
        'success' => "js:function(data,statusText) {
            //console.log(data);return false;
            data = jQuery.parseJSON(window.atob(data)); 
            if(data.status == 1){
                closeForm();
                $.fn.yiiGridView.update('".$gridid."-grid');
                return false;
            }
            else{
                $('#summaryErrors').html(data.message).show('slow');
                //$('html, body').animate({ scrollTop: $('#".$gridid."-form').offset().top - 5 }, 'slow');
                $('html, body').animate({ scrollTop: $('#smart-widget-form-body').offset().top}, 'slow');
                return false;
            }
        }",
    ),
));
?>