<?php
/* @var $this TblInformationController */
/* @var $model TblInformation */

$this->breadcrumbs=array(
	'Informations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des informations', 'url'=>array('index')),
	array('label'=>'Créer une information', 'url'=>array('create')),
	array('label'=>'Gérer les informations', 'url'=>array('admin')),
);
?>

<h1>Détails de l'information #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titremail',
		'contenumail',
	),
));
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->informateur,
	'attributes'=>array(
		"username:text:Informateur",
	),
)); ?>

<?php
echo '<br><h2>Pièces jointes</h2>';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-piecejointe-grid',
	'dataProvider'=>$model2->search(),
	'filter'=>$model2,
	'columns'=>array(
		'id',
		'information_id',
		'contenu',
		'filename',
		'filetype',
	 array(
                    'header'=>'Cliquez pour télécharger',
                    'labelExpression'=>'$data->filename',
                    'urlExpression'=>'array("downloadPiece","id"=>$data->id)',
                    'class'=>'CLinkColumn'
                ),
	),
));
?>
