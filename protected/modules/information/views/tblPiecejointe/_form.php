<?php
/* @var $this TblPiecejointeController */
/* @var $model TblPiecejointe */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-piecejointe-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'information_id'); ?>
		<?php echo $form->textField($model,'information_id'); ?>
		<?php echo $form->error($model,'information_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contenu'); ?>
		<?php echo $form->textField($model,'contenu'); ?>
		<?php echo $form->error($model,'contenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filetype'); ?>
		<?php echo $form->textField($model,'filetype',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'filetype'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->