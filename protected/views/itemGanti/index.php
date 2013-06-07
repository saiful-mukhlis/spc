<?php
$this->breadcrumbs=array(
	'Item Gantis',
);

$this->menu=array(
	array('label'=>'Create ItemGanti','url'=>array('create')),
	array('label'=>'Manage ItemGanti','url'=>array('admin')),
);
?>

<h1>Item Gantis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
