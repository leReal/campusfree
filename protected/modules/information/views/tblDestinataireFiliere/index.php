<?php
/* @var $this TblDestinataireFiliereController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Destinataire Filieres',
);

$this->menu=array(
	array('label'=>'Create TblDestinataireFiliere', 'url'=>array('create')),
	array('label'=>'Manage TblDestinataireFiliere', 'url'=>array('admin')),
);
?>

<h1>Tbl Destinataire Filieres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
