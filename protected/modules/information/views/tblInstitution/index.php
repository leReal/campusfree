<?php
/* @var $this TblInstitutionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Institutions',
);

$this->menu=array(
	array('label'=>'Créer une institution', 'url'=>array('create')),
	array('label'=>'Gérer une institution', 'url'=>array('admin')),
);
?>

<h1>Gestion des institutions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
