<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tanggal',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pelangganid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jenis_barang',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'type_merek',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'sn',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'kelengkapan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'kerusakan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'service',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'biaya',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'total',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
