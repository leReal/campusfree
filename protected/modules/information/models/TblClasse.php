<?php

/**
 * This is the model class for table "tbl_classe".
 *
 * The followings are the available columns in table 'tbl_classe':
 * @property integer $id
 * @property string $nom
 * @property integer $id_filiere
 */
class TblClasse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblClasse the static model class
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
		return 'tbl_classe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom, id_filiere', 'required'),
			array('id, id_filiere', 'numerical', 'integerOnly'=>true),
			array('nom', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, id_filiere', 'safe', 'on'=>'search'),
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
                'eFILIERE' => array(self::BELONGS_TO, 'tbl_filiere', 'id_filiere'),
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
			'id_filiere' => 'Filière',
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
		$criteria->compare('id_filiere',$this->id_filiere);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}