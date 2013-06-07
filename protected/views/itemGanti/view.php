<?php
$this->breadcrumbs=array(
	'Item Gantis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ItemGanti','url'=>array('index')),
	array('label'=>'Create ItemGanti','url'=>array('create')),
	array('label'=>'Update ItemGanti','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ItemGanti','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemGanti','url'=>array('admin')),
);
?>

<h1>View ItemGanti #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pelayananid',
		'barangid',
		'jumlah',
		'harga',
		'total',
	),
)); ?>
