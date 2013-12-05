<?php
/* @var $this TblDestinataireFiliereController */
/* @var $data TblDestinataireFiliere */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filiere_id')); ?>:</b>
	<?php echo CHtml::encode($data->filiere_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('information_id')); ?>:</b>
	<?php echo CHtml::encode($data->information_id); ?>
	<br />


</div>