<?php
/* @var $this TblInformationController */
/* @var $model TblInformation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titresms'); ?>
		<?php echo $form->textField($model,'titresms',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contenusms'); ?>
		<?php echo $form->textField($model,'contenusms',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titremail'); ?>
		<?php echo $form->textField($model,'titremail',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contenumail'); ?>
		<?php echo $form->textField($model,'contenumail',array('size'=>60,'maxlength'=>700)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_informateur'); ?>
		<?php echo $form->textField($model,'id_informateur'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'etablissement_id'); ?>
		<?php echo $form->textField($model,'etablissement_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->