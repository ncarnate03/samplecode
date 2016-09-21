<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $tenant_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $contact_no
 * @property string $username
 * @property string $password
 * @property string $address
 * @property integer $role
 * @property integer $status
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 */
class User extends CActiveRecord {
    const ROLE_ADMIN = 1;
    const ROLE_DOCTOR = 2;
    const ROLE_USER = 3;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('first_name, last_name, email, contact_no, username, password', 'required'),
            array('email', 'email'),
            array('tenant_id, status, role', 'numerical', 'integerOnly' => true),
            array('first_name, last_name, email', 'length', 'max' => 50),
            array('contact_no', 'length', 'max' => 20),
            array('username, password', 'length', 'max' => 100),
            array('status', 'default', 'value' => STATUS_ACTIVE, 'on' => 'insert'),
            array('modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
            array('created_on,modified_on', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'insert'),
            array('created_by', 'default', 'value' => Yii::app()->user->id, 'on' => 'insert'),
            array('modified_by', 'default', 'value' => Yii::app()->user->id, 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, tenant_id, first_name, last_name, email, contact_no, username, password, address, role, status, created_on, created_by, modified_on, modified_by', 'safe', 'on' => 'search'),
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'contact_no' => 'Contact No',
            'username' => 'Username',
            'password' => 'Password',
            'address' => 'Address',
            'role' => 'Role',
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
        $criteria->condition = "role <> ".User::ROLE_ADMIN." and status <>".STATUS_DELETE;
        $criteria->compare('id', $this->id);
        $criteria->compare('tenant_id', $this->tenant_id);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('contact_no', $this->contact_no, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('role', $this->role);
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
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
