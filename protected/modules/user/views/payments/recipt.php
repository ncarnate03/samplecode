<!DOCTYPE html>
<html>
    <head>
        <title>Payment Recipt</title>
    </head>
    <body>
        <table>
            <thead>
                <tr><td colspan="2" style="margin-left: 50px;float:left;"><img src="<?php echo THEME_URL;?>/images/recipt_header.png"></td></tr>
            </thead>
            <tbody>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><i>Receipt No. :</i> <?php echo $payment->id; ?></td>
                    <td align="right"><i>Date :</i> <?php echo date("d/m/Y",  strtotime(date("Y-m-d"))); ?></td>
                </tr>
                <tr>
                    <td colspan="2"><i>Patient Id</i> - <b><?php echo $payment->patient->patient_id; ?></b></td>
                </tr>
                <tr><td colspan="2"><i>Received with thanks</i></td></tr>
                <tr>
                    <td colspan="2"><i>From <?php echo Functions::getSalutation($payment->patient->salutation); ?></i> <b><?php echo $payment->patient->first_name." ".$payment->patient->last_name;?></b></td>
                </tr>
                <tr>
                    <td colspan="2"><i>a sum of Rs. </i> <b><?php echo $payment->amount;?>/-</b></td>
                </tr>
                <tr>
                    <td style="text-transform: capitalize;"><i>Rupees</i> <b><?php echo Functions::pricetoword($payment->amount);?> Only.</b></td>
                    <td align="right"><i>(in words)</i></td>
                </tr>
                <tr>
                    <td colspan="2">By <b><?php echo Functions::PaymentModes($payment->mode);?></b> <?php echo ($payment->mode == 2 | $payment->mode == 3 && !empty($payment->description)) ? "($payment->description)" : ""; ?> towards treatment of <b><?php echo $payment->diagnosis; ?></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">from <b><?php echo date("d/m/Y",  strtotime($payment->pdate)); ?></b> to <b><?php echo date("d/m/Y",  strtotime($payment->to_date)); ?></b>
</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                    <td align="center">
                        <span style="text-transform: capitalize;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Dr. ".Yii::app()->user->name; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">for <b>HOPE PHYSIOTHERAPY CLINIC</b></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
<style>
    table td{
        font-family: Verdana, Georgia, Serif;
    }
    table td{
        height: 40px;
    }
</style>