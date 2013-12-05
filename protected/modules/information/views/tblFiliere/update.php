<?php
/* @var $this TblFiliereController */
/* @var $model TblFiliere */

$this->breadcrumbs=array(
	'Tbl Filieres'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des filières', 'url'=>array('index')),
	array('label'=>'Créer une filière', 'url'=>array('create')),
	array('label'=>'Détails de la filière', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les filières', 'url'=>array('admin')),
);
?>

<h1>Modification de la filière <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>