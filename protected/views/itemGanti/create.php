<?php
$this->breadcrumbs=array(
	'Item Gantis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ItemGanti','url'=>array('index')),
	array('label'=>'Manage ItemGanti','url'=>array('admin')),
);
?>

<h1>Create ItemGanti</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>