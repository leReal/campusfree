<?php
/* @var $this TblPiecejointeController */
/* @var $data TblPiecejointe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('information_id')); ?>:</b>
	<?php echo CHtml::encode($data->information_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenu')); ?>:</b>
	<?php echo CHtml::encode($data->contenu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?>:</b>
	<?php echo CHtml::encode($data->filename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filetype')); ?>:</b>
	<?php echo CHtml::encode($data->filetype); ?>
	<br />


</div>