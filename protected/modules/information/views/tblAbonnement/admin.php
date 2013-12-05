<?php
/* @var $this TblAbonnementController */
/* @var $model TblAbonnement */

$this->breadcrumbs=array(
	'Abonnements'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des abonnements', 'url'=>array('index')),
	array('label'=>'Créer un abonnement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-abonnement-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Abonnements</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-abonnement-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'matricule',
		'nom',
		'prenom',
		'classe_id',
		'adresseemail1',
		'telephone1',
		'adresse',
		'package',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
