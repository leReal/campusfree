<?php
/* @var $this TblClasseController */
/* @var $model TblClasse */

$this->breadcrumbs=array(
	'Classes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des classes', 'url'=>array('index')),
	array('label'=>'Créer une classe', 'url'=>array('create')),
	array('label'=>'Détails de la classe', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les classes', 'url'=>array('admin')),
);
?>

<h1>Modification de la classe <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>