<?php
/* @var $this TblAbonnementController */
/* @var $model TblAbonnement */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'matricule'); ?>
		<?php echo $form->textField($model,'matricule',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>50,'maxlength'=>50)); ?>
	</div>

    
        <div class="row">
		<?php echo $form->labelEx($model,'classe_id'); ?>
                <?php echo $form->dropDownList($model,'classe_id',CHtml::listData(TblClasse::model()->findAll(),'id', 'nom'),
                        array('empty' => "Sélectionnez une classe dans la liste")); ?>		
                <?php echo $form->error($model,'classe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adresseemail1'); ?>
		<?php echo $form->textField($model,'adresseemail1',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	
	<div class="row">
		<?php echo $form->label($model,'adresse'); ?>
		<?php echo $form->textField($model,'adresse',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'package'); ?>
            <?php echo $form->dropDownList($model,'package',CHtml::listData(TblPackage::model()->findAll(),'id', 'nom'),
                        array('empty' => "Sélectionnez un package")); ?>	
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->