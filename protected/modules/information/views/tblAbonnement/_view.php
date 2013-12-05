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
	<?php echo CHtml::encode($data->classe_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresseemail1')); ?>:</b>
	<?php echo CHtml::encode($data->adresseemail1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresseemail2')); ?>:</b>
	<?php echo CHtml::encode($data->adresseemail2); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('datenaissance')); ?>:</b>
	<?php echo CHtml::encode($data->datenaissance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresse')); ?>:</b>
	<?php echo CHtml::encode($data->adresse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package')); ?>:</b>
	<?php echo CHtml::encode($data->package); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>
	<br />

</div>