<?php

$this->menu=array(
	array('label'=>'Create Barang','url'=>array('create')),
	array('label'=>'View Barang','url'=>array('view','id'=>$model->id)),
	array('label'=>'Data Barang','url'=>array('admin')),
);
?>

<h1>Update Barang <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>