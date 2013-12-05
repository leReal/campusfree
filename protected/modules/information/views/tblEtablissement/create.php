<?php
/* @var $this TblEtablissementController */
/* @var $model TblEtablissement */

$this->breadcrumbs=array(
	'Etablissements'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des établissements', 'url'=>array('index')),
	array('label'=>'Gérer les établissements', 'url'=>array('admin')),
);
?>

<h1>Création d'un établissement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>