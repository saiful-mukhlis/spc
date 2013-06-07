<?php

$this->menu=array(
	array('label'=>'Create Pelanggan','url'=>array('create')),
	array('label'=>'View Pelanggan','url'=>array('view','id'=>$model->id)),
	array('label'=>'Data Pelanggan','url'=>array('admin')),
);
?>

<h1>Update Pelanggan <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>