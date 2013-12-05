<?php
/* @var $this TblInformateurController */
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
		<?php echo $form->labelEx($model,'telephone1'); ?>
		<?php echo $form->textField($model,'telephone1',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telephone1'); ?>
	</div>
        
        <div class="row">
        <?php 
                $data= CHtml::listData(TblClasse::model()->findAll(), 'id', 'nom');
                $this->widget('ext.EchMultiselect.EchMultiselect', array(
                    'model' => TblClasse::model(),
                    'dropDownAttribute' => 'nom',     
                    'data' => $data,
                    'dropDownHtmlOptions'=> array(
                        'style'=>'width:378px;',
                    ),
                    'options' => array( 
                        'header'=> true,
                        'height'=>175,
                        'minWidth'=>225,
                        'position'=>'',
                        'checkAllText' => Yii::t('EchMultiSelect.EchMultiSelect','Cocher tout'),
                        'uncheckAllText' => Yii::t('EchMultiSelect.EchMultiSelect','Décocher tout'),
                        'selectedText' =>Yii::t('EchMultiSelect.EchMultiSelect','# selectionnés'),
                        'selectedList'=>true,
                        'show'=>'',
                        'hide'=>'',
                        'autoOpen'=>false,
                        'noneSelectedText'=>'-- ' . Yii::t('EchMultiSelect.EchMultiSelect','Select Options') . ' --',
                        'multiple'=>true,
                        'classes'=>'',
                        'filter'=>true,
                        // 'filterOptions':
                        'label' => Yii::t('EchMultiSelect.EchMultiSelect','Filter:'),
                        'width'=>100,
                        'placeholder'=>Yii::t('EchMultiSelect.EchMultiSelect','Enter keywords'),
                        'autoReset'=>true,
                    ),
                    'filterOptions'=> array(
                        'width'=>150,
                    ),
                ));
        ?>        
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enregistrer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->