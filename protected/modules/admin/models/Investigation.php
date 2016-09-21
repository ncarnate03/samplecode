<?php

/**
 * This is the model class for table "treatments".
 *
 * The followings are the available columns in table 'treatments':
 * @property integer $id
 * @property string $title
 * @property integer $speciality_id
 * @property string $description
 * @property integer $status
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 */
class Investigation extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'investigations';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            //array('created_by, modified_by', 'numerical', 'integerOnly'=>true),
            array('title', 'length', 'max' => 100),
            array('status', 'default', 'setOnEmpty' => false, 'value' =>STATUS_ACTIVE, 'on' => 'insert'),
            array('modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
            array('created_on,modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'insert'),
            array('created_by', 'default','setOnEmpty' => false,'value' => Yii::app()->user->id, 'on' => 'insert'),
            array('modified_by', 'default','setOnEmpty' => false, 'value' => Yii::app()->user->id, 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, description, status, created_on, created_by, modified_on, modified_by', 'safe', 'on' => 'search'),
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
            'title' => 'Title',
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
        $criteria->condition = "status <> ".STATUS_DELETE;
        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_on', $this->modified_on, true);
        $criteria->compare('modified_by', $this->modified_by);
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination' => array(
                        'pageSize' => 10,
                ),
                'sort'=>array(
                        'defaultOrder'=>'id desc',
                ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Treatments the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
