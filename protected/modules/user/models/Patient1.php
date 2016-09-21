<?php

/**
 * This is the model class for table "patients".
 *
 * The followings are the available columns in table 'patients':
 * @property integer $id
 * @property integer $tenant_id
 * @property string $patient_id
 * @property integer $source
 * @property integer $speciality
 * @property integer $area
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $dob
 * @property string $age
 * @property string $gender
 * @property integer $dominance
 * @property string $occupation
 * @property string $address
 * @property string $email_id
 * @property string $contact_no
 * @property integer $is_surgery
 * @property string $tests
 * @property string $investigations
 * @property string $treatments
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 */
class Patient extends CActiveRecord {

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
            array('first_name, middle_name, last_name, dob, age, gender, dominance, email_id, contact_no', 'required'),
            array('tenant_id, source, speciality, area, dominance, is_surgery, created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('patient_id, contact_no', 'length', 'max' => 20),
            array('first_name, middle_name, last_name, age, email_id', 'length', 'max' => 50),
            array('gender', 'length', 'max' => 10),
            array('tenant_id', 'default', 'setOnEmpty' => false, 'value' => Functions::getTenant(), 'on' => 'insert'),
            array('status', 'default', 'setOnEmpty' => false, 'value' => STATUS_ACTIVE, 'on' => 'insert'),
            array('modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
            array('created_on,modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'insert'),
            array('created_by', 'default', 'setOnEmpty' => false, 'value' => Yii::app()->user->id, 'on' => 'insert'),
            array('modified_by', 'default', 'setOnEmpty' => false, 'value' => Yii::app()->user->id, 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, tenant_id, patient_id, source, speciality, area, first_name, middle_name, last_name, dob, age, gender, dominance, occupation, address, email_id, contact_no, is_surgery, tests, investigations, treatments, created_on, created_by, modified_on, modified_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
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
            'source' => 'Source',
            'speciality' => 'Speciality',
            'area' => 'Area',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'dob' => 'Dob',
            'age' => 'Age',
            'gender' => 'Gender',
            'dominance' => 'Dominance',
            'occupation' => 'Occupation',
            'address' => 'Address',
            'email_id' => 'Email',
            'contact_no' => 'Contact No',
            'is_surgery' => 'Is Surgery',
            'tests' => 'Tests',
            'investigations' => 'Investigations',
            'treatments' => 'Treatments',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'modified_on' => 'Modified On',
            'modified_by' => 'Modified By',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('tenant_id', $this->tenant_id);
        $criteria->compare('patient_id', $this->patient_id, true);
        $criteria->compare('source', $this->source);
        $criteria->compare('speciality', $this->speciality);
        $criteria->compare('area', $this->area);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('middle_name', $this->middle_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('age', $this->age, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('dominance', $this->dominance);
        $criteria->compare('occupation', $this->occupation, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('email_id', $this->email_id, true);
        $criteria->compare('contact_no', $this->contact_no, true);
        $criteria->compare('is_surgery', $this->is_surgery);
        $criteria->compare('tests', $this->tests, true);
        $criteria->compare('investigations', $this->investigations, true);
        $criteria->compare('treatments', $this->treatments, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_on', $this->modified_on, true);
        $criteria->compare('modified_by', $this->modified_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
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
