<?php
/* @var $this TblRepresentantController */
/* @var $model User */

$this->breadcrumbs=array(
	'Représentants'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des représentants', 'url'=>array('index')),
	array('label'=>'Créer un représentant', 'url'=>array('create')),
	array('label'=>'Modifier le représentant', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer le représentant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Etes-vous sûr(e)s de vouloir supprimer cet informateur?')),
	array('label'=>'Gérer les représentants', 'url'=>array('admin')),
);
?>

<h1>Détails du représentant #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'nom',
		'email',
		'create_at',
		'lastvisit_at',
	),
)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->type0,
	'attributes'=>array(
		'nom:text:Type',
	),
)); ?>