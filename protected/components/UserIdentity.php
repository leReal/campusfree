<?php

include '\..\modules\information\models\TblUtilisateur.php';
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
	 * @var TblUtilisateur utilisateur
	 */
	public $utilisateur;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
//	public function authenticate()
//	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
//	}
        public function authenticate()
	{
		$users=array(
			// username => password
			'login'=>$this->username,
			'motdepasse'=>$this->password,
		);
                Yii::trace(get_class($this).'.authenticate()','On commence');
		if($this->username == null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
                else{
                    $utilisateur = new TblUtilisateur();
                    $utilisateur->setAttribute("login", $this->username);
                    $utilisateur->setAttribute("motdepasse", $this->password);

                    $nbMax = 1;
                    $count = 0;
                    foreach ($utilisateur->findAllByAttributes($users,'',array()) as $value) {
                        $count++;
                        $this->utilisateur = $value;
                        Yii::trace(get_class($this).'.authenticate()','On a set '.$this->utilisateur->getAttribute("login"));
                    }
                     Yii::trace(get_class($this).'.authenticate()','nb trouvé : '.$count);
                    if($count == 0)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
                    else if($count > $nbMax)
                        $this->errorCode=self::ERROR_PASSWORD_INVALID;
                    else {
                        $this->errorCode=self::ERROR_NONE;
                    }
                }
		
		return !$this->errorCode;
	}
}