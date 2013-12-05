<?php
/* @var $this TblUtilisateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Utilisateurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des utilisateurs', 'url'=>array('index')),
	array('label'=>'Créer un utilisateur', 'url'=>array('create')),
	array('label'=>'Modifier un utilisateur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer un utilisateur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Etes-vous sûr(e)s de vouloir supprimer cet utilisateur?')),
	array('label'=>'Gérer les utilisateurs', 'url'=>array('admin')),
);
?>

<h1>Détails de l'utilisateur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'motdepasse',
		'nom',
		'prenom',
		'adresseemail1',
		'adresseemail2',
		'telephone1',
		'telephone2',
		'type',
		'lieunaissance',
	),
)); ?>
