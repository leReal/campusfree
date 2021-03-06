<?php

class TblAbonnementController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
                        'rights', // perform access control for CRUD operations
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
				'actions'=>array('create','update'),
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
                Yii::import('ext.sms.SendSMS');
		$model=new TblAbonnement;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblAbonnement']))
		{
			$model->attributes=$_POST['TblAbonnement'];
			if($model->save()){
                            //envoie d'un email l'abonné pour confirmation de son inscription
                            $message= new YiiMailMessage;
                            $message->subject    = "Inscription à Campus Free";
                            $contenu='Bonjour '.$model->nom.' '.$model->prenom.'. Vous venez de vous abonner au site Campus Free. 
                                Désormais vous recevrez toutes les informations concernant votre classe ('.                                 
                                 $model->classe->nom.') à l"adresse '.$model->adresseemail1.' Merci de votre confiance.';
                            $message->setBody($contenu, 'text/html');
                            $message->addTo($model->adresseemail1);
                            $message->from = Yii::app()->params['adminEmail'];
                            Yii::app()->mail->send($message);

                            //Envoie d'un sms de confirmation de l'abonnement à l'abonné
                            $sms=new SendSMS;
                            $numero=array('237'.$model->telephone1);
                            $sms->envoiopt2($numero, $contenu);
                            
				$this->redirect(array('view','id'=>$model->id));
                        }        
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

		if(isset($_POST['TblAbonnement']))
		{
			$model->attributes=$_POST['TblAbonnement'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model=new TblAbonnement('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblAbonnement']))
			$model->attributes=$_GET['TblAbonnement'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblAbonnement('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblAbonnement']))
			$model->attributes=$_GET['TblAbonnement'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblAbonnement the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblAbonnement::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblAbonnement $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-abonnement-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
