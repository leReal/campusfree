<?php
/* @var $this TblCoordonnateurController */
/* @var $model User */

$this->breadcrumbs=array(
	'Coordonnateurs'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des coordonnateurs', 'url'=>array('index')),
	array('label'=>'Gérer les coordonnateurs', 'url'=>array('admin')),
);
?>

<h1>Création des coordonnateurs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>