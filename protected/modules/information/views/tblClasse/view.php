<?php
/* @var $this TblClasseController */
/* @var $model TblClasse */

$this->breadcrumbs=array(
	'Classes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des classes', 'url'=>array('index')),
	array('label'=>'Créer une classe', 'url'=>array('create')),
	array('label'=>'Modifier la classe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer la classe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'etes-vous sûr(e)s de vouloir supprimer cette classe?')),
	array('label'=>'Gérer les classes', 'url'=>array('admin')),
);
?>

<h1>Détails de la classe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'id_filiere',
	),
)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->eFILIERE,
	'attributes'=>array(
		'nom:text:Filière',
	),
)); ?>