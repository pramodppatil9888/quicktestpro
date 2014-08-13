<?php

/**
 * This is the model class for table "answers".
 *
 * The followings are the available columns in table 'answers':
 * @property string $answer_id
 * @property string $answer
 * @property string $description
 * @property integer $correct_answer
 * @property string $question_id
 * @property string $created_on
 * @property string $modified_on
 * @property string $created_by
 * @property string $modified_by
 *
 * The followings are the available model relations:
 * @property Users $createdBy
 * @property Users $modifiedBy
 * @property Questions $question
 * @property UserAnswers[] $userAnswers
 */
class Answers extends CommonModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'answers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer, question_id', 'required'),
			array('correct_answer', 'numerical', 'integerOnly'=>true),
			array('answer', 'length', 'max'=>500),
			array('question_id, created_by, modified_by', 'length', 'max'=>11),
			array('description, created_on, modified_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('answer_id, answer, description, correct_answer, question_id, created_on, modified_on, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'Questions', 'question_id'),
			'userAnswers' => array(self::HAS_MANY, 'UserAnswers', 'answer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'answer_id' => 'Answer',
			'answer' => 'Answer',
			'description' => 'Description',
			'correct_answer' => 'Correct Answer',
			'question_id' => 'Question',
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

		$criteria->compare('answer_id',$this->answer_id,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('correct_answer',$this->correct_answer);
		$criteria->compare('question_id',$this->question_id,true);
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
	 * @return Answers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getStatusName($correct_answer)
	{
		if(isset($correct_answer))
		{
			$name = array('0'=>'wrong','1'=>'correct');
		return $name[$correct_answer];	
		}else
		{
			return "0";
		}	
	}
	

}
