<?php
/* @var $this TblInformateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Coordonnateurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des coordonnateurs', 'url'=>array('index')),
	array('label'=>'Créer un coordonnateur', 'url'=>array('create')),
	array('label'=>'Modifier un coordonnateur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer un coordonnateur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Etes-vous sûr(e)s de vouloir supprimer cet informateur?')),
	array('label'=>'Gérer les coordonnateurs', 'url'=>array('admin')),
);
?>

<h1>Détails du Coordonnateur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'motdepasse',
		'nom',
		'prenom',
		'adresseemail1',
		'telephone1',
		'type',
	),
)); ?>
