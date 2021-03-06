<?php
/* @var $this TblUtilisateurController */
/* @var $data TblUtilisateur */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motdepasse')); ?>:</b>
	<?php echo CHtml::encode($data->motdepasse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prenom')); ?>:</b>
	<?php echo CHtml::encode($data->prenom); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lieunaissance')); ?>:</b>
	<?php echo CHtml::encode($data->lieunaissance); ?>
	<br />


</div>