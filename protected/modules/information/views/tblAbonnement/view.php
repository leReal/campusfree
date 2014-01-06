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
	),
)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->classe,
	'attributes'=>array(
		"nom:text:Classe",
	),
)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'adresseemail1',
		'telephone1',
		'adresse',
	),
)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->packages,
	'attributes'=>array(
		"nom:text:Package souscrit",
	),
)); ?>