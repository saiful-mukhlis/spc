<?php 
$this->breadcrumbs=array(
		'Home'=>array('site/index'),
		'Your Orders',
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
<h1>Your Orders #<?php echo $model->ID;?></h1>
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

$trxd=Trxd::model()->with('iDP')->findAllByAttributes(array('IDTRX'=>$model->ID));
$i=1;
foreach ($trxd as $v) {
	$command=Yii::app()->db->createCommand('SELECT GET_NAMA_UKURAN('.$v->IDS.') AS X FROM DUAL');
	$row=$command->queryRow();
	//$s1=Stock::model()->with('s')->findByPk($v->IDS);
	echo '<tr><td>'.($i).'</td><td>'.CHtml::image(Yii::app()->baseUrl.'/images/best/37x54/img/product/1/'.$v->iDP->IMG).'<hr/>'.$v->iDP->NAMA.'</td><td>'.$row['X'].'</td><td>Rp '.number_format($v->HARGA, 2).'</td><td>'.$v->JML.'</td><td>Rp '
		.number_format($v->JML*$v->HARGA, 2).'</td></tr>';
	$i++;
}

?>              
             
                <tr>
                  <td colspan="5" style="text-align: right;">Total Invoice</td>
                  <td>Rp <?php echo number_format($model->TOTAL, 2)?></td>
                </tr>
              </tbody>
            </table>
</div>

<div class="span12">
<h3>To complete the order you can do Transfer to Our Account and Confirmation Us to 021-2500-000</h3>
</div>

</div>



</div>

</div>

</div>





            





