<?php

/**
 * This is the model class for table "patients".
 *
 * The followings are the available columns in table 'patients':
 * @property integer $id
 * @property integer $tenant_id
 * @property string $patient_id
 * @property string $dob
 * @property string $gender
 * @property integer $dominance
 * @property string $occupation
 * @property string $address
 * @property string $email_id
 * @property string $contact_no
 * @property string $mobile
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 */
class Patient extends CActiveRecord {

    var $patient_id;
    var $doa;
    var $source;
    var $source_location;
    var $speciality;
    var $area;
    var $age;
    var $referred_by;

    var $is_hospitalization;
    var $from_date;
    var $to_date;
    var $hospital_id;
    var $summary;
    var $hospitalization_data;
    
    var $complaints;
    var $history;
    var $personal_history;
    
    var $tenderness;
    var $swelling;
    var $warmth;
    var $rangeofmotion;
    var $muscle_strength;
    var $sensation;
    var $deformaties;
    var $posture;
    var $gait_analysis;
    
    var $examination;
    var $special_tests;
    var $investigation;
    var $treatment;
    var $diagnosis;
    var $dod;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'patients';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('doa,speciality,first_name,last_name,occupation,address,mobile,dod', 'required'),
            array('tenant_id, dominance, created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('patient_id, contact_no', 'length', 'max' => 20),
            //array('tenant_id', 'default','setOnEmpty' => false, 'value' => Yii::app()->user->id, 'on' => 'insert'),
            array('patient_id', 'default', 'value' => rand(0,99999), 'on' => 'insert'),
            array('gender', 'length', 'max' => 10),
            array('email_id', 'length', 'max' => 50),
            array('mobile', 'length', 'max' => 15),
            array('mobile', 'unique', 'on' => 'insert'),
            array('mobile', 'unique', 'on' => 'update'),
            array('modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
            array('created_on,modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'insert'),
            array('status', 'default','setOnEmpty' => false, 'value' => STATUS_ACTIVE, 'on' => 'insert'),
            array('created_by', 'default','setOnEmpty' => false, 'value' => Yii::app()->user->id, 'on' => 'insert'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('doa,salutation, is_hospitalization,complaints,from_date,to_date,hospital_id,summary,complaints,history,personal_history,tenderness,swelling,warmth,rangeofmotion,muscle_strength,sensation,deformaties,posture,gait_analysis,diagnosis', 'safe'),
            array('id, tenant_id, patient_id, dob, gender, dominance, occupation, address, email_id, contact_no, mobile, created_on, created_by, modified_on, modified_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
             'profile' => array(self::HAS_ONE, 'Patientprofile', 'patient_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tenant_id' => 'Tenant',
            'patient_id' => 'Patient',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'dob' => 'Date of Birth',
            'gender' => 'Gender',
            'dominance' => 'Dominance',
            'occupation' => 'Occupation',
            'address' => 'Address',
            'email_id' => 'Email',
            'contact_no' => 'Contact No',
            'mobile' => 'Mobile',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'modified_on' => 'Modified On',
            'modified_by' => 'Modified By',
            'doa' => 'Date of Admission',
            'source' => 'Source',
            'source_location' => 'Source Location',
            'speciality' => 'Speciality',
            'area' => 'Area',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'is_hospitalization' => 'Hospitalization',
            'from_date' => 'Admission Date',
            'to_date' => 'Discharge Date',
            'summary' => 'Discharge Summary',
            'hospitalization_data' => 'Hospitalization Data',
            'compalints' => 'Patient Compalints',
            'history' => 'General History',
            'personal_history' => 'Personal History',
            'special_tests' => 'Special Tests',
            'investigation' => 'Investigations',
            'treatment' => 'Treatments',
            'diagnosis' => 'Diagnosis',
            'referred_by' => 'Referred By',
            'doa' => 'Date of Evaluation',
            'dod' => 'Date of Discharge',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $this->tenant_id = Functions::getTenant();
        $criteria->compare('status', "<>".STATUS_DELETE);
        $criteria->compare('id', $this->id);
        $criteria->compare('tenant_id', $this->tenant_id);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('middle_name', $this->middle_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('patient_id', $this->patient_id, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('dominance', $this->dominance);
        $criteria->compare('occupation', $this->occupation, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('email_id', $this->email_id, true);
        $criteria->compare('contact_no', $this->contact_no, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_on', $this->modified_on, true);
        $criteria->compare('modified_by', $this->modified_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10,
            ),
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Patient the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
