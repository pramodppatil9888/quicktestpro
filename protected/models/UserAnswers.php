<?php

/**
 * This is the model class for table "user_answers".
 *
 * The followings are the available columns in table 'user_answers':
 * @property string $user_answer_id
 * @property string $test_id
 * @property string $question_id
 * @property string $answer_id
 * @property string $answer
 * @property string $created_on
 * @property string $modified_on
 * @property string $created_by
 * @property string $modified_by
 *
 * The followings are the available model relations:
 * @property Answers $answer0
 * @property Users $createdBy
 * @property Users $modifiedBy
 * @property Questions $question
 * @property Tests $test
 */
class UserAnswers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_answers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_id, question_id, answer_id', 'required'),
			array('test_id, question_id, answer_id, created_by, modified_by', 'length', 'max'=>11),
			array('answer, created_on, modified_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_answer_id, test_id, question_id, answer_id, answer, created_on, modified_on, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'answer0' => array(self::BELONGS_TO, 'Answers', 'answer_id'),
			'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
			'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
			'question' => array(self::BELONGS_TO, 'Questions', 'question_id'),
			'test' => array(self::BELONGS_TO, 'Tests', 'test_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_answer_id' => 'User Answer',
			'test_id' => 'Test',
			'question_id' => 'Question',
			'answer_id' => 'Answer',
			'answer' => 'Answer',
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

		$criteria->compare('user_answer_id',$this->user_answer_id,true);
		$criteria->compare('test_id',$this->test_id,true);
		$criteria->compare('question_id',$this->question_id,true);
		$criteria->compare('answer_id',$this->answer_id,true);
		$criteria->compare('answer',$this->answer,true);
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
	 * @return UserAnswers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
