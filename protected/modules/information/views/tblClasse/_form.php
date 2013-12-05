<?php
/* @var $this TblClasseController */
/* @var $model TblClasse */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-classe-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'id_filiere'); ?>
                <?php echo $form->dropDownList($model,'id_filiere',CHtml::listData(TblFiliere::model()->findAll(),'id', 'nom'),
                        array('empty' => "Sélectionnez la filière dans la liste")); ?>		
                <?php echo $form->error($model,'id_filiere'); ?>
	</div>
        

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enregistrer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->