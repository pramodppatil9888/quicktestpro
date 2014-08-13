<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
		/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
		public function authenticate()
	{

      $user = Users::model()->findByAttributes(array('email'=>$this->username));
      //print_r($user);exit;
	if(isset($user))
	{
		
	
 	if(isset($user->email) && $user->email != $this->username)
 		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
	elseif(isset($user->password) && $user->password  != $this->password)
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
	else
		{
			$this->setState('id',$user->user_id);
			
			$this->setState('first_name',$user->first_name);
			$this->setState('last_name',$user->last_name);
			$this->setState('role',$user->role_id);
	
			$this->errorCode=self::ERROR_NONE;
		}	
			return !$this->errorCode;
	
	}else
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			return !$this->errorCode;
		}
}




}