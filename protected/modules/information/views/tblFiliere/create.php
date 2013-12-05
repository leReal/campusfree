<?php
/* @var $this TblFiliereController */
/* @var $model TblFiliere */

$this->breadcrumbs=array(
	'Filieres'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des filières', 'url'=>array('index')),
	array('label'=>'Gérer les filières', 'url'=>array('admin')),
);
?>

<h1>Créer une filière</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>