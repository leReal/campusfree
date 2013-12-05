<?php
/* @var $this TblInstitutionController */
/* @var $model TblInstitution */

$this->breadcrumbs=array(
	'Institutions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des institution', 'url'=>array('index')),
	array('label'=>'Créer une institution', 'url'=>array('create')),
	array('label'=>"Détails de l'institution", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les institution', 'url'=>array('admin')),
);
?>

<h1>Modification de l'institution <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>