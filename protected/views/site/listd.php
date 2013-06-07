
<div class="span4 fdtail ml20">
<div class="span12 d2">
<a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
<img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
</a>
<h4><?php echo CHtml::encode($data->nama)?></h4>
<?php 
$pus=PuP::model()->getPuByProductId($data->id);
foreach ($pus as $v) {
	if ($v->ukuran!=null) {
		echo '<h5>'.$v->ukuran->nama.'</h5>';
		echo '<p>'.$v->kethg1.' <span class="dpriced">'.$v->hg1.'</span></p>';
		echo '<p>'.$v->kethg2.' <span class="dpriced">'.$v->hg2.'</span></p>';
	}
}
// <span class="hfirstd">Rp 100.000</span>
// <span class="dpriced">Rp 50.000</span>
?>

<a class="btn btn-mini btn-primary" >Beli</a>

</div>
</div>