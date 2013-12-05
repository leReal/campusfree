<?php
/* @var $this TblInstitutionController */
/* @var $model TblInstitution */

$this->breadcrumbs=array(
	'Institutions'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des institutions', 'url'=>array('index')),
	array('label'=>'Gérer les institutions', 'url'=>array('admin')),
);
?>

<h1>Création d'une institution</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>