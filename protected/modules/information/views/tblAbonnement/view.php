<?php
/* @var $this TblAbonnementController */
/* @var $model TblAbonnement */

$this->breadcrumbs=array(
	'Abonnements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des abonnements', 'url'=>array('index')),
	array('label'=>'Créer un abonnement', 'url'=>array('create')),
	array('label'=>'Modifier un abonnement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer un abonnement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Etes-vous sûrs de vouloir supprimer cet abonnement?')),
	array('label'=>'Gérer les abonnements', 'url'=>array('admin')),
);
?>

<h1>Détails de l'abonnement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'matricule',
		'nom',
		'prenom',
		'classe_id',
		'adresseemail1',
		'adresseemail2',
		'telephone1',
		'telephone2',
		'telephone3',
		'datenaissance',
		'adresse',
		'package',
		'photo',
	),
)); ?>
