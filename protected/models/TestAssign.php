<?php

/**
 * This is the model class for table "test_assign".
 *
 * The followings are the available columns in table 'test_assign':
 * @property string $test_assign_id
 * @property string $test_id
 * @property string $user_id
 * @property string $role_id
 * @property integer $status
 * @property string $created_on
 * @property string $modified_on
 * @property string $created_by
 * @property string $modified_by
 *
 * The followings are the available model relations:
 * @property Users $createdBy
 * @property Users $modifiedBy
 * @property Roles $role
 * @property Tests $test
 * @property Users $user
 */
class TestAssign extends CommonModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_assign';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_id,status','required','on'=>'statusChange'),
			array('test_id, user_id, role_id, status', 'required','on'=>'insert,update'),

			array('status', 'numerical', 'integerOnly'=>true),
			array('test_id, user_id, role_id, created_by, modified_by', 'length', 'max'=>50),
			array('modified_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('test_assign_id, test_id, user_id, role_id, status, created_on, modified_on, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
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
			'test_assign_id' => 'Test Assign',
			'test_id' => 'Test',
			'user_id' => 'User',
			'role_id' => 'Role',
			'status' => 'Status',
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

		$criteria->compare('test_assign_id',$this->test_assign_id,true);
		$criteria->compare('test_id',$this->test_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('role_id',$this->role_id,true);
		$criteria->compare('status',$this->status);
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
	 * @return TestAssign the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function fullName()
	{
		return ucfirst($this->user->first_name).' '.ucfirst($this->user->last_name);
	}
	
	public function getStatusName($status)
	{
		$name = array('0'=>'InActive','1'=>'Active');
		return $name[$status];	
	}
	public function getOption($negative)
	{
		$name = array('0'=>'Positive type','1'=>'negative type');
		return $name[$negative];	
	}

}
 