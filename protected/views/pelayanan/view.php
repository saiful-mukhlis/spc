<?php
$this->breadcrumbs=array(
	'Pelayanans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pelayanan','url'=>array('index')),
	array('label'=>'Create Pelayanan','url'=>array('create')),
	array('label'=>'Update Pelayanan','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Pelayanan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pelayanan','url'=>array('admin')),
);
?>

<h1>View Pelayanan #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pelangganid',
		'jenis_barang',
		'type_merek',
		'sn',
		'kelengkapan',
		'kerusakan',
		'service',
		'ganti',
		'total',
		'status',
	),
)); ?>
