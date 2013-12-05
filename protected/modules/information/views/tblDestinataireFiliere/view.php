<?php
/* @var $this TblDestinataireFiliereController */
/* @var $model TblDestinataireFiliere */

$this->breadcrumbs=array(
	'Tbl Destinataire Filieres'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblDestinataireFiliere', 'url'=>array('index')),
	array('label'=>'Create TblDestinataireFiliere', 'url'=>array('create')),
	array('label'=>'Update TblDestinataireFiliere', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblDestinataireFiliere', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblDestinataireFiliere', 'url'=>array('admin')),
);
?>

<h1>View TblDestinataireFiliere #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'filiere_id',
		'information_id',
	),
)); ?>
