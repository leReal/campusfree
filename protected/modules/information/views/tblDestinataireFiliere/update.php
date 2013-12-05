<?php
/* @var $this TblDestinataireFiliereController */
/* @var $model TblDestinataireFiliere */

$this->breadcrumbs=array(
	'Tbl Destinataire Filieres'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblDestinataireFiliere', 'url'=>array('index')),
	array('label'=>'Create TblDestinataireFiliere', 'url'=>array('create')),
	array('label'=>'View TblDestinataireFiliere', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblDestinataireFiliere', 'url'=>array('admin')),
);
?>

<h1>Update TblDestinataireFiliere <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>