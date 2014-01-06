<?php
/* @var $this TblInformateurController */
/* @var $model User */

$this->breadcrumbs=array(
	'Informateurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des informateurs', 'url'=>array('index')),
	array('label'=>'Créer un informateur', 'url'=>array('create')),
	array('label'=>"Détails de l'informateur", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les informateurs', 'url'=>array('admin')),
);
?>

<h1>Modifier un informateur<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>