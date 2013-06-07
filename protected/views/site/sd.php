<style>
<!--


input.xx {padding:6px 0px 5px 5%;border:0px solid #fff; background:rgb(51, 51, 51);line-height: 20px; font-family: "Segoe UI","sans-serif";font-size:1em; margin:0px 0px;   color:#fff; -moz-transition:.8s linear; -webkit-transition:.8s ease-out; transition:.8s linear;}
input.xx {
    display: inline-block;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
	margin-bottom: 6px;
padding: 1.5em 14px;
border-top-right-radius: 2px;
border-top-left-radius: 2px;
}
textarea.xx {padding:6px 0px 5px 5%;border:0px solid #fff; background:rgb(51, 51, 51);line-height: 20px; font-family: "Segoe UI","sans-serif";font-size:1em; margin:0px 0px;   color:#fff; -moz-transition:.8s linear; -webkit-transition:.8s ease-out; transition:.8s linear;}
textarea.xx {
    display: inline-block;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
	margin-bottom: 5px;
padding: 1.6em 14px;
border-top-right-radius: 2px;
border-top-left-radius: 2px;
}

input.yy {padding:6px 0px; font-family:"Segoe UI","sans-serif"; text-align:center; width:25%; font-size:1em; margin:0px 0px; margin-left:-3px; border:1px solid #0081c2; background:#0081c2;  color:#FFF;   -moz-transition:.8s linear; -webkit-transition:.8s ease-out; transition:.8s linear;}	
input.yy:hover {border:1px solid #000;background:#000;}
input.yy {
    display: inline-block;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
	
	
	margin-top: 4px;
	margin-bottom: 150px;
}


.mb50{margin-bottom: 50px;}
-->
</style>

<div class="container-fluid content">
<div class="row-fluid">


<div class="span12">

<div class="span12">
<div class="span12"><h1 class="mb50"  style="zolor: #464646;font-size: 54px;line-height: 56px;font-weight: normal;text-align: left;">Contact</h1></div>

<div class="span3" style="text-align: left;font-size: 16px;">
<h2 style="text-align: left;font-size: 28px;line-height: 32px;font-weight: normal;color: #7fc61a">SD DARUL ILMI</h2>
<ul>
<li style="margin-bottom: 12px;"><span><?php echo CHtml::image(Yii::app()->baseUrl.'/img/phone.jpg')?>      (031) 588800</span></li>
<li style="margin-bottom: 12px;"><span><?php echo CHtml::image(Yii::app()->baseUrl.'/img/facebook.jpg')?>       facebook.com/sd.darul.ilmi.surabaya</span></li>
<li style="margin-bottom: 12px;"><span><?php echo CHtml::image(Yii::app()->baseUrl.'/img/googleplus.jpg')?>       sd.darul.ilmi.surabaya</span></li>
<li style="margin-bottom: 12px;"><span><?php echo CHtml::image(Yii::app()->baseUrl.'/img/twitter.jpg')?>       @sd.darul.ilmi.surabaya</span></li>
<li style="margin-bottom: 12px;"><span><?php echo CHtml::image(Yii::app()->baseUrl.'/img/address.jpg')?>      Jl. Jambangan Kebon Agung No. 46 Surabaya</span></li>
</ul>



</div>
<div class="span8">
<form>
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

<div class="span6">
<input class="xx span12" type="text" id="inputEmail" placeholder="Nama">
<?php echo $form->error($model,'email',array('class'=>'help-inline')); ?>
<input class="xx span12" type="text" id="inputEmail" placeholder="Email">
<input class="xx span12" type="text" id="inputEmail" placeholder="Subject">
</div>
<div class="span6">
<textarea class="xx span12" rows="6" id="inputEmail" placeholder="Body"></textarea>
</div>




<div class="span9">
</div>
<input class="btn yy span3 btn-primary" type="submit" id="inputEmail" value="Submit">

</form>
<?php $this->endWidget(); ?>
</div>
</div>


</div>
</div>


</div>


