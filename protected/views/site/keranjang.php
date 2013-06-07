<?php 


//$p=new Product();
//$p=new Product2();
$this->breadcrumbs=array(
		'Home'=>array('site/index'),
		'Cart',
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
<div class="span11">
<h1>SHOPPING CART</h1>
 <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
              
<?php 

$i1=count($ids);
$total=0;
for ($i = 0; $i < $i1; $i++) {
	$p=Product::model()->findByPk($ids[$i]);
	$s1=Stock::model()->with('s')->findByPk($sizes[$i]);
	if ($p!=null&&$s1!=null) {
		echo '<tr><td>'.($i+1).'</td><td>'.CHtml::image(Yii::app()->baseUrl.'/images/best/37x54/img/product/1/'.$p->IMG).'<hr/>'.$p->NAMA.'</td><td>'.$s1->s->NAMA.'</td><td>Rp '.number_format($p->HARGA, 2).'</td><td>'.$jmls[$i].'</td><td>Rp '
		.number_format($jmls[$i]*$p->HARGA, 2).'</td></tr>';
		$total=$total+($jmls[$i]*$p->HARGA);
	}
	

}

?>              
             
                <tr>
                  <td colspan="5" style="text-align: right;">Total</td>
                  <td><?php echo number_format($total, 2)?></td>
                </tr>
              </tbody>
            </table>
</div>

<div class="span12">
<div class="span3">
<?php echo CHtml::link('Continue Shopping',array('site/index'),array('class'=>'btn'))?>
</div>
<?php echo CHtml::form(array('site/member'))?>
<div class="input-append input-prepend">
	<span class="add-on"><i class="icon-envelope"></i></span>
  <input class="span10" id="appendedInputButton" name="email" type="text">
  <button class="btn" type="submit">Order Now</button>
</div>
</form>
</div>

</div>



</div>

</div>

</div>





            





