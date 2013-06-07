<?php
$this->breadcrumbs=array(
	'Pelayanans',
);

$this->menu=array(
	array('label'=>'Create Pelayanan','url'=>array('create')),
	array('label'=>'Manage Pelayanan','url'=>array('admin')),
);
?>

<h1>Pelayanans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
