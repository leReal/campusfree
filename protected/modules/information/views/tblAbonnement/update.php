<?php
/* @var $this TblAbonnementController */
/* @var $model TblAbonnement */

$this->breadcrumbs=array(
	'Abonnements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des abonnements', 'url'=>array('index')),
	array('label'=>'Créer un abonnement', 'url'=>array('create')),
	array('label'=>"Détails de l'abonnement", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les abonnements', 'url'=>array('admin')),
);
?>

<h1>Modification des abonnements <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>