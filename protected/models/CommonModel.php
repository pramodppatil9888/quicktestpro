<?php

class CommonModel extends CActiveRecord
{
	public function beforeSave()
	{
		
		
				if(Yii::app()->user->isGuest)
				{
				$this->created_by = $this->user_id;
					$this->modified_by =$this->user_id;
					
				}
				else
				{
					$this->modified_by = Yii::app()->user->userId();
					$this->created_by = Yii::app()->user->userId();

				}
		
		if($this->scenario = "update")
			$this->modified_on = date ("Y-m-d H:i:s",time());			

		return parent::beforeSave();
	}
	
	public function fullName()
	{
		return ucfirst($this->createdBy->first_name).' '.ucfirst($this->createdBy->last_name);
	}
	
}
?>