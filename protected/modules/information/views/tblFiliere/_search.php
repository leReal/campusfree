<?php
/* @var $this TblFiliereController */
/* @var $model TblFiliere */
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
		<?php echo $form->label($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>60,'maxlength'=>100)); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'id_etablissement'); ?>
                <?php echo $form->dropDownList($model,'id_etablissement',CHtml::listData(TblEtablissement::model()->findAll(),'id', 'nom'),
                        array('empty' => "Sélectionnez l'établissement dans la liste")); ?>		
                <?php echo $form->error($model,'id_etablissement'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->