<?php
/* @var $this TblFiliereController */
/* @var $model TblFiliere */

$this->breadcrumbs=array(
	'Filières'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des filières', 'url'=>array('index')),
	array('label'=>'Créer une filiere', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-filiere-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gérer les filières</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-filiere-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nom',
                array(  
                 'name'=>'id_etablissement',
                 'value'=>'$data->eTABLISSEMENT->nom',
                 ),		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
