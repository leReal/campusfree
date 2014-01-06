<?php
/* @var $this TblRepresentantController */
/* @var $model User */

$this->breadcrumbs=array(
	'Représentants'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des représentants', 'url'=>array('index')),
	array('label'=>'Gérer les représentants', 'url'=>array('admin')),
);
?>

<h1>Création d'un représentant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>