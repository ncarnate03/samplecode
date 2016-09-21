<?php

$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$salt = SALT;
/*$key = "sfds";
$status = 1;
$txnid = "asdasd";
$amount = 100;
$firstname = "Abc";
$productinfo = "info";
$email = "info@gmail.com";
$phone = "8097513413";
$posted_hash = "";
*/
If (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
    $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash) {
//if(0){
    echo "Invalid Transaction. Please try again";
} else {
    $model->amount = $amount;
    $model->firstname = $firstname;
    $model->mobile = $phone;
    $model->email = $email;
    $model->txnid = $txnid;
    if($model->save()){
        echo "<h3>Thank You.</h3>";
        echo "<h4>Your Transaction ID for this transaction is " . $txnid . ".</h4>";
        echo "<h4>We have received a payment of Rs. " . $amount . ".</h4>";
    }
    else{
        echo "You payment has been successfull";
    }
}
?>	