<?php

class TblInformationController extends RController
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
				'actions'=>array('create','update','upload', 'resetUploadFile', 'afficherPiecesJointe', 'downloadPiece'),
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
            /**
             * Construction des criteres de recgerche des pièces jointes associées
             * à l'information
             */
            $model2 = new TblPiecejointe();

            $model2->setAttribute('information_id', $id);
            $criteria=new CDbCriteria;

            $criteria->compare('information_id',$id);

            $dataProvider = new CActiveDataProvider($model2, array(
			'criteria'=>$criteria,
		));
            // ************  Fin de la construction ***************
		$this->render('view',array(
			'model'=>$this->loadModel($id),'model2'=>$model2,'dataProvider'=>$dataProvider,
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
		$model=new TblInformation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

            /* Algorithme d'envoie d'information
             * 1. Récupérer l'informateur connecté
             * 2. Récupérer l'ensemble des classes dans lesquelles il a les droits d'informer
             *      Pour chaque classe
             *      2.1 recupérer tous les abonnés de la classe
             *          si package=gold alors inserer son @mail dans la liste des adresses à envoyer et son numéro 
             *                                dans la liste des numéros
             *          sinon inserer son adresse email dans la liste des adresses email à envoyer         
             *  Ici on a la liste des @ mail a qui envoyer l'infoemation et la liste des numéro à envoyer le message
             * 3. envoie du mail à toutes les adresses de la liste des @ recupérées
             * 4. envoie du message à tous les numéros de la liste des numéros recupérés        
             * Si possible lancer les deux envois dans les processus différents pour optimisation
             */

		if(isset($_POST['TblInformation']))
		{
                    $model->attributes=$_POST['TblInformation'];

                    // 1. Recupération de l'informateur connecté
                        $userId = Yii::app()->user->getId();
                        //mettons à jour l'id_informateur
                        $model->id_informateur=$userId;                        
                     //verifions si l'utilisateur connecté est un informateur
                     
                    // 2. Récupérer l'ensemble des classes dans lesquelles il a les droits d'informer
                    $criteria=new CDbCriteria;
                    $criteria->addCondition('id_utilisateur='.$userId);
                    $classe=InformateurClasse::model()->findAll($criteria);
                    
                    //Construction du tableau qui va récupérer la liste des classes
                    $listClasse=array();
                    $i=0;
                    foreach($classe as $element)
                        {
                        $listClasse[$i]=$element->idClasse->id;
                        $i=$i+1;
                        }
                    
                    //2.1 recupération de la liste des abonnés appartenant à l'ensemble des classes de l'informateur
                    $criteria1=new CDbCriteria;  
                    $criteria1->addInCondition("classe_id", $listClasse);
                    $abonnes = TblAbonnement::model()->findAll($criteria1);
                    
                    $adresseMail=array();
                    $numero=array();
                    $j=0;$k=0;
                    
                    //construction de la liste des adresses email et des numéro de téléphone
                    foreach ($abonnes as $value) {
                       //si l'abonné est GOLD alors mettre son numéro dans la liste des numéro 
                       if($value->packages->id==2){
                           $numero[$j]='237'.$value->telephone1;
                           $j=$j+1;
                       }
                       //Par défaut tous les abonnés ont droit à l'information par mail
                       $adresseMail[$k]=$value->adresseemail1;
                       $k=$k+1;                           
                    }
                    //Envoie de l'information par mail
                    
                        $message= new YiiMailMessage;

                        $message->from = Yii::app()->params['adminEmail'];
                        $message->subject= $model->titremail;
                        $message->setBody($model->contenumail, 'text/html');
                        foreach ($adresseMail as $value) {
                            $message->addTo($value);
                        }
                        
                        /**
                         * Parcourir l'ensemble des fichier uplodés et les attacher ds le message
                         */
                        for ($index = 0; $index < $this->getNb_fichier_a_upload(); $index++) {
                            $swiftAttachment = Swift_Attachment::fromPath($this->getFichier($index)); // create a Swift Attachment
                            $message->attach($swiftAttachment); // now attach the correct type
                        }

                        Yii::app()->mail->send($message);
                        
                        // envoie de l'information par sms
                        $sms=new SendSMS;
                        $sms->envoiopt1($numero, $model->titremail);

                        
                        if($model->save()){
                            /**
                             * Enregistrement des pieces jointes
                             */
                            for ($index = 0; $index < $this->getNb_fichier_a_upload(); $index++) {

                                $cheminComplet = $this->getFichier($index);
                                $extension = pathinfo($cheminComplet, PATHINFO_EXTENSION);

                                $fileName = basename($cheminComplet);

                                $this->savePieceJointe($model->id, $cheminComplet, $fileName, $extension);

                            }
                            $this->initialise_var_fichier();
                            $this->redirect(array('view','id'=>$model->id));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));

	}

        private function savePieceJointe($informationId, $chemin, $nomFichier, $typeFichier){
            $model=new TblPiecejointe;
            $model->setIsNewRecord(true);
            $model->setAttribute("information_id", $informationId);
            $model->setAttribute("contenu", $chemin);
            $model->setAttribute("filename", $nomFichier);
            $model->setAttribute("filetype", $typeFichier);

            Yii::trace(get_class($this).'savePieceJointe enregistrement piece ..');
    
            return $model->save();
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

        $path = Yii::app()->basePath . '/../uploads/';
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

//        echo 'actionUpload: fichier = '.$folder.$result['filename'].' file name = '.$fileName.' size = '.$fileSize;

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

public function actionAfficherPiecesJointe($id){
            $model = new TblPiecejointe();

            $model->setAttribute('information_id', $id);
            $this->render('TblPiecejointe/admin',array(
			'model'=>$model,
		));
   }

public function actionDownloadPiece($id){

    
    $model=TblPiecejointe::model()->findByPk($id);

    $this->redirect(Yii::app()->getBaseUrl().'/uploads/'.$model->getAttribute("filename"));
 
}
private function getUser(){

    return $_SESSION["user_connecte"];
}

private function estInformateur(){
    // 1. Vérifions si l'utilisateur connecté est un informateur
    $user = $this->getUser();
   return $user->getAttribute("type") == 1;
}
private function sendGetMails(){

    $mails = array();
    $count = 0;
    // 1. Vérifions si l'utilisateur connecté est un informateur
    $user = $_SESSION["user_connecte"];
    if($this->estInformateur()){

        // 2. Retrouvons les classes dont l'informateur a la charge
        $informateur_classe = new InformateurClasse();
        $attributs=array(
			// username => password
			'id_utilisateur'=>$user->getAttribute("id"),

		);

        $informateurs_classe = $informateur_classe->findAllByAttributes($attributs,'',array());
        foreach ($informateurs_classe as $value) {

            // 3. Retrouvons les users qu'il peut informer, pour chacune des classes
            $attributs_abonnement=array(
                'classe_id'=>$value->getAttribute("id_classe"),
            );
            $abonnement = new TblAbonnement();
            $abonnes = $abonnement->findAllByAttributes($attributs_abonnement,'',array());
            
            foreach ($abonnes as $value2) {

                // 3. On reccupere les mails de ces users ayant le package premium
                if($value2->getAttribute("package") == "premium"){
                    $mails[$count] = $value2->getAttribute("adresseemail1");
                    $count++;
                }
               
            }
        }


    }

    return $mails;
}
}