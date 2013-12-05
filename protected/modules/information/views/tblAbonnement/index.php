<?php
/* @var $this TblAbonnementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Abonnements',
);

$this->menu=array(
	array('label'=>'Créer un abonnement', 'url'=>array('create')),
	array('label'=>'Gérer les abonnement', 'url'=>array('admin')),
);
?>

<h1>Gestion des abonnements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
