<?php

/**
 * This is the model class for table "patientprofile".
 *
 * The followings are the available columns in table 'patientprofile':
 * @property integer $id
 * @property string $patient_id
 * @property string $doa
 * @property integer $source
 * @property string $source_location
 * @property integer $speciality
 * @property integer $area
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property integer $is_hospitalization
 * @property string $hospitalization_data
 * @property string $compalints
 * @property string $history
 * @property string $personal_history
 * @property string $examination
 * @property string $special_tests
 * @property string $investigation
 * @property string $treatment
 * @property string $dod
 * @property string $status
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 */
class Patientprofile extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'patientprofile';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('patient_id', 'required'),
            array('source, speciality, area, is_hospitalization, created_by, modified_by, status', 'numerical', 'integerOnly' => true),
            array('patient_id', 'length', 'max' => 20),
            array('source_location', 'length', 'max' => 200),
            array('modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
            array('created_on,modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'insert'),
            array('status', 'default','setOnEmpty' => false, 'value' => STATUS_ACTIVE, 'on' => 'insert'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, patient_id, doa, source, source_location, speciality, area,is_hospitalization, hospitalization_data, compalints, history, personal_history,examination, special_tests, investigation, treatment, diagnosis, referred_by, dod, created_on, created_by, modified_on, modified_by, referred_by', 'safe'),
            array('id, patient_id, doa, source, source_location, speciality, area, is_hospitalization, hospitalization_data, compalints, history, personal_history,examination, special_tests, investigation, treatment, dod, created_on, created_by, modified_on, modified_by', 'safe', 'on' => 'search'),
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
            'patient_id' => 'Patient ID',
            'doa' => 'Date of Admission',
            'source' => 'Source',
            'source_location' => 'Source Location',
            'speciality' => 'Speciality',
            'area' => 'Area',
            'is_hospitalization' => 'Is Hospitalization',
            'hospitalization_data' => 'Hospitalization Data',
            'compalints' => 'Patient Compalints',
            'history' => 'General History',
            'personal_history' => 'Personal History',
            'examination' => 'Examination',
            'special_tests' => 'Special Tests',
            'investigation' => 'Investigations',
            'treatment' => 'Treatments',
            'dod' => 'Date of Discharge',
            'status' => 'Status',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'modified_on' => 'Modified On',
            'modified_by' => 'Modified By',
            'referred_by' => 'Referred By',
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
        $this->status = STATUS_ACTIVE;
        $criteria->compare('id', $this->id);
        $criteria->compare('patient_id', $this->patient_id, true);
        $criteria->compare('doa', $this->doa, true);
        $criteria->compare('source', $this->source);
        $criteria->compare('source_location', $this->source_location, true);
        $criteria->compare('speciality', $this->speciality);
        $criteria->compare('area', $this->area);
        $criteria->compare('is_hospitalization', $this->is_hospitalization);
        $criteria->compare('hospitalization_data', $this->hospitalization_data, true);
        $criteria->compare('compalints', $this->compalints, true);
        $criteria->compare('history', $this->history, true);
        $criteria->compare('personal_history', $this->personal_history, true);
        $criteria->compare('special_tests', $this->special_tests, true);
        $criteria->compare('investigation', $this->investigation, true);
        $criteria->compare('treatment', $this->treatment, true);
        $criteria->compare('dod', $this->dod, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_on', $this->modified_on, true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('referred_by', $this->referred_by);
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
     * @return Patientprofile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
