<?php
/* @var $this TblClasseController */
/* @var $model TblClasse */

$this->breadcrumbs=array(
	'Classes'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des classes', 'url'=>array('index')),
	array('label'=>'Gérer les classes', 'url'=>array('admin')),
);
?>

<h1>Création d'une classe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>