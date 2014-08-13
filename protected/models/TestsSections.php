<?php

/**
 * This is the model class for table "tests_sections".
 *
 * The followings are the available columns in table 'tests_sections':
 * @property string $test_section_id
 * @property string $test_id
 * @property string $section_id
 * @property string $created_by
 * @property string $modified_by
 * @property string $created_on
 * @property string $modified_on
 *
 * The followings are the available model relations:
 * @property Tests $testSection
 * @property Sections $section
 * @property Users $createdBy
 * @property Users $modifiedBy
 */
class TestsSections extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tests_sections';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_id, section_id, created_by, modified_by', 'length', 'max'=>11),
			array('created_on, modified_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('test_section_id, test_id, section_id, created_by, modified_by, created_on, modified_on', 'safe', 'on'=>'search'),
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
			'testSection' => array(self::BELONGS_TO, 'Tests', 'test_section_id'),
			'section' => array(self::BELONGS_TO, 'Sections', 'section_id'),
			'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
			'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'test_section_id' => 'Test Section',
			'test_id' => 'Test',
			'section_id' => 'Section',
			'created_by' => 'Created By',
			'modified_by' => 'Modified By',
			'created_on' => 'Created On',
			'modified_on' => 'Modified On',
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

		$criteria->compare('test_section_id',$this->test_section_id,true);
		$criteria->compare('test_id',$this->test_id,true);
		$criteria->compare('section_id',$this->section_id,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('modified_by',$this->modified_by,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('modified_on',$this->modified_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestsSections the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
