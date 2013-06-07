<?php
$this->breadcrumbs=array(
	'Usrs',
);

$this->menu=array(
	array('label'=>'Create Usr','url'=>array('create')),
	array('label'=>'Manage Usr','url'=>array('admin')),
);
?>

<h1>Usrs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
