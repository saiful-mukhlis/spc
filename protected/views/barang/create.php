<?php
$this->breadcrumbs=array(
	'Barang'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Data Barang','url'=>array('admin')),
);
?>

<h1>Create Barang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>