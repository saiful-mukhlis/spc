<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelangganid')); ?>:</b>
	<?php echo CHtml::encode($data->pelangganid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_barang')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_merek')); ?>:</b>
	<?php echo CHtml::encode($data->type_merek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sn')); ?>:</b>
	<?php echo CHtml::encode($data->sn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kelengkapan')); ?>:</b>
	<?php echo CHtml::encode($data->kelengkapan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kerusakan')); ?>:</b>
	<?php echo CHtml::encode($data->kerusakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service')); ?>:</b>
	<?php echo CHtml::encode($data->service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biaya')); ?>:</b>
	<?php echo CHtml::encode($data->biaya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>