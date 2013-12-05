<?php
/* @var $this TblPiecejointeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Piecejointes',
);

$this->menu=array(
	array('label'=>'Create TblPiecejointe', 'url'=>array('create')),
	array('label'=>'Manage TblPiecejointe', 'url'=>array('admin')),
);
?>

<h1>Tbl Piecejointes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
