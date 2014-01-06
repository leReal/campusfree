<?php
/* @var $this TblClasseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Classes',
);

$this->menu=array(
	array('label'=>'Créer une classe', 'url'=>array('create')),
	array('label'=>'Gérer les classes', 'url'=>array('admin')),
);
?>

<h1>Gestion des classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
