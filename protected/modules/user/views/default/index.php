<?php $this->widget('Topbuttons'); ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 id="formtitle">Add Patient</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" id="formcontent">
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('patient', '
    $(".maintab").click(function(e){
        e.preventDefault();
        var obj = $(this);
        var type = obj.attr("id");
        var url;
        var title;
        if(type == "addpatitent"){
            title = "Add Patient";
            url = "' .PATIENT_URL. '/create";
        }
        if(type == "addfollowup"){
            title = "Add Attendance";
            url = "' .FOLLOWUP_URL. '/create";
        }
        if(type == "addpayment"){
            title = "Add Payment";
            url = "' .PAYMENT_URL. '/create";
        }
        $("#formtitle").text(title);
        $.ajax({
            type: "POST",
            url: url,
            data: { type: type},
            success: function(response) {
                //var res = jQuery.parseJSON(response);
                $("#formcontent").html(response);
            }
        });
    });

') ?>


