<?php
/* @var $this TblFiliereController */
/* @var $model TblFiliere */

$this->breadcrumbs=array(
	'Filieres'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des filières', 'url'=>array('index')),
	array('label'=>'Créer une filière', 'url'=>array('create')),
	array('label'=>'Modifier une filière', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer une filière', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gérer les filières', 'url'=>array('admin')),
);
?>

<h1>détails de la filière #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'id_etablissement',
	),
)); ?>
