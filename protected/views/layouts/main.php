<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

		<div id="mainMbMenu">
		<?php
//                $this->widget('application.extensions.mbmenu.MbMenu',array(
//			'items'=>array(
//                               	array('label'=>'Accueil', 'url'=>array('/site/index'),
//                                     ),
//                                array('label'=>'Connexion', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//		                array('label'=>'Organisation', 'url'=>array('/information'),
//                                         'items'=>array(
//                                          array('label'=>'Institutions', 'url'=>array('/information/TblInstitution')),
//                                          array('label'=>'Etablissements', 'url'=>array('/information/TblEtablissement')),
//                                          array('label'=>'Filières', 'url'=>array('/information/TblFiliere')),
//                                          array('label'=>'Classes', 'url'=>array('/information/TblClasse')),
//                                           ),'visible'=>!Yii::app()->user->isGuest
//                                       ),
//                            array('label'=>'Informations', 'url'=>array('/information'),
//                                'items'=>array(
//                                 array('label'=>'Information', 'url'=>array('/information/TblInformation')),
//                                 array('label'=>'Abonnements', 'url'=>array('/information/TblAbonnement')),
//                                    ),'visible'=>!Yii::app()->user->isGuest
//                                ),
//
//                        array('label'=>'Administration', 'url'=>array('/information'),
//                                       'items'=>array(
//                                    array('label'=>'Utilisateurs','url'=>array('/information/TblUtilisateur')),
//                                    array('label'=>'Informateurs','url'=>array('/information/TblInformateur')),
//                                    array('label'=>'Représentant','url'=>array('/information/TblRepresentant')),
//                                    array('label'=>'Coordonnateur','url'=>array('/information/TblCoordonnateur')),
//                                    ),'visible'=>!Yii::app()->user->isGuest),
//
//			array('label'=>'Déconnexion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
//			),
//		));
                ?>


        <?php
            Yii::app()->bootstrap->register();
            $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'dropup'=>false,
    'items'=>array(
        array('label'=>'Accueil', 'url'=>array('/site/index'), 'active'=>true, 'visible'=>!Yii::app()->user->isGuest),
        array('label'=>'Connexion', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
        array('label'=>'Organisation', 'url'=>array('/information'),'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                          array('label'=>'Institutions', 'url'=>array('/information/TblInstitution')),
                                          array('label'=>'Etablissements', 'url'=>array('/information/TblEtablissement')),
                                          array('label'=>'Filières', 'url'=>array('/information/TblFiliere')),
                                          array('label'=>'Classes', 'url'=>array('/information/TblClasse')),
                                           ),),
        array('label'=>'Informations', 'url'=>array('/information'),
                                'items'=>array(
                                 array('label'=>'Information', 'url'=>array('/information/TblInformation')),
                                 array('label'=>'Abonnements', 'url'=>array('/information/TblAbonnement')),
                                    ),'visible'=>!Yii::app()->user->isGuest
                                ),

        array('label'=>'Administration', 'url'=>array('/information'),
                                       'items'=>array(
                                    array('label'=>'Utilisateurs','url'=>array('/information/TblUtilisateur')),
                                    array('label'=>'Informateurs','url'=>array('/information/TblInformateur')),
                                    array('label'=>'Représentant','url'=>array('/information/TblRepresentant')),
                                    array('label'=>'Coordonnateur','url'=>array('/information/TblCoordonnateur')),
                                    ),'visible'=>!Yii::app()->user->isGuest),

        array('label'=>'Déconnexion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
        ),
)); ?>

	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by LeReal Group.<br/>
		Tout droit reservé.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
