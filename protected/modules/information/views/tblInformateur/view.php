<?php
/* @var $this TblInformateurController */
/* @var $model User */

$this->breadcrumbs=array(
	'Informateurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Liste des informateurs', 'url'=>array('index')),
	array('label'=>'Créer un informateur', 'url'=>array('create')),
	array('label'=>'Modifier un informateur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Supprimer un informateur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Etes-vous sûr(e)s de vouloir supprimer cet informateur?')),
	array('label'=>'Gérer les informateurs', 'url'=>array('admin')),
);
?>


<h1>Détails de l'informateur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'nom',
                'prenom',
		'email',
		'create_at',
		'lastvisit_at',
	),
)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->type0,
	'attributes'=>array(
		'nom:text:Type',
	),
)); ?>

<?php
echo "<br><h2>Classes de l'informateur</h2>";
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'informateur-classe-grid',
	'dataProvider'=>$model2->search(),
	'filter'=>$model2,
	'columns'=>array(
            array(            //affichage de la classe
              'name'=>'id_classe',
              'value'=>'$data->idClasse->nom',
            ),
            array(            // Affichage de l'informateur
              'name'=>'id_utilisateur',
              'value'=>'$data->idUtilisateur->nom',
            ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>