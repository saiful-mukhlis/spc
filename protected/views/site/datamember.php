<?php 


//$p=new Product();
//$p=new Product2();
$this->breadcrumbs=array(
		'Contact',
);

?>




















<div class="container-fluid content">
<div class="row-fluid">
<div class="span12">

<div class="span12">
<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
</div>


<div class="span12">
<h1>Data Customer</h1>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'member-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php // echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'EMAIL',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'NOTELP',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'ALAMAT',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="span11 form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Proses',
		)); ?>
	</div>

<?php $this->endWidget(); ?>


</div>



</div>

</div>

</div>





            





