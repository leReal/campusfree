<?php
/* @var $this TblInstitutionController */
/* @var $model TblInstitution */

$this->breadcrumbs=array(
	'Institutions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des institutions', 'url'=>array('index')),
	array('label'=>'Créer une institution', 'url'=>array('create')),
	array('label'=>"Modifier l'institution", 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>"Supprimer l'institution", 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gérer les institutions', 'url'=>array('admin')),
);
?>

<h1>Détails de l'institution #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'adresse',
		'telephone1',
		'telephone2',
		'telephone3',
		'boitepostale',
		'ville',
		'statut',
	),
)); ?>
