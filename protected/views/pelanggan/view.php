<?php

$this->menu=array(
	array('label'=>'Create Pelanggan','url'=>array('create')),
	array('label'=>'Update Pelanggan','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Pelanggan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Data Pelanggan','url'=>array('admin')),
);
?>

<h1>View Pelanggan #<?php echo $model->nama; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'alamat',
		'notelp',
		'status',
	),
)); ?>
