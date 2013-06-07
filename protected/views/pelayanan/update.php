<?php
$this->breadcrumbs=array(
	'Pelayanans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pelayanan','url'=>array('index')),
	array('label'=>'Create Pelayanan','url'=>array('create')),
	array('label'=>'View Pelayanan','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Pelayanan','url'=>array('admin')),
);
?>

<h1>Update Pelayanan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>