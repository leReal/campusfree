<?php
/* @var $this TblCoordonnateurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coordonnateurs',
);

$this->menu=array(
	array('label'=>'Créer un coordonnateur', 'url'=>array('create')),
	array('label'=>'Gérer les coordonnateurs', 'url'=>array('admin')),
);
?>

<h1>Gestion des coordonnateurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
