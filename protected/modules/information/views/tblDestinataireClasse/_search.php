<?php
/* @var $this TblDestinataireClasseController */
/* @var $model TblDestinataireClasse */
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
		<?php echo $form->label($model,'classe_id'); ?>
		<?php echo $form->textField($model,'classe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'information_id'); ?>
		<?php echo $form->textField($model,'information_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->