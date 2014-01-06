<?php
/* @var $this TblRepresentantController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Représentants',
);

$this->menu=array(
	array('label'=>'Créer un représentants', 'url'=>array('create')),
	array('label'=>'Gérer les représentants', 'url'=>array('admin')),
);
?>

<h1>Gestion des représentants</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
