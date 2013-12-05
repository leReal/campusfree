<?php
/* @var $this TblInformationController */
/* @var $model TblInformation */

$this->breadcrumbs=array(
	'Informations'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des informations', 'url'=>array('index')),
	array('label'=>'Créer une information', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-information-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des informations</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-information-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titresms',
		'contenusms',
		'titremail',
		'contenumail',
		'id_informateur',
		'etablissement_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
