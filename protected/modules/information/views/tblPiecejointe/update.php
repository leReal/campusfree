<?php
/* @var $this TblPiecejointeController */
/* @var $model TblPiecejointe */

$this->breadcrumbs=array(
	'Tbl Piecejointes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblPiecejointe', 'url'=>array('index')),
	array('label'=>'Create TblPiecejointe', 'url'=>array('create')),
	array('label'=>'View TblPiecejointe', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblPiecejointe', 'url'=>array('admin')),
);
?>

<h1>Update TblPiecejointe <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>