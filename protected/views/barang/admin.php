<?php
$this->breadcrumbs=array(
	'Barang',
);

$this->menu=array(
	array('label'=>'Create Barang','url'=>array('create')),
);

?>

<h1>Barang</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'barang-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		 array(
                               'name'=>'id' ,
                               'htmlOptions'=>array ('width' =>'40px'),
                  ),

		'nama',
		'stock',
		'harga',
//		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
