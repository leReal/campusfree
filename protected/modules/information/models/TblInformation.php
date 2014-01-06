<?php

/**
 * This is the model class for table "tbl_information".
 *
 * The followings are the available columns in table 'tbl_information':
 * @property integer $id
 * @property string $titresms
 * @property string $contenusms
 * @property string $titremail
 * @property string $contenumail
 * @property integer $id_informateur
 * @property integer $etablissement_id
 * @property string $filename
 */
class TblInformation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblInformation the static model class
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
		return 'tbl_information';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titremail, contenumail', 'required'),
			array('id, id_informateur, etablissement_id', 'numerical', 'integerOnly'=>true),
			array('titresms, titremail', 'length', 'max'=>50),
			array('contenusms', 'length', 'max'=>500),
			array('contenumail', 'length', 'max'=>700),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titresms, contenusms, titremail, contenumail, id_informateur, etablissement_id', 'safe', 'on'=>'search'),
                       
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
                'informateur' => array(self::BELONGS_TO, 'User', 'id_informateur'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titresms' => 'Titre du SMS',
			'contenusms' => 'Contenu du SMS',
			'titremail' => "Titre",
			'contenumail' => "Contenu ",
			'id_informateur' => 'Informateur',
			'etablissement_id' => 'Etablissement',
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
		$criteria->compare('titresms',$this->titresms,true);
		$criteria->compare('contenusms',$this->contenusms,true);
		$criteria->compare('titremail',$this->titremail,true);
		$criteria->compare('contenumail',$this->contenumail,true);
		$criteria->compare('id_informateur',$this->id_informateur);
		$criteria->compare('etablissement_id',$this->etablissement_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
     public function behaviors()
            {
                return array(
                    'image' => array(
                        'class' => 'ext.AttachmentBehavior.AttachmentBehavior',
                        # Should be a DB field to store path/filename
                        'attribute' => 'filename',
                        # Default image to return if no image path is found in the DB
                        //'fallback_image' => 'images/sample_image.gif',
                        'path' => "uploads/:model/:id.:ext",
                        'processors' => array(
                            array(
                                # Currently GD Image Processor and Imagick Supported
                                'class' => 'ImagickProcessor',
                                'method' => 'resize',
                                'params' => array(
                                    'width' => 310,
                                    'height' => 150,
                                    'keepratio' => true
                                )
                            )
                        ),
                        'styles' => array(
                            # name => size 
                            # use ! if you would like 'keepratio' => false
                            'thumb' => '!100x60',
                        )           
                    ),
                );
            }
}