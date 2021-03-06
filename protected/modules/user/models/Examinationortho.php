<?php

/**
 * This is the model class for table "examinationortho".
 *
 * The followings are the available columns in table 'examinationortho':
 * @property integer $id
 * @property string $title
 * @property integer $pateint_id
 * @property string $tenderness
 * @property string $swelling
 * @property string $warmth
 * @property string $rangeofmotion
 * @property string $muscle_strength
 * @property string $sensation
 * @property string $deformaties
 * @property string $posture
 * @property string $gait_analysis
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 */
class Examinationortho extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'examinationortho';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, pateint_id, tenderness, swelling, warmth, rangeofmotion, muscle_strength, sensation, deformaties, posture, gait_analysis, created_on, created_by, modified_on, modified_by', 'required'),
			array('pateint_id, created_by, modified_by', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, pateint_id, tenderness, swelling, warmth, rangeofmotion, muscle_strength, sensation, deformaties, posture, gait_analysis, created_on, created_by, modified_on, modified_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'pateint_id' => 'Pateint',
			'tenderness' => 'Tenderness',
			'swelling' => 'Swelling',
			'warmth' => 'Warmth',
			'rangeofmotion' => 'Rangeofmotion',
			'muscle_strength' => 'Muscle Strength',
			'sensation' => 'Sensation',
			'deformaties' => 'Deformaties',
			'posture' => 'Posture',
			'gait_analysis' => 'Gait Analysis',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('pateint_id',$this->pateint_id);
		$criteria->compare('tenderness',$this->tenderness,true);
		$criteria->compare('swelling',$this->swelling,true);
		$criteria->compare('warmth',$this->warmth,true);
		$criteria->compare('rangeofmotion',$this->rangeofmotion,true);
		$criteria->compare('muscle_strength',$this->muscle_strength,true);
		$criteria->compare('sensation',$this->sensation,true);
		$criteria->compare('deformaties',$this->deformaties,true);
		$criteria->compare('posture',$this->posture,true);
		$criteria->compare('gait_analysis',$this->gait_analysis,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_on',$this->modified_on,true);
		$criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Examinationortho the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
