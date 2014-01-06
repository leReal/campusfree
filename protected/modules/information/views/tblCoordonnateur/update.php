<?php
/* @var $this TblCoordonnateurController */
/* @var $model User */

$this->breadcrumbs=array(
	'Coordonnateurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des Coordonnateurs', 'url'=>array('index')),
	array('label'=>'Créer un Coordonnateur', 'url'=>array('create')),
	array('label'=>"Détails du Coordonnateur", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les Coordonnateurs', 'url'=>array('admin')),
);
?>

<h1>Modification du coordonnateur<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>