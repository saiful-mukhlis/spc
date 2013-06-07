<?php
$this->breadcrumbs=array(
	'Item Gantis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemGanti','url'=>array('index')),
	array('label'=>'Create ItemGanti','url'=>array('create')),
	array('label'=>'View ItemGanti','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ItemGanti','url'=>array('admin')),
);
?>

<h1>Update ItemGanti <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>