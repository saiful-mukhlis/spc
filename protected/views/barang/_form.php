<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'barang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'stock',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'harga',array('class'=>'span5','maxlength'=>12)); ?>

	<?php // echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<div class="form-actions span6">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'type'=>'primary',
			'htmlOptions'=>array('class'=>'btn-large'),
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
