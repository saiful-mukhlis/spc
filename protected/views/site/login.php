<style>
<!--
.form-horizontal .control-label {
width: 100px;
}
.form-horizontal .controls {
margin-left: 120px;
}
-->
</style>
<div class="container" style="width: 470px;">


<div class="mt100 well" >


<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="form">
<?php
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
   'htmlOptions'=>array('class'=>'form-horizontal'),
	'enableClientValidation'=>true,
    //   'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <fieldset>
        <legend>LOGIN</legend>
        <hr/>


	<div class="control-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label')); ?>
        <section  class="controls">
		<?php echo $form->textField($model,'username',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'username',array('class'=>'help-inline')); ?>
         </section>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
                <section  class="controls">
		<?php echo $form->passwordField($model,'password',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'password',array('class'=>'help-inline')); ?>
                </section>
	</div>

	<div class="help-block">
        <?php echo $form->checkBox($model,'rememberMe',array('class'=>'')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-large')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>


</div><!-- form -->



</div></div>

<?php
Yii::app ()->clientScript ->registerScript('focususername',
'document.getElementById("LoginForm_username").focus();'
,CClientScript::POS_END);
?> 

