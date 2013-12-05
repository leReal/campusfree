<?php
/* @var $this TblDestinataireFiliereController */
/* @var $model TblDestinataireFiliere */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-destinataire-filiere-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filiere_id'); ?>
		<?php echo $form->textField($model,'filiere_id'); ?>
		<?php echo $form->error($model,'filiere_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'information_id'); ?>
		<?php echo $form->textField($model,'information_id'); ?>
		<?php echo $form->error($model,'information_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->