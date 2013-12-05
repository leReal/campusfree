<?php
/* @var $this TblInformationController */
/* @var $model TblInformation */

$this->breadcrumbs=array(
	'Informations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des informations', 'url'=>array('index')),
	array('label'=>'Créer une information', 'url'=>array('create')),
	array('label'=>"Détails de l'information", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer une information', 'url'=>array('admin')),
);
?>

<h1>Modification de l'information <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>