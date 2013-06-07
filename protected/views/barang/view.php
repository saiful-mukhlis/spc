<?php
$this->breadcrumbs=array(
	'Barang'=>array('admin'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Create Barang','url'=>array('create')),
	array('label'=>'Update Barang','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Barang','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Data Barang','url'=>array('admin')),
);
?>

<h1>Barang #<?php echo $model->nama; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'stock',
		'harga',
		//'status',
	),
)); ?>
