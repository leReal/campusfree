<?php
/* @var $this TblInformateurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coordonnateurs',
);

$this->menu=array(
	array('label'=>'Créer un Coordonnateur', 'url'=>array('create')),
	array('label'=>'Gérer les Coordonnateurs', 'url'=>array('admin')),
);
?>

<h1>Gestion des coordonnateurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
