<?php
/* @var $this TblUtilisateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Utilisateurs'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des utilisateurs', 'url'=>array('index')),
	array('label'=>'Gérer les tilisateurs', 'url'=>array('admin')),
);
?>

<h1>Création d'un utilisateur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>