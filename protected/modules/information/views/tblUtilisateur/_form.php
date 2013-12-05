<?php
/* @var $this TblUtilisateurController */
/* @var $model TblUtilisateur */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-utilisateur-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motdepasse'); ?>
		<?php echo $form->textField($model,'motdepasse',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'motdepasse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prenom'); ?>
		<?php echo $form->textField($model,'prenom',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'prenom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adresseemail1'); ?>
		<?php echo $form->textField($model,'adresseemail1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'adresseemail1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adresseemail2'); ?>
		<?php echo $form->textField($model,'adresseemail2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'adresseemail2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone1'); ?>
		<?php echo $form->textField($model,'telephone1',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telephone1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone2'); ?>
		<?php echo $form->textField($model,'telephone2',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telephone2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lieunaissance'); ?>
		<?php echo $form->textField($model,'lieunaissance',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'lieunaissance'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enregistrer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->