<?php
/* @var $this TblDestinataireClasseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Destinataire Classes',
);

$this->menu=array(
	array('label'=>'Create TblDestinataireClasse', 'url'=>array('create')),
	array('label'=>'Manage TblDestinataireClasse', 'url'=>array('admin')),
);
?>

<h1>Tbl Destinataire Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
