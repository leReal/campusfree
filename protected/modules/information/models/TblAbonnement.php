<?php

/**
 * This is the model class for table "tbl_abonnement".
 *
 * The followings are the available columns in table 'tbl_abonnement':
 * @property integer $id
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property integer $classe_id
 * @property string $adresseemail1
 * @property string $adresseemail2
 * @property string $telephone1
 * @property string $telephone2
 * @property string $telephone3
 * @property string $datenaissance
 * @property string $adresse
 * @property int $package
 * @property string $photo
 */
class TblAbonnement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblAbonnement the static model class
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
		return 'tbl_abonnement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('matricule, nom, classe_id, adresseemail1, telephone1, adresse, package', 'required'),
			array('id, classe_id', 'numerical', 'integerOnly'=>true),
			array('matricule', 'length', 'max'=>15),
			array('nom, prenom, adresseemail1, adresseemail2, adresse, package', 'length', 'max'=>50),
			array('matricule', 'unique', 'message' => "Matricule appartenant déjà à un abonné!!!!"),
			array('adresseemail1', 'unique', 'message' => "Cette adresse email est déjà attribuée à un abonné!!!"),
			array('telephone1', 'unique', 'message' => "Ce numéro appartient déjà à un abonné!!!"),
			array('telephone1, telephone2, telephone3', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, matricule, nom, prenom, classe_id, adresseemail1, adresseemail2, telephone1, telephone2, telephone3, datenaissance, adresse, package, photo', 'safe', 'on'=>'search'),
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
                    'packages' => array(self::BELONGS_TO, 'TblPackage', 'package'),
                    'classe' => array(self::BELONGS_TO, 'TblClasse', 'classe_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identifiant',
			'matricule' => 'Matricule',
			'nom' => 'Nom',
			'prenom' => 'Prenom',
			'classe_id' => 'Classe',
			'adresseemail1' => 'Adresse email',
			'adresseemail2' => 'Adresse email',
			'telephone1' => 'Téléphone',
			'telephone2' => 'Téléphone 2',
			'telephone3' => 'Téléphone 3',
			'datenaissance' => 'Date de naissance',
			'adresse' => 'Adresse',
			'package' => 'Package',
			'photo' => 'Photo',
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
		$criteria->compare('matricule',$this->matricule,true);
		$criteria->compare('nom',$this->nom,true);
		$criteria->compare('prenom',$this->prenom,true);
		$criteria->compare('classe_id',$this->classe_id);
		$criteria->compare('adresseemail1',$this->adresseemail1,true);
		$criteria->compare('adresseemail2',$this->adresseemail2,true);
		$criteria->compare('telephone1',$this->telephone1,true);
		$criteria->compare('telephone2',$this->telephone2,true);
		$criteria->compare('telephone3',$this->telephone3,true);
		$criteria->compare('datenaissance',$this->datenaissance,true);
		$criteria->compare('adresse',$this->adresse,true);
		$criteria->compare('package',$this->package,true);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}