<?php
/* @var $this TblFiliereController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Filieres',
);

$this->menu=array(
	array('label'=>'Créer une filière', 'url'=>array('create')),
	array('label'=>'Gérer les filières', 'url'=>array('admin')),
);
?>

<h1> Gestion des filières</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
