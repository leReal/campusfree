<?php
/* @var $this TblDestinataireClasseController */
/* @var $model TblDestinataireClasse */

$this->breadcrumbs=array(
	'Tbl Destinataire Classes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblDestinataireClasse', 'url'=>array('index')),
	array('label'=>'Create TblDestinataireClasse', 'url'=>array('create')),
	array('label'=>'Update TblDestinataireClasse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblDestinataireClasse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblDestinataireClasse', 'url'=>array('admin')),
);
?>

<h1>View TblDestinataireClasse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'classe_id',
		'information_id',
	),
)); ?>
