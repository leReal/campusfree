<?php
/* @var $this TblInformationController */
/* @var $model TblInformation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'page-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>

	<p class="note">Les champs avec la marque <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titremail'); ?>
		<?php echo $form->textField($model,'titremail',array('size'=>80,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'titremail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contenumail'); ?>
		<?php echo $form->textArea($model,'contenumail',array('size'=>5000,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'contenumail'); ?>
	</div>
        
        <div class="row">
                <?php
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('information/tblInformation/upload'),
//               'action'=>'index.php?r=message/upload',
               'allowedExtensions'=>array("jpg","jpeg","gif","exe","mov","mp4","txt","doc","pdf","xls","xlsx", "docx","3gp","php","ini","avi","rar","zip","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>100*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>1*1024,
               'auto'=>true,
               'multiple' => true,
               //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
               'messages'=>array(
                                 'typeError'=>"{file} n'a pas une extension valide. Seules les extensions {extensions} sont autorisées.",
                                'sizeError'=>"{file} a une taille supérieure à {sizeLimit}.",
                                'minSizeError'=>"{file} a une taille inférieure à {minSizeLimit}.",
                                'emptyError'=>"{file} est vide, veuillez sélectionner un fichier non vide !",
                                'onLeave'=>"Les fichiers sont en cours de téléchargement, si vous arretez le téléchargement sera stoppé."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
               )

               ));
                echo CHtml::link('Effacer fichiers',$url=Yii::app()->createUrl('information/tblInformation/resetUploadFile'));
                ?>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Envoyer' : 'Envoyer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->