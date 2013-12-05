<?php

/**
 * This is the model class for table "tbl_utilisateur".
 *
 * The followings are the available columns in table 'tbl_utilisateur':
 * @property integer $id
 * @property string $login
 * @property string $motdepasse
 * @property string $nom
 * @property string $prenom
 * @property string $adresseemail1
 * @property string $adresseemail2
 * @property string $telephone1
 * @property string $telephone2
 * @property string $lieunaissance
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property TblInformation[] $tblInformations
 * @property TblTypeUtlisateur $type0
 */
class TblUtilisateur extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblUtilisateur the static model class
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
		return 'tbl_utilisateur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, motdepasse, nom, adresseemail1,', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('login, motdepasse', 'length', 'max'=>20),
			array('nom, prenom, adresseemail1, adresseemail2', 'length', 'max'=>50),
			array('telephone1, telephone2', 'length', 'max'=>10),
			array('lieunaissance', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, motdepasse, nom, prenom, adresseemail1, adresseemail2, telephone1, telephone2, lieunaissance, type', 'safe', 'on'=>'search'),
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
			'tblInformations' => array(self::HAS_MANY, 'TblInformation', 'id_informateur'),
			'type0' => array(self::BELONGS_TO, 'TblTypeUtlisateur', 'type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identifiant',
			'login' => 'Login',
			'motdepasse' => 'Mot de passe',
			'nom' => 'Nom',
			'prenom' => 'Prénom',
			'adresseemail1' => 'Adresse email 1',
			'adresseemail2' => 'Adresse email 2',
			'telephone1' => 'Telephone1',
			'telephone2' => 'Telephone2',
			'lieunaissance' => 'Lieu de naissance',
			'type' => 'Type',
		);
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('motdepasse',$this->motdepasse,true);
		$criteria->compare('nom',$this->nom,true);
		$criteria->compare('prenom',$this->prenom,true);
		$criteria->compare('adresseemail1',$this->adresseemail1,true);
		$criteria->compare('adresseemail2',$this->adresseemail2,true);
		$criteria->compare('telephone1',$this->telephone1,true);
		$criteria->compare('telephone2',$this->telephone2,true);
		$criteria->compare('lieunaissance',$this->lieunaissance,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}