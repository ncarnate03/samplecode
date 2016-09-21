<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = MERCHANT_KEY;
// Merchant Salt as provided by Payu
$SALT = SALT;
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = PAYU_BASE_URL;
$action = '';
$posted = array();
if (!empty($_POST)) {
    //print_r($_POST);
    foreach ($_POST as $key => $value) {
        $posted[$key] = $value;
    }
}

$formError = 0;

if (empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
    $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if (empty($posted['hash']) && sizeof($posted) > 0) {
    if (
            empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])
    ) {
        $formError = 1;
    } else {
        //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach ($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }

        $hash_string .= $SALT;


        $hash = strtolower(hash('sha512', $hash_string));
        $action = $PAYU_BASE_URL . '/_payment';
    }
} elseif (!empty($posted['hash'])) {
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
}
?>
<script type="text/javascript">
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
        if (hash == '') {
            return;
        }
        var payuForm = document.forms.payuForm;
        payuForm.submit();
    }
</script>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Payment</h3>
                <p>Make payment using your mobile Number</p>
            </div>
        </div>
        <div class="form-bottom">
        <form action="<?php echo $action; ?>" method="post" name="payuForm">
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
            <input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? 'Payment against treatment' : $posted['productinfo'] ?>" />
            <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? HOME_URL.'/paymentsuccess' : $posted['surl'] ?>" />
            <input type="hidden" name="furl" value="<?php echo (empty($posted['surl'])) ? HOME_URL.'/paymentfailure' : $posted['furl'] ?>" />
            <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
            <div class="form-group">
                <label class="sr-only" for="form-username">Amount</label>
                <input id="amount" class="form-username form-control" type="text" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" placeholder="Amount" required>
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-username">First Name</label>
                <input id="firstname" class="form-username form-control" type="text" name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname'] ?>" placeholder="First Name"  required>
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-username">Email</label>
                <input id="email" class="form-username form-control" type="email" name="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email'] ?>" placeholder="Email"  required>
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-username">Mobile</label>
                <input id="phone" class="form-username form-control" type="phone" pattern="^(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}$" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone'] ?>" placeholder="Mobile"  required>
            </div>
            <?php //if (!$hash) { ?>
            <input class="btn btn-success" type="submit" value="Pay" name="yt0">
            <?php //} ?>
        </form>
        </div>
    </div>
</div>