<?php
/* @var $this TblInformationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Informations',
);

$this->menu=array(
	array('label'=>'Créer une information', 'url'=>array('create')),
	array('label'=>'Gérer les informations', 'url'=>array('admin')),
);
?>

<h1>Gestion des informations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
