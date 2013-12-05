<?php
/* @var $this TblEtablissementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etablissements',
);

$this->menu=array(
	array('label'=>'Créer un établissement', 'url'=>array('create')),
	array('label'=>'Gérer les établissements', 'url'=>array('admin')),
);
?>

<h1>Gestion des établissements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
