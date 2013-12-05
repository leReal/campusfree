<?php
/* @var $this TblInformateurController */
/* @var $model TblUtilisateur */

$this->breadcrumbs=array(
	'Coordonnateurs'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Coordonnateurs', 'url'=>array('index')),
	array('label'=>'Créer un Coordonnateur', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-utilisateur-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Coordonnateurs</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-utilisateur-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'login',
		'nom',
		'prenom',
		'adresseemail1',
		'telephone1',
		'type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
