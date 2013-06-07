
<h1>Barang yang telah di terima</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pelayanan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                               'name'=>'id' ,
                               'htmlOptions'=>array ('width' =>'40px'),
                  ),
			
			array(
					'header'=>'Nama Pelanggan' ,
					'name'=>'total' ,
					'value'=>'$data->pelanggan->nama' ,
			),
			array(
					'header'=>'N0 Telp' ,
					'name'=>'status' ,
					'value'=>'$data->pelanggan->notelp' ,
			),

				
		//'pelangganid',
		'jenis_barang',
		'type_merek',
		'sn',
		//'kelengkapan',
		/*
		'kerusakan',
		'service',
		'ganti',
		'total',
		'status',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
'template' => '{bayar} {view} {update} {delete}',
				'buttons'  => array(
						'bayar' => array(
								'label'=>'Pembayaran',
								'icon'=>'file',
								'url'=>'Yii::app()->createUrl("/pelayanan/service", array("id" => $data->id))',
								

						)
				),
				
				
		),
	),
)); ?>
