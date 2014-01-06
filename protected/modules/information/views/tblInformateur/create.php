<?php
/* @var $this TblInformateurController */
/* @var $model User */

$this->breadcrumbs=array(
	'Informateurs'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des informateurs', 'url'=>array('index')),
	array('label'=>'Gérer les informateurs', 'url'=>array('admin')),
);
?>

<h1>Création d'un informateur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>