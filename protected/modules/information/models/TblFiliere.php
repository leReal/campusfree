<?php

/**
 * This is the model class for table "tbl_filiere".
 *
 * The followings are the available columns in table 'tbl_filiere':
 * @property integer $id
 * @property string $nom
 * @property integer $id_etablissement
 */
class TblFiliere extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblFiliere the static model class
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
		return 'tbl_filiere';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom, id_etablissement', 'required'),
			array('id, id_etablissement', 'numerical', 'integerOnly'=>true),
			array('nom', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, id_etablissement', 'safe', 'on'=>'search'),
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
                'eTABLISSEMENT' => array(self::BELONGS_TO, 'TblEtablissement', 'id_etablissement'),
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
			'id_etablissement' => 'Etablissement',
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
		$criteria->compare('id_etablissement',$this->id_etablissement);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}