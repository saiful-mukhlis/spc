
<?php 
$b=Barang::model()->findAll();
$bc=CHtml::listData($b, 'id' , 'nama');
?>


<div class="container tile"><!-- container start -->

<div class="row-fluid">
	<div class="span12">
	<h1>Pembayaran</h1>
	</div>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pelayanan-form',
	'enableAjaxValidation'=>false,
		'type'=>'horizontal',
)); ?>



<div class="row-fluid">
	<div class="span6">
<?php echo $form->textFieldRow($model,'nama',array('class'=>'span12','maxlength'=>100, 'disabled'=>'disabled')); ?>
<?php echo $form->textFieldRow($model,'telp',array('class'=>'span12','maxlength'=>100, 'disabled'=>'disabled')); ?>
<?php echo $form->textAreaRow($model,'alamat',array('class'=>'span12','maxlength'=>255, 'disabled'=>'disabled')); ?>
<?php echo $form->textFieldRow($model,'jenisBarang',array('class'=>'span12','maxlength'=>100, 'disabled'=>'disabled')); ?>
<?php echo $form->textFieldRow($model,'typeMerek',array('class'=>'span12','maxlength'=>100, 'disabled'=>'disabled')); ?>
	
	
	</div>
	
		<div class="span6">
	
	
	<?php echo $form->textFieldRow($model,'sn',array('class'=>'span12','maxlength'=>100, 'disabled'=>'disabled')); ?>
	<?php echo $form->textAreaRow($model,'kelengkapan',array('class'=>'span12','maxlength'=>255, 'disabled'=>'disabled')); ?>
	<?php echo $form->textAreaRow($model,'kerusakan',array('class'=>'span12','maxlength'=>255, 'disabled'=>'disabled')); ?>
	<?php echo $form->textAreaRow($model,'service',array('class'=>'span12','maxlength'=>255)); ?>
	</div>
	
	<div class="span11">
<table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Barang</th>
                  <th width="200px">Harga</th>
                  <th width="100px">Jumlah</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
<?php 
for ($i = 0; $i < 5; $i++) {
?>              
                <tr>
                  <td><?php echo $i+1; ?></td>

                  <td>
                         <?php
        $this->widget ('bootstrap.widgets.TbSelect2', array(
                   'asDropDownList'=>true,
                      //'htmlOptions'=>array ('data-placeholder'=> 'Pilih Barang'),
                      'data' => $bc,
                      'name' => 'ServiceForm[barang]['.$i.']' ,
                      'options' => array (
                                   //'tags' => array('clever','is', 'better', 'clevertech'),
                                   //'multiple'=>true,
                                   'placeholder' => 'Pilih Barang' ,
									'allowClear'=> true,
                                   'width' => '100%' ,
                                   //'tokenSeparators' => array(',', ' ')
                     )));
       
       ?>
                  
                  </td>

                  <td><input class="span10"  disabled="disabled" name="h<?php echo $i;?>" id="h<?php echo $i;?>" type="text"></span></td>
                  <td><input class="span10" name="ServiceForm[jumlah][<?php echo $i;?>]" id="ServiceForm_jumlah_<?php echo $i;?>" type="text"></td>
                  <td><input class="span10"  disabled="disabled" name="t<?php echo $i;?>" id="t<?php echo $i;?>" type="text"></span></td>
                </tr>
                <?php 
}

?>
              </tbody>
            </table>
	</div>
	
	<div class="span11">
	<div class="span6">
	<div class="span12">
	<?php echo $form->textFieldRow($model,'biaya',array('class'=>'span12','maxlength'=>100)); ?>
	</div>
	</div>
	<div class="span6">
	<div class="span12">
	<div class="control-group "><label class="control-label" for="total">Total</label><div class="controls"><input class="span12"  disabled="disabled" name="total" id="total" type="text"></div></div>
	</div>
	</div>
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
	echo $this->renderPartial('print', array('model'=>$model,'p1'=>$p1,'p2'=>$p2,'bs'=>$bs,'t'=>$t));
}

?>


<?php 

$o='var bs=new Array();';
foreach ($b as $v) {
	$o.='bs['.$v->id.']="'.$v->harga.'";';
}
?>

<?php 

for ($i = 0; $i < 5; $i++) {
	$o.='var h'.$i.'=0;
var t'.$i.'=0;
var j'.$i.'=0;								
$("#ServiceForm_barang_'.$i.'")
    .on("change", function(e) { 
		var tmp=0;
		tmp=parseInt(e.val);
		if (tmp>0){
			h'.$i.'=bs[tmp];			
  			$("input#h'.$i.'").val(bs[tmp]);
  		}else{
			$("input#h'.$i.'").val("");
		}
		j'.$i.'=0;t'.$i.'=0;$("#ServiceForm_jumlah_'.$i.'").val("");
});
	
$("#ServiceForm_jumlah_'.$i.'").change(function(e) {j'.$i.'=parseInt($("#ServiceForm_jumlah_'.$i.'").val());t'.$i.'=j'.$i.'*h'.$i.';$("input#t'.$i.'").val(t'.$i.');$.total(); });';
}

?>
<?php 
$o1='
		$.total=function(e) {
			var total=0;
			var biaya = parseInt($("#ServiceForm_biaya").val()) || 0;
			total=biaya+t0+t1+t2+t3+t4;
			$("input#total").val(total);
		};
		$("#ServiceForm_biaya").change($.total);
		';
?>
<?php 
Yii::app()->clientScript->registerScript('barang', $o1.$o);
?>


