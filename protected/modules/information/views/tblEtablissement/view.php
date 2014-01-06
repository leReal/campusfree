<?php
/* @var $this TblEtablissementController */
/* @var $model TblEtablissement */

$this->breadcrumbs=array(
	'Etablissements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des établissements', 'url'=>array('index')),
	array('label'=>'Créer un établissement', 'url'=>array('create')),
	array('label'=>"Modifier l'établissement", 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>"Supprimer l'établissement", 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Es-tu sûr de vouloir supprimer cet établissement?')),
	array('label'=>'Gérer les établissements', 'url'=>array('admin')),
);
?>

<h1>Détails de l'établissement #<?php echo $model->id; ?></h1>

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
	),
)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->iNSTITUTION,
	'attributes'=>array(
		'nom:text:Institution',
	),
)); ?>