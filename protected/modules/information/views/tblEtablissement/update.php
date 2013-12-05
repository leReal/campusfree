<?php
/* @var $this TblEtablissementController */
/* @var $model TblEtablissement */

$this->breadcrumbs=array(
	'Etablissements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des établissements', 'url'=>array('index')),
	array('label'=>'Créer un établissement', 'url'=>array('create')),
	array('label'=>"Détails de l'établissement", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les établissements', 'url'=>array('admin')),
);
?>

<h1>Modification de l'établissement  <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>