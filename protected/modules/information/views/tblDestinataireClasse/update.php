<?php
/* @var $this TblDestinataireClasseController */
/* @var $model TblDestinataireClasse */

$this->breadcrumbs=array(
	'Tbl Destinataire Classes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblDestinataireClasse', 'url'=>array('index')),
	array('label'=>'Create TblDestinataireClasse', 'url'=>array('create')),
	array('label'=>'View TblDestinataireClasse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblDestinataireClasse', 'url'=>array('admin')),
);
?>

<h1>Update TblDestinataireClasse <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>