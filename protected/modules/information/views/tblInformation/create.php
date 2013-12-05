<?php
/* @var $this TblInformationController */
/* @var $model TblInformation */

$this->breadcrumbs=array(
	'Informations'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des informations', 'url'=>array('index')),
	array('label'=>'Gérer une information', 'url'=>array('admin')),
);
?>

<h1>Création d'une information</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>