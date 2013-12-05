<?php
/* @var $this TblInformateurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Informateurs',
);

$this->menu=array(
	array('label'=>'Créer un informateur', 'url'=>array('create')),
	array('label'=>'Gérer un informateur', 'url'=>array('admin')),
);
?>

<h1>Gestion des informateurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
