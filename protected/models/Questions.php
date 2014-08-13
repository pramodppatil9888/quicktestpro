<?php

/**
 * This is the model class for table "questions".
 *
 * The followings are the available columns in table 'questions':
 * @property string $question_id
 * @property string $question
 * @property integer $multiple_answer
 * @property string $subject_id
 * @property double $marks
 * @property integer $negative
 * @property string $section_id
 * @property string $created_on
 * @property string $modified_on
 * @property string $created_by
 * @property string $modified_by
 *
 * The followings are the available model relations:
 * @property Answers[] $answers
 * @property Subjects $subject
 * @property Users $createdBy
 * @property Users $modifiedBy
 * @property Sections $section
 * @property UserAnswers[] $userAnswers
 */
class Questions extends CommonModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, multiple_answer, subject_id, marks', 'required'),
			array('multiple_answer, negative', 'numerical', 'integerOnly'=>true),
			array('marks', 'numerical'),
			array('question', 'length', 'max'=>500),
			array('subject_id, section_id, created_by, modified_by', 'length', 'max'=>11),
			array('created_on, modified_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('question_id, question, multiple_answer, subject_id, marks, negative, section_id, created_on, modified_on, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'answers' => array(self::HAS_MANY, 'Answers', 'question_id'),
			'subject' => array(self::BELONGS_TO, 'Subjects', 'subject_id'),
			'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
			'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
			'section' => array(self::BELONGS_TO, 'Sections', 'section_id'),
			'userAnswers' => array(self::HAS_MANY, 'UserAnswers', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'question_id' => 'Question',
			'question' => 'Question',
			'multiple_answer' => 'Multiple Answer',
			'subject_id' => 'Subject',
			'marks' => 'Marks',
			'negative' => 'Negative',
			'section_id' => 'Section',
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

		$criteria->compare('question_id',$this->question_id,true);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('multiple_answer',$this->multiple_answer);
		$criteria->compare('subject_id',$this->subject_id,true);
		$criteria->compare('marks',$this->marks);
		$criteria->compare('negative',$this->negative);
		$criteria->compare('section_id',$this->section_id,true);
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
	 * @return Questions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getMultipleOption($multiple_answer)
	{
		$name = array('0'=>'Single Type','1'=>'Multiple Type');
		return $name[$multiple_answer];	
	}
	
	public function getOption($negative)
	{
		$name = array('0'=>'Positive type','1'=>'negative type');
		return $name[$negative];	
	}
	
	public function getStatusName($correct_answer=NULL)
	{
		if(isset($correct_answer))
		{
			$name = array('0'=>'wrong','1'=>'correct');
			return $name[$correct_answer];
		}else
		{
			return "--";
		}	
	}
}
