<?php

/**
 * This is the model class for table "tbl_etablissement".
 *
 * The followings are the available columns in table 'tbl_etablissement':
 * @property integer $id
 * @property string $nom
 * @property string $adresse
 * @property string $telephone1
 * @property string $telephone2
 * @property string $telephone3
 * @property string $boitepostale
 * @property string $ville
 * @property integer $id_institution
 */
class TblEtablissement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblEtablissement the static model class
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
		return 'tbl_etablissement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom, adresse, telephone1,ville, id_institution', 'required'),
			array('id, id_institution', 'numerical', 'integerOnly'=>true),
			array('nom, adresse', 'length', 'max'=>100),
			array('telephone1, telephone2, telephone3, boitepostale', 'length', 'max'=>10),
			array('ville', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, adresse, telephone1, telephone2, telephone3, boitepostale, ville, id_institution', 'safe', 'on'=>'search'),
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
                'iNSTITUTION' => array(self::BELONGS_TO, 'tbl_institution', 'id_institution'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identifiant',
			'nom' => 'Nom',
			'adresse' => 'Adresse',
			'telephone1' => 'Telephone1',
			'telephone2' => 'Telephone2',
			'telephone3' => 'Telephone3',
			'boitepostale' => 'Boite postale',
			'ville' => 'Ville',
			'id_institution' => 'Institution',
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
		$criteria->compare('nom',$this->nom,true);
		$criteria->compare('adresse',$this->adresse,true);
		$criteria->compare('telephone1',$this->telephone1,true);
		$criteria->compare('telephone2',$this->telephone2,true);
		$criteria->compare('telephone3',$this->telephone3,true);
		$criteria->compare('boitepostale',$this->boitepostale,true);
		$criteria->compare('ville',$this->ville,true);
		$criteria->compare('id_institution',$this->id_institution);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}