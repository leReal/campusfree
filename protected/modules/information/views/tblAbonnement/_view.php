<?php
/* @var $this TblAbonnementController */
/* @var $data TblAbonnement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('matricule')); ?>:</b>
	<?php echo CHtml::encode($data->matricule); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prenom')); ?>:</b>
	<?php echo CHtml::encode($data->prenom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classe_id')); ?>:</b>
	<?php echo CHtml::encode($data->classe->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresseemail1')); ?>:</b>
	<?php echo CHtml::encode($data->adresseemail1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone1')); ?>:</b>
	<?php echo CHtml::encode($data->telephone1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresse')); ?>:</b>
	<?php echo CHtml::encode($data->adresse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package')); ?>:</b>
	<?php echo CHtml::encode($data->packages->nom); ?>
	<br />

</div>