<?php
/* @var $this TblDestinataireFiliereController */
/* @var $model TblDestinataireFiliere */

$this->breadcrumbs=array(
	'Tbl Destinataire Filieres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblDestinataireFiliere', 'url'=>array('index')),
	array('label'=>'Manage TblDestinataireFiliere', 'url'=>array('admin')),
);
?>

<h1>Create TblDestinataireFiliere</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>