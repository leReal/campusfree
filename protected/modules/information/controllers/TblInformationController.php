<?php

class TblInformationController extends Controller
{
    
        /**
         * Tableau des fichiers upload
         * @var <array>
         */
        public $fichier_a_upload = array();
        /**
         * Nombre de fichiers upload
         * @var <int>
         */
        public $nb_fichier_a_upload = 0;
        /**
         * Repertoire pour upload
         * @var <string>
         */
        public $rep_upload ;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        
        public function getNb_fichier_a_upload() {
            if(!isset($_SESSION['nb_fichier_a_upload'])){
                return 0;
            }
            return $_SESSION['nb_fichier_a_upload'];

        }

        public function setNb_fichier_a_upload($nb_fichier_a_upload) {
            $_SESSION['nb_fichier_a_upload'] = $nb_fichier_a_upload;
        }
        public function fichier_a_upload($fichier){
            if(!isset($_SESSION['fichier_a_upload'])){
               $_SESSION['fichier_a_upload'] = array();
            }
            $_SESSION['fichier_a_upload'][$this->getNb_fichier_a_upload()] = $fichier;

            $this->setNb_fichier_a_upload($this->getNb_fichier_a_upload() + 1);
        }
        public function getFichier($index){
            if ($index < $this->getNb_fichier_a_upload()){
                return $_SESSION['fichier_a_upload'][$index];
            }
            return '';
        }
        public function initialise_var_fichier(){
            unset ($_SESSION['fichier_a_upload']);
            unset ($_SESSION['nb_fichier_a_upload']);
        }


        /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload', 'resetUploadFile'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
             Yii::import('ext.yii-mail.YiiMailMessage');
		$model=new TblInformation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

            

		if(isset($_POST['TblInformation']))
		{
                    $model->attributes=$_POST['TblInformation'];
                        $message= new YiiMailMessage;

                        $message->subject    = $model->titremail;
                        $message->setBody($model->contenumail, 'text/html');
                        $message->addTo("elvis.tchikapa@gmail.com");
                        $message->addTo("rostowgokeng@gmail.com");
                        $message->addTo("elvistchikapa@yahoo.com");
                        $message->from = Yii::app()->params['adminEmail'];

                        Yii::trace(get_class($this).'.create()','Message chargé');
                        /**
                         * Parcourir l'ensemble des fichier uplodés et les attacher ds le message
                         */
                        Yii::trace(get_class($this).'.create()','Message chargé '.$this->getNb_fichier_a_upload());
                        for ($index = 0; $index < $this->getNb_fichier_a_upload(); $index++) {

                            $swiftAttachment = Swift_Attachment::fromPath($this->getFichier($index)); // create a Swift Attachment
                            $message->attach($swiftAttachment); // now attach the correct type 
                           
                        }

                        Yii::trace(get_class($this).'.create()','Avant envoie ....');

                        Yii::app()->mail->send($message);
                        
                        Yii::trace(get_class($this).'.create()','Message envoyé avec succès.....');
                        $this->initialise_var_fichier();

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblInformation']))
		{
			$model->attributes=$_POST['TblInformation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_msg));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblInformation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblInformation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblInformation']))
			$model->attributes=$_GET['TblInformation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=  TblInformation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tblInformation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionUpload()
{
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $path = Yii::app()->basePath . '\\..\\uploads\\';
        if (!is_dir($path)) {
            mkdir($path);
        }

        $folder = $path;//this->rep_upload;// folder for uploaded files
       
        $allowedExtensions = array("jpg","jpeg","gif","exe","mov","mp4","txt","doc","pdf","xls","xlsx", "docx","3gp","php","ini","avi","rar","zip","png");
        $sizeLimit = 100 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME

        $this->fichier_a_upload($folder.$result['filename']);

//        print_r('actionUpload: nb fichier = '.$this->getNb_fichier_a_upload().' fichier = '.$folder.$result['filename']);

        echo $return;// it's array
}

public function actionResetUploadFile(){
    $this->initialise_var_fichier();

    $model=new TblInformation;
    if(isset($_POST['TblInformation']))
    {
        $model->attributes=$_POST['TblInformation'];
       
    }
    $this->render('create',array(
			'model'=>$model,
		));
}
}
