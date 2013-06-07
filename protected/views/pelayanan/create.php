<?php
$this->breadcrumbs=array(
	'Pelayanans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pelayanan','url'=>array('index')),
	array('label'=>'Manage Pelayanan','url'=>array('admin')),
);
?>

<h1>Create Pelayanan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>