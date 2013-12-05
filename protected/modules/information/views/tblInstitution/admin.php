<?php
/* @var $this TblInstitutionController */
/* @var $model TblInstitution */

$this->breadcrumbs=array(
	'Institutions'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des institutions', 'url'=>array('index')),
	array('label'=>'Créer une institution', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-institution-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des institutions</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-institution-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nom',
		'adresse',
		'telephone1',		
		'boitepostale',
		'ville',
		'statut',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
