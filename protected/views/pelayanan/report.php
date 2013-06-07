
<div class="container tile"><!-- container start -->

<div class="row-fluid">
	<div class="span12">
	<h1>Report Pelayanan Service</h1>
	</div>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pelayanan-form',
	'enableAjaxValidation'=>false,
		'type'=>'horizontal',
)); ?>



<div class="row-fluid">
<div class="span2"></div>
	<div class="span6">
<?php echo $form->datepickerRow($model,'start',array('class'=>'span12','maxlength'=>100)); ?>
<?php echo $form->datepickerRow($model,'end',array('class'=>'span12','maxlength'=>100)); ?>







<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'type'=>'primary',
			'htmlOptions'=>array('class'=>'btn-large'),
			'label'=>'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- container end -->






