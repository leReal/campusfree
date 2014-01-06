<?php
/* @var $this TblAbonnementController */
/* @var $model TblAbonnement */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-abonnement-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'matricule'); ?>
		<?php echo $form->textField($model,'matricule',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'matricule'); ?>
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
		<?php echo $form->labelEx($model,'classe_id'); ?>
                <?php echo $form->dropDownList($model,'classe_id',CHtml::listData(TblClasse::model()->findAll(),'id', 'nom'),
                        array('empty' => "Sélectionnez une classe")); ?>		
                <?php echo $form->error($model,'classe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adresseemail1'); ?>
		<?php echo $form->textField($model,'adresseemail1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'adresseemail1'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'telephone1'); ?>
		<?php echo $form->textField($model,'telephone1',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telephone1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adresse'); ?>
		<?php echo $form->textField($model,'adresse',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'adresse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'package'); ?>
		<?php echo $form->dropDownList($model,'package',CHtml::listData(TblPackage::model()->findAll(),'id', 'nom'),
                        array('empty' => "Sélectionnez un package")); ?>
		<?php echo $form->error($model,'package'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enregistrer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->