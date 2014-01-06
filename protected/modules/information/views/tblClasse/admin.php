<?php
/* @var $this TblClasseController */
/* @var $model TblClasse */

$this->breadcrumbs=array(
	'Classes'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des classes', 'url'=>array('index')),
	array('label'=>'Créer une classe', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-classe-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des classes</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-classe-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nom',
                array(  
                 'name'=>'id_filiere',
                 'value'=>'$data->eFILIERE->nom',
                 ),		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
