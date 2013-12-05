<?php
/* @var $this TblClasseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Classes',
);

$this->menu=array(
	array('label'=>'Create TblClasse', 'url'=>array('create')),
	array('label'=>'Manage TblClasse', 'url'=>array('admin')),
);
?>

<h1>Tbl Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
