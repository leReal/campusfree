<?php
/* @var $this TblInformateurController */
/* @var $model User */

$this->breadcrumbs=array(
	'Informateurs'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des informateurs', 'url'=>array('index')),
	array('label'=>'Créer un informateur', 'url'=>array('create')),
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

<h1>Gestion des informateurs</h1>

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
                array(  
                 'name'=>'type',
                 'value'=>'$data->type0->nom',
                 ),		/*
		'telephone',
		'activkey',
		'superuser',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
