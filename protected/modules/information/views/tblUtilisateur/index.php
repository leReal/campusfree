<?php
/* @var $this TblUtilisateurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Utilisateurs',
);

$this->menu=array(
	array('label'=>'Créer un utilisateur', 'url'=>array('create')),
	array('label'=>'Gérer les utilisateurs', 'url'=>array('admin')),
);
?>

<h1>Gestion des utilisateurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
