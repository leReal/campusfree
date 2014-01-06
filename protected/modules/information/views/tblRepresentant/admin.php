<?php
/* @var $this TblRepresentantController */
/* @var $model User */

$this->breadcrumbs=array(
	'Représentants'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des représentants', 'url'=>array('index')),
	array('label'=>'Créer un représentant', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Représentants</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'nom',
		'email',
		'create_at',
		'lastvisit_at',
		/*
		'telephone',
		'activkey',
		'superuser',
		'status',
		'type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
