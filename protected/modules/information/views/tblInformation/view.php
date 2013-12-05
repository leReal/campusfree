<?php
/* @var $this TblInformationController */
/* @var $model TblInformation */

$this->breadcrumbs=array(
	'Informations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des informations', 'url'=>array('index')),
	array('label'=>'Créer une information', 'url'=>array('create')),
	array('label'=>'Modifier une information', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer une information', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Etes-vous sûr(e)s de vouloir supprimer cette information?')),
	array('label'=>'Gérer les informations', 'url'=>array('admin')),
);
?>

<h1>Détails de l'information #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titremail',
		'contenumail',
		'id_informateur',
	),
)); ?>
