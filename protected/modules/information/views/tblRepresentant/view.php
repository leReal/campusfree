<?php
/* @var $this TblInformateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Représentants'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des représentants', 'url'=>array('index')),
	array('label'=>'Créer un représentant', 'url'=>array('create')),
	array('label'=>'Modifier un représentant', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer un représentant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Etes-vous sûr(e)s de vouloir supprimer cet informateur?')),
	array('label'=>'Gérer les représentant', 'url'=>array('admin')),
);
?>

<h1>Détails du représentant #<?php echo $model->id; ?></h1>

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
		'lieunaissance',
		'type',
	),
)); ?>
