<?php
/* @var $this TblInformateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Informateurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des informateurs', 'url'=>array('index')),
	array('label'=>'Créer un informateur', 'url'=>array('create')),
	array('label'=>'Modifier un informateur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer un informateur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Etes-vous sûr(e)s de vouloir supprimer cet informateur?')),
	array('label'=>'Gérer les informateurs', 'url'=>array('admin')),
);
?>

<h1>Détails de l'informateur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'nom',
		'prenom',
		'adresseemail1',
		'telephone1',
	),
)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->type0,
	'attributes'=>array(
		'nom:text:Type',
	),
)); ?>
