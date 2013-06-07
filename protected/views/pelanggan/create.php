<?php
$this->menu=array(
	array('label'=>'Data Pelanggan','url'=>array('admin')),
);
?>

<h1>Create Pelanggan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>