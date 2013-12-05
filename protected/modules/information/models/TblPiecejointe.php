<?php

/**
 * This is the model class for table "tbl_piecejointe".
 *
 * The followings are the available columns in table 'tbl_piecejointe':
 * @property integer $id
 * @property integer $information_id
 * @property string $contenu
 * @property string $filename
 * @property string $filetype
 */
class TblPiecejointe extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblPiecejointe the static model class
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
		return 'tbl_piecejointe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('information_id, contenu, filename, filetype', 'required'),
			array('information_id', 'numerical', 'integerOnly'=>true),
			array('filename', 'length', 'max'=>100),
			array('filetype', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, information_id, contenu, filename, filetype', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'information_id' => 'Information',
			'contenu' => 'Contenu',
			'filename' => 'Filename',
			'filetype' => 'Filetype',
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
		$criteria->compare('information_id',$this->information_id);
		$criteria->compare('contenu',$this->contenu,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('filetype',$this->filetype,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}