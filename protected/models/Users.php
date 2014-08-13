<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $mobile
 * @property string $date_of_birth
 * @property string $last_login
 * @property double $ip_address
 * @property string $role_id
 * @property string $created_on
 * @property string $modified_on
 * @property string $created_by
 * @property string $modified_by
 *
 * The followings are the available model relations:
 * @property Answers[] $answers
 * @property Answers[] $answers1
 * @property Questions[] $questions
 * @property Questions[] $questions1
 * @property Results[] $results
 * @property Results[] $results1
 * @property Results[] $results2
 * @property Roles[] $roles
 * @property Roles[] $roles1
 * @property Sections[] $sections
 * @property Sections[] $sections1
 * @property TestAssign[] $testAssigns
 * @property TestAssign[] $testAssigns1
 * @property TestAssign[] $testAssigns2
 * @property Tests[] $tests
 * @property Tests[] $tests1
 * @property UserAnswers[] $userAnswers
 * @property UserAnswers[] $userAnswers1
 * @property Users $modifiedBy
 * @property Users[] $users
 * @property Roles $role
 * @property Users $createdBy
 * @property Users[] $users1
 */
class Users extends CommonModel
{
	public $rememberMe;
	private $_identity;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password', 'required'),
			array('ip_address', 'numerical'),
			array('first_name, last_name', 'length', 'max'=>100),
			array('email, password', 'length', 'max'=>50),
			array('mobile', 'length', 'max'=>15),
			array('role_id, created_by, modified_by', 'length', 'max'=>11),
			array('date_of_birth, last_login, created_on, modified_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, first_name, last_name, email, password, mobile, date_of_birth, last_login, ip_address, role_id, created_on, modified_on, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'answers' => array(self::HAS_MANY, 'Answers', 'created_by'),
			'answers1' => array(self::HAS_MANY, 'Answers', 'modified_by'),
			'questions' => array(self::HAS_MANY, 'Questions', 'created_by'),
			'questions1' => array(self::HAS_MANY, 'Questions', 'modified_by'),
			'results' => array(self::HAS_MANY, 'Results', 'created_by'),
			'results1' => array(self::HAS_MANY, 'Results', 'modified_by'),
			'results2' => array(self::HAS_MANY, 'Results', 'user_id'),
			'roles' => array(self::HAS_MANY, 'Roles', 'created_by'),
			'roles1' => array(self::HAS_MANY, 'Roles', 'modified_by'),
			'sections' => array(self::HAS_MANY, 'Sections', 'created_by'),
			'sections1' => array(self::HAS_MANY, 'Sections', 'modified_by'),
			'testAssigns' => array(self::HAS_MANY, 'TestAssign', 'created_by'),
			'testAssigns1' => array(self::HAS_MANY, 'TestAssign', 'modified_by'),
			'testAssigns2' => array(self::HAS_MANY, 'TestAssign', 'user_id'),
			'tests' => array(self::HAS_MANY, 'Tests', 'created_by'),
			'tests1' => array(self::HAS_MANY, 'Tests', 'modified_by'),
			'userAnswers' => array(self::HAS_MANY, 'UserAnswers', 'created_by'),
			'userAnswers1' => array(self::HAS_MANY, 'UserAnswers', 'modified_by'),
			'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
			'users' => array(self::HAS_MANY, 'Users', 'modified_by'),
			'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
			'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
			'users1' => array(self::HAS_MANY, 'Users', 'created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'password' => 'Password',
			'mobile' => 'Mobile',
			'date_of_birth' => 'Date Of Birth',
			'last_login' => 'Last Login',
			'ip_address' => 'Ip Address',
			'role_id' => 'Role',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('ip_address',$this->ip_address);
		$criteria->compare('role_id',$this->role_id,true);
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
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
		public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
		public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			$this->_identity->authenticate();
		}
		
		if($this->_identity->errorCode===UserIdentity::ERROR_PASSWORD_INVALID)
		{
			
			$this->addError('password','Incorrect password.');

			return false;
		}
		
		if($this->_identity->errorCode===UserIdentity::ERROR_USERNAME_INVALID)
		{
			
			$this->addError('email','Incorrect Username.');

			return false;
		}
		
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	
public function getBirthdate()
{
	 return date("Y-m-d",$this->date_of_birth);
}	

}
