<?php

class WebUser extends CWebUser
{
	private $id;
	public function fullName()
	{
		return $this->getState('first_name')." ".$this->getState('last_name');
	}
	public function userId()
	{
		return $this->getState('id');
	}
	
	public function isAdmin()
	{
		if($this->getState('role') == '1')
		{
			return	array(Yii::app()->user->name);
		}else
		{
			return array(false);
		}
		
	}
}
?>