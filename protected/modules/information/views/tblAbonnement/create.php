<?php
/* @var $this TblAbonnementController */
/* @var $model TblAbonnement */

$this->breadcrumbs=array(
	'Abonnements'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des abonnements', 'url'=>array('index')),
	array('label'=>'Gérer les abonnements', 'url'=>array('admin')),
);
?>

<h1>Créer un Abonnement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>