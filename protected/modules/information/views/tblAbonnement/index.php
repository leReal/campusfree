<?php
/* @var $this TblAbonnementController */
/* @var @var $model TblAbonnement */

$this->breadcrumbs=array(
	'Abonnements',
);

$this->menu=array(
	array('label'=>'Créer un abonnement', 'url'=>array('create')),
	array('label'=>'Gérer les abonnements', 'url'=>array('admin')),
);
?>

<h1>Gestion des abonnements</h1>

<?php $this->render('admin',array(
			'model'=>$model,
		));
?>
