<?php
/* @var $this TblPiecejointeController */
/* @var $model TblPiecejointe */

$this->breadcrumbs=array(
	'Tbl Piecejointes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblPiecejointe', 'url'=>array('index')),
	array('label'=>'Create TblPiecejointe', 'url'=>array('create')),
	array('label'=>'Update TblPiecejointe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblPiecejointe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblPiecejointe', 'url'=>array('admin')),
);
?>

<h1>View TblPiecejointe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'information_id',
		'contenu',
		'filename',
		'filetype',
           
	),
));
echo '<a href="'.Yii::app()->getBaseUrl().'/uploads/'.$model->getAttribute("filename").'"> Télécharger</a>';
?>
