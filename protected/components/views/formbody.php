<div class="row" id="smart-widget-form-body" style="margin-top: 20px;display: none;">
    <div class="col-md-12">
        <div class="smart-widget">
            <div class="smart-widget-header">
                <span id="form_widget_title">Please Fill Mandatory Fields</span>
                <span class="smart-widget-option">
                    <a href="#" class="widget-remove-option" onclick="closeForm();">
                        <i class="fa fa-times"></i>
                    </a>
                </span>
            </div>
            <div class="smart-widget-inner">
                <div class="smart-widget-body" id="smart-widget-form">
                </div>
            </div><!-- ./smart-widget-inner -->
        </div><!-- ./smart-widget -->
    </div><!-- /.col-->
</div>
<?php
$gridId = Yii::app()->controller->id;
Yii::app()->clientScript->registerScript('grid-helper-ext', "
        function closeForm(){
            $('#smart-widget-form').html('');
            $('#smart-widget-form-body').hide('slow');
            $('html, body').animate({ scrollTop: $('#$gridId-grid').offset().top - 5 }, 'slow');
        }
        function uploadedFilePreview(input, id){
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
        }
					
	", CClientScript::POS_BEGIN);
?>
