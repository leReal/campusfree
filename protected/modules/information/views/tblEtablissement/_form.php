<?php
/* @var $this TblEtablissementController */
/* @var $model TblEtablissement */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-etablissement-form',
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
		<?php echo $form->labelEx($model,'adresse'); ?>
		<?php echo $form->textField($model,'adresse',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'adresse'); ?>
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
		<?php echo $form->labelEx($model,'boitepostale'); ?>
		<?php echo $form->textField($model,'boitepostale',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'boitepostale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ville'); ?>
		<?php echo $form->textField($model,'ville',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ville'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_institution'); ?>
                <?php echo $form->dropDownList($model,'id_institution',CHtml::listData(TblInstitution::model()->findAll(),'id', 'nom'),
                        array('empty' => "Sélectionnez l'institution dans la liste")); ?>		
                <?php echo $form->error($model,'id_institution'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enregistrer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->