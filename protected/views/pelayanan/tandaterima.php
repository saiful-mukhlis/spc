
<div class="container tile"><!-- container start -->

<div class="row-fluid">
	<div class="span12">
	<h1>Tanda Terima</h1>
	</div>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pelayanan-form',
	'enableAjaxValidation'=>false,
		'type'=>'horizontal',
)); ?>



<div class="row-fluid">
	<div class="span6">
<?php echo $form->textFieldRow($model,'nama',array('class'=>'span12','maxlength'=>100)); ?>
<?php echo $form->textFieldRow($model,'telp',array('class'=>'span12','maxlength'=>100)); ?>
<?php echo $form->textAreaRow($model,'alamat',array('class'=>'span12','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'jenisBarang',array('class'=>'span12','maxlength'=>100)); ?>
<?php echo $form->textFieldRow($model,'typeMerek',array('class'=>'span12','maxlength'=>100)); ?>
	
	
	</div>
	
		<div class="span6">
	
	
	<?php echo $form->textFieldRow($model,'sn',array('class'=>'span12','maxlength'=>100)); ?>
	<?php echo $form->textAreaRow($model,'kelengkapan',array('class'=>'span12','maxlength'=>255, 'rows'=>4)); ?>
	<?php echo $form->textAreaRow($model,'kerusakan',array('class'=>'span12','maxlength'=>255, 'rows'=>5)); ?>
	<?php // echo $form->textAreaRow($model,'service',array('class'=>'span12','maxlength'=>255)); ?>
	</div>
	

	

</div>






<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'type'=>'primary',
			'htmlOptions'=>array('class'=>'btn-large'),
			'label'=>'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- container end -->



<?php
if ($p1!=null) {
	echo $this->renderPartial('print2', array('model'=>$model,'p1'=>$p1,'p2'=>$p2));
}

?>





