<?php
/* @var $this TblEtablissementController */
/* @var $data TblEtablissement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresse')); ?>:</b>
	<?php echo CHtml::encode($data->adresse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone1')); ?>:</b>
	<?php echo CHtml::encode($data->telephone1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone2')); ?>:</b>
	<?php echo CHtml::encode($data->telephone2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone3')); ?>:</b>
	<?php echo CHtml::encode($data->telephone3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('boitepostale')); ?>:</b>
	<?php echo CHtml::encode($data->boitepostale); ?>
	<br />
	 
	<b><?php echo CHtml::encode($data->getAttributeLabel('ville')); ?>:</b>
	<?php echo CHtml::encode($data->ville); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_institution')); ?>:</b>
	<?php echo CHtml::encode($data->id_institution); ?>
	<br />	

</div>