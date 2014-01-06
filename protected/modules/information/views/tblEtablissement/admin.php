<?php
/* @var $this TblEtablissementController */
/* @var $model TblEtablissement */

$this->breadcrumbs=array(
	'Etablissements'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des établissements', 'url'=>array('index')),
	array('label'=>'Créer un établissement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-etablissement-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des établissements</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-etablissement-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nom',
		'adresse',
		'telephone1',
		'boitepostale',
		'ville',
                array(  
                 'name'=>'id_institution',
                 'value'=>'$data->iNSTITUTION->nom',
                 ),		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

