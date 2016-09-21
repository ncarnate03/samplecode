<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class PaymentForm extends CFormModel
{
	public $amount;
	public $mobile;
	public $email;
        public $txnid;
        public $firstname;
        /**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('amount,mobile', 'required'),
                        array('mobile, amount', 'numerical', 'integerOnly' => true),			// email has to be a valid email address
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
        public function save(){
            $patient = Patient::model()->findByAttributes(array("mobile"=>  $this->mobile));
            if(empty($patient)){
                $patient = new Patient;
                $patient->doa = date("Y-m-d");
                $patient->dod = date("Y-m-d");
                $patient->first_name = $this->firstname;
                $patient->last_name = "Empty";
                $patient->address = "Empty";
                $patient->occupation = "Empty";
                $patient->email_id = $this->email;
                $patient->mobile = $this->mobile;
                $patient->tenant_id = 2;
                $patient->save();
            }
            $payment = new Payment;
            $payment->patient_id = $patient->id;
            $payment->amount = $this->amount;
            $payment->description = $this->txnid;
            $payment->mode = 3;
            $payment->status = 1;
            $payment->pdate = date("Y-m-d");
            $payment->to_date = date("Y-m-d");
            if($payment->save()){   
                return $payment->id;
            }
            
        }
        
        
        
}