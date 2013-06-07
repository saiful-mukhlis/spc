<?php


$this->menu=array(
	array('label'=>'Create Pelanggan','url'=>array('create')),
);


?>

<h1>Pelanggan</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pelanggan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		 array(
                               'name'=>'id' ,
                               'htmlOptions'=>array ('width' =>'40px'),
                  ),
			
		'nama',
		'alamat',
		'notelp',
		//'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
				
		),
	),
)); ?>
