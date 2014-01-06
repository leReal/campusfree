<?php

class User extends CActiveRecord
{
       //varaible de verification du mot de passe
       	public $verifyPassword;

        //Variable pour récupérer la liste des classes de l'informateur
        var $classes=array();
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANNED=-1;
	
	//TODO: Delete for next version (backward compatibility)
	const STATUS_BANED=-1;
        
        // holds the password confirmation word
        public $repeat_password;

        //will hold the encrypted password for update actions.
        public $initialPassword;
	
	/**
	 * The followings are the available columns in table 'users':
	 * @var integer $id
	 * @var string $username
	 * @var string $nom
	 * @var string $password
	 * @var string $email
	 * @var string $activkey
	 * @var integer $createtime
	 * @var integer $lastvisit
	 * @var integer $superuser
	 * @var integer $status
         * @var timestamp $create_at
         * @var timestamp $lastvisit_at
         * @var type
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->getModule('user')->tableUsers;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.CConsoleApplication
		return ((get_class(Yii::app())=='CConsoleApplication' || (get_class(Yii::app())!='CConsoleApplication' && Yii::app()->getModule('user')->isAdmin()))?array(
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Login incorrect (longueur entre 3 et 20 caractères).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Mot de passe incorect (longueur minimum de 4 symboles).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("Ce compte  existe déjà.")),
			array('email', 'unique', 'message' => UserModule::t("Cette adresse mail est déjà attribuée.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Symboles incorrects (A-z0-9).")),
			array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANNED)),
			array('superuser', 'in', 'range'=>array(0,1)),
			array('type', 'in', 'range'=>array(1,2,3,4)),
                        array('create_at', 'default', 'value' => date('Y-m-d H:i:s'), 'setOnEmpty' => true, 'on' => 'insert'),
                        array('lastvisit_at', 'default', 'value' => '0000-00-00 00:00:00', 'setOnEmpty' => true, 'on' => 'insert'),
			array('username, email,password, verifyPassword, superuser, nom, status, type', 'required'),
			array('superuser, status, type', 'numerical', 'integerOnly'=>true),
			array('id, username, password, nom, email, activkey, create_at, lastvisit_at, superuser, status, type', 'safe', 'on'=>'search'),
                        ):((Yii::app()->user->id==$this->id)?array(
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Login incorrect (Longueur entre 3 et 20 caractères).")),
			array('email', 'email'),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => UserModule::t("Retype Password is incorrect.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Symboles incorrects (A-z0-9).")),
                        array('password, repeat_password', 'required', 'on'=>'insert'),
                        array('password, repeat_password', 'length', 'min'=>6, 'max'=>40),
                        array('password', 'compare', 'compareAttribute'=>'repeat_password'),    
		):array()));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        $relations = Yii::app()->getModule('user')->relations;

        if (!isset($relations['profile']))
            $relations['profile'] = array(self::HAS_ONE, 'Profile', 'user_id');
        
            $relations['tblInformations'] = array(self::HAS_MANY, 'TblInformation', 'id_informateur');
            $relations['type0'] = array(self::BELONGS_TO, 'TblTypeUtlisateur', 'type');
            
        return $relations;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => UserModule::t("Id"),
			'username'=>UserModule::t("login"),
			'password'=>UserModule::t("Mot de passe"),
			'verifyPassword'=>UserModule::t("Confirmer mot de passe"),
			'email'=>UserModule::t("E-mail"),
			'verifyCode'=>UserModule::t("Code de vérification"),
			'activkey' => UserModule::t("Clé d'activation"),
			'createtime' => UserModule::t("Heure de création"),
			'create_at' => UserModule::t("Date de création"),
			
			'lastvisit_at' => UserModule::t("Date de dernière connexion"),
			'superuser' => UserModule::t("Superuser"),
			'status' => UserModule::t("Statut"),
                        'nom' => UserModule::t("Nom"),
                        'prenom' => UserModule::t("Prénom"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactive'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANNED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
            'notsafe'=>array(
            	'select' => 'id, username, password, email, activkey, create_at, lastvisit_at, superuser, status, type',
            ),
        );
    }
	
	public function defaultScope()
    {
        return CMap::mergeArray(Yii::app()->getModule('user')->defaultScope,array(
            'alias'=>'user',
            'select' => 'user.id, user.nom, user.prenom, user.username, user.email, user.create_at, user.lastvisit_at, user.superuser, user.status, user.type',
        ));
    }
	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_NOACTIVE => UserModule::t('Not active'),
				self::STATUS_ACTIVE => UserModule::t('Active'),
				self::STATUS_BANNED => UserModule::t('Banned'),
			),
			'AdminStatus' => array(
				'0' => UserModule::t('No'),
				'1' => UserModule::t('Yes'),
			),
                        'UserTypes' => array(
				'1' => UserModule::t('Informateur'),
				'2' => UserModule::t('Coordonnateur'),
				'3' => UserModule::t('Représentant'),
				'4' => UserModule::t('Administrateur'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
	
/**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        
        $criteria->compare('id',$this->id);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('nom',$this->nom,true);
        $criteria->compare('password',$this->password);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('activkey',$this->activkey);
        $criteria->compare('create_at',$this->create_at);
        $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('superuser',$this->superuser);
        $criteria->compare('status',$this->status);
        $criteria->compare('type',$this->type);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        	'pagination'=>array(
				'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
        ));
    }

    public function getCreatetime() {
        return strtotime($this->create_at);
    }

    public function setCreatetime($value) {
        $this->create_at=date('Y-m-d H:i:s',$value);
    }

    public function getLastvisit() {
        return strtotime($this->lastvisit_at);
    }

    public function setLastvisit($value) {
        $this->lastvisit_at=date('Y-m-d H:i:s',$value);
    }
    
    
    
}