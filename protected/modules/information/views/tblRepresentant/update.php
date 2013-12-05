<?php
/* @var $this TblInformateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Représentants'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des représentants', 'url'=>array('index')),
	array('label'=>'Créer un représentant', 'url'=>array('create')),
	array('label'=>"Détails du représentant", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les représentants', 'url'=>array('admin')),
);
?>

<h1>Modifier un représentant<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>