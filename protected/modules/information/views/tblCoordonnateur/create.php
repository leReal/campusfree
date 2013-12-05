<?php
/* @var $this TblInformateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Coordonnateurs'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des Coordonnateurs', 'url'=>array('index')),
	array('label'=>'Gérer les Coordonnateurs', 'url'=>array('admin')),
);
?>

<h1>Création d'un coordonnateur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>