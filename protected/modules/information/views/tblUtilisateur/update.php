<?php
/* @var $this TblUtilisateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Utilisateurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des utilisateurs', 'url'=>array('index')),
	array('label'=>'Créer un utilisateur', 'url'=>array('create')),
	array('label'=>"Détails de l'utilisateur", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gérer les utilisateur', 'url'=>array('admin')),
);
?>

<h1>Modifier un utilisateur <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>