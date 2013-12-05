<?php
/* @var $this TblPiecejointeController */
/* @var $model TblPiecejointe */

$this->breadcrumbs=array(
	'Tbl Piecejointes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblPiecejointe', 'url'=>array('index')),
	array('label'=>'Manage TblPiecejointe', 'url'=>array('admin')),
);
?>

<h1>Create TblPiecejointe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>