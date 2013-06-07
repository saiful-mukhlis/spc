<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'item-ganti-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'pelayananid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'barangid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jumlah',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'harga',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'total',array('class'=>'span5','maxlength'=>12)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
