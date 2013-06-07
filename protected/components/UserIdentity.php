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
// 		$users=array(
// 			// username => password
// 			'demo'=>'demo',
// 			'admin'=>'admin',
// 		);

		$u1=Usr::model()->findByAttributes(array('username'=>$this->username));
		
		if($u1==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($u1->password!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->errorCode=self::ERROR_NONE;
			//$this->_id=$u1->ID;
			$this->setState('nama', $u1->username);
			$this->setState('id', $u1->id);
				
		}
		return !$this->errorCode;
	}
}