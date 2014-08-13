<?php

/**
 * This is the model class for table "results".
 *
 * The followings are the available columns in table 'results':
 * @property string $result_id
 * @property string $test_id
 * @property double $total_score
 * @property string $user_id
 * @property integer $total_attempt
 * @property integer $total_correct
 * @property double $percentage
 * @property integer $taken_duration
 * @property string $created_on
 * @property string $modified_on
 * @property string $created_by
 * @property string $modified_by
 *
 * The followings are the available model relations:
 * @property Users $createdBy
 * @property Users $modifiedBy
 * @property Tests $test
 * @property Users $user
 */
class Results extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'results';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_id, total_score, user_id, total_attempt, total_correct, percentage, taken_duration', 'required'),
			array('total_attempt, total_correct, taken_duration', 'numerical', 'integerOnly'=>true),
			array('total_score, percentage', 'numerical'),
			array('test_id, user_id, created_by, modified_by', 'length', 'max'=>11),
			array('created_on, modified_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('result_id, test_id, total_score, user_id, total_attempt, total_correct, percentage, taken_duration, created_on, modified_on, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
			'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
			'test' => array(self::BELONGS_TO, 'Tests', 'test_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'result_id' => 'Result',
			'test_id' => 'Test',
			'total_score' => 'Total Score',
			'user_id' => 'User',
			'total_attempt' => 'Total Attempt',
			'total_correct' => 'Total Correct',
			'percentage' => 'Percentage',
			'taken_duration' => 'Taken Duration',
			'created_on' => 'Created On',
			'modified_on' => 'Modified On',
			'created_by' => 'Created By',
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

		$criteria->compare('result_id',$this->result_id,true);
		$criteria->compare('test_id',$this->test_id,true);
		$criteria->compare('total_score',$this->total_score);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('total_attempt',$this->total_attempt);
		$criteria->compare('total_correct',$this->total_correct);
		$criteria->compare('percentage',$this->percentage);
		$criteria->compare('taken_duration',$this->taken_duration);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('modified_on',$this->modified_on,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('modified_by',$this->modified_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Results the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
