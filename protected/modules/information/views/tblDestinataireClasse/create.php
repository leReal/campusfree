<?php
/* @var $this TblDestinataireClasseController */
/* @var $model TblDestinataireClasse */

$this->breadcrumbs=array(
	'Tbl Destinataire Classes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblDestinataireClasse', 'url'=>array('index')),
	array('label'=>'Manage TblDestinataireClasse', 'url'=>array('admin')),
);
?>

<h1>Create TblDestinataireClasse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>