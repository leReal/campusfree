<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Erreur',
);
?>

<h2>Erreur <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>