<?php
/* @var $this TblInformationController */
/* @var $data TblInformation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titremail')); ?>:</b>
	<?php echo CHtml::encode($data->titremail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenumail')); ?>:</b>
	<?php echo CHtml::encode($data->contenumail); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_informateur')); ?>:</b>
	<?php echo CHtml::encode($data->id_informateur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etablissement_id')); ?>:</b>
	<?php echo CHtml::encode($data->etablissement_id); ?>
	<br />


</div>