<?php

/**
 * This is the model class for table "surgeryhistory".
 *
 * The followings are the available columns in table 'surgeryhistory':
 * @property integer $id
 * @property integer $tenant_id
 * @property integer $pateint_id
 * @property integer $hospital_id
 * @property string $from_date
 * @property string $to_date
 * @property string $description
 * @property integer $status
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 */
class Surgeryhistory extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'surgeryhistory';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tenant_id, pateint_id, hospital_id, from_date, to_date, description', 'required'),
            array('tenant_id, pateint_id, hospital_id, status, created_by, modified_by', 'numerical', 'integerOnly' => true),
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
            array('id, tenant_id, pateint_id, hospital_id, from_date, to_date, description, status, created_on, created_by, modified_on, modified_by', 'safe', 'on' => 'search'),
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
            'pateint_id' => 'Pateint',
            'hospital_id' => 'Hospital',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'description' => 'Description',
            'status' => 'Status',
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
        $criteria->compare('pateint_id', $this->pateint_id);
        $criteria->compare('hospital_id', $this->hospital_id);
        $criteria->compare('from_date', $this->from_date, true);
        $criteria->compare('to_date', $this->to_date, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('status', $this->status);
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
     * @return Surgeryhistory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
