<?php
//$product=new ProductDetail();
Yii::app ()->clientScript->registerCssFile ( Yii::app ()->baseUrl . '/css/product.css' );
echo H::hero ();
?>
<?php $this->widget('ext.bmb.widgets.BmbNav')?>
<div class="container-fluid">

  <div class="row-fluid">

    <div class="span12">

      <div class="span9">

        <h1><?php echo CHtml::encode($product->nama)?></h1>
        <div class="span6">
          <div class="row-fluid center">
            <div class="span12 mimg">
              <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/<?php echo $product->imgl;?>' class='cloud-zoom' id='zoom1' rel="smoothMove:5,zoomWidth:'auto'"> <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/<?php echo $product->imgm;?>' alt='<?php echo $product->nama?>' />
              </a>
            </div>
            <div class="span12">
              <span class="span2 blight2"> <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/<?php echo $product->imgl;?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/p/<?php echo $product->imgm;?>' "> <img id="xx"
                  src='<?php echo Yii::app()->baseUrl?>/img/product/p/<?php echo $product->imgs;?>' alt="<?php echo CHtml::encode($product->nama)?>" />
              </a>
              </span>
              
              <?php 
              	$imgs=$product->getOtherImage();
              	//print_r($imgs); return ;
              	if ($imgs!=null) {
              		foreach ($imgs as $v) {
              			?>
              			<span class="span2 blight2"> <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/<?php echo $v->imgl?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/p/<?php echo $v->imgm?>' "> <img id="xx"
                  src='<?php echo Yii::app()->baseUrl?>/img/product/p/<?php echo $v->imgs?>' alt="<?php echo CHtml::encode($product->nama)?>" />
              </a>
              </span>
              			<?php 
              		}
              	}
              	
              ?>
               
              
            </div>
          </div>
        </div>



        <div class="blightp pprice span5">
          <h2><?php echo CHtml::encode($product->nama)?></h2>
          
          <?php 
          if ($product->diskon!=null && $product->diskon>0) {
          	if ($product->harga==NULL) {
          		$product->harga=0;
          	}
          	if ($product->harga>0) {
          		$diskon=$product->diskon/$product->harga*100;
          		echo '<span class="diskon">Sedang Diskon !!</span> <span class="hfirst">Rp '.number_format($product->harga,2).'</span> <span class="diskon">diskon '.$diskon.'%, anda untung Rp '.number_format($product->diskon,2).'</span> <span class="dprice">Rp '.number_format(($product->harga - $product->diskon),2).'</span> <a class="btn btn-small btn-primary">Beli Sekarang</a>';
          	}else {
				echo '<span class="dprice">Rp '.number_format($product->harga,2).'</span> <a class="btn btn-small btn-primary">Beli Sekarang</a>';
			}
          }
          ?>
          
          
          <div class="noteall">
            <table>
            <?php 
            if ($product->note!=NULL) {
            	?>
            	<tr>
                <td align="center"><span class="label label-inverse">Note</span></td>
                <td><span class="note"><?php echo CHtml::encode($product->note)?></span></td>
              </tr>
            	<?php 
            }
            ?>
            
            <?php 
            $ukurans=$product->getUkurans();
            if ($ukurans!=NULL) {
				$ukuranString='';
				$koma=false;
				foreach ($ukurans as $v) {
					if ($koma) {
						$ukuranString=', '.$ukuranString.$v->ukuran->nama;
					}else{
						$ukuranString=$ukuranString.$v->ukuran->nama;
						$koma=true;
					}
				}
            	?>
            	<tr>
                <td align="center"><span class="label label-inverse">Ukuran</span></td>
                <td><span class="note"><?php echo $ukuranString;?></span></td>
              </tr>
            	<?php 
            }
            ?>
            
            <?php 
            $ukurans=$product->getWarnas();
            if ($ukurans!=NULL) {
				$ukuranString='';
				$koma=false;
				foreach ($ukurans as $v) {
					if ($koma) {
						$ukuranString=', '.$ukuranString.$v->warna->nama;
					}else{
						$ukuranString=$ukuranString.$v->warna->nama;
						$koma=true;
					}
				}
            	?>
            	<tr>
                <td align="center"><span class="label label-inverse">Warna</span></td>
                <td><span class="note"><?php echo $ukuranString;?></span></td>
              </tr>
            	<?php 
            }
            ?>
              
              <?php 
            if ($product->brand!=NULL) {
            	?>
            	<tr>
                <td align="center"><span class="label label-inverse">Brand</span></td>
                <td><span class="note"><?php echo CHtml::encode($product->brand0->nama)?></span></td>
              </tr>
            	<?php 
            }
            ?>
            
            <?php 
            if ($product->rating!=NULL) {
            	?>
            	<tr>
                <td align="center"><span class="label label-inverse">Rating</span></td>
                <td><span class="note"><?php $this->widget('CStarRating',array('name'=>'rating','allowEmpty'=>false,'value'=>$product->rating,'readOnly'=>true));?></span></td>
              </tr>
            	<?php 
            }
            ?>
            
            <?php 
            if ($product->stock!=NULL) {
            	?>
            	<tr>
                <td align="center"><span class="label label-inverse">Stock</span></td>
                <td><span class="note"><?php echo CHtml::encode($product->stock0->nama)?></span></td>
              </tr>
            	<?php 
            }
            ?>
            
            <?php 
            if ($product->status!=NULL) {
            	?>
            	<tr>
                <td align="center"><span class="label label-inverse">Status Barang</span></td>
                <td><span class="note"><?php echo CHtml::encode($product->status0->nama)?></span></td>
              </tr>
            	<?php 
            }
            ?>
            </table>
          </div>
          <a class="btn btn-primary">Beli Sekarang</a> <a class="btn">Simpan</a>
        </div>
    
 
    
    
<?php
$this->widget ( 'ext.projekktor.EProjekktor' );
?>
<div class="span12">
          <video class="projekktor" title="Rick Roll" width="640" height="390" poster="<?php echo Yii::app()->baseUrl?>/img/video.png" controls>
            <source src="http://www.youtube.com/watch?v=Di7G4nbpyDg" type="video/youtube" />
          </video>

<?php

?>

    <h3>Other Collection</h3>
          <div class="span3 fdtail">
            <div class="span12 d2">
              <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/monta freestyle ball mini.png' title='Monta Freestyle Ball'> <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/monta freestyle ball mini.png' alt="Monta Freestyle Ball" />
              </a>
              <h4>Monta Freestyle Ball</h4>
              <span class="hfirstd">Rp 1000.000</span> <span class="dpriced">Rp 500.000</span> <a class="btn btn-mini btn-primary">Beli</a>

            </div>
          </div>
          <div class="span3 fdtail">
            <div class="span12 d2">
              <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/monta freestyle ball mini.png' title='Monta Freestyle Ball'> <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/monta freestyle ball mini.png' alt="Monta Freestyle Ball" />
              </a>
              <h4>Monta Freestyle Ball</h4>
              <span class="hfirstd">Rp 1000.000</span> <span class="dpriced">Rp 500.000</span> <a class="btn btn-mini btn-primary">Beli</a>

            </div>
          </div>
          <div class="span3 fdtail">
            <div class="span12 d2">
              <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/monta freestyle ball mini.png' title='Monta Freestyle Ball'> <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/monta freestyle ball mini.png' alt="Monta Freestyle Ball" />
              </a>
              <h4>Monta Freestyle Ball</h4>
              <span class="hfirstd">Rp 1000.000</span> <span class="dpriced">Rp 500.000</span> <a class="btn btn-mini btn-primary">Beli</a>

            </div>
          </div>

        </div>


      </div>
      <div class="span3">
       
    <?php
				for($i = 0; $i < 4; $i ++) {
					?>
    	<div class="span12 promo" style="margin-left: 0px;">
          <a href='<?php echo Yii::app()->baseUrl?>/img/promo.png' title='Promo'> <img src='<?php echo Yii::app()->baseUrl?>/img/promo.png' alt="Promo" />
          </a>
        </div>
    	<?php
				}
				
				?>
    
    
       
       </div>

    </div>
    <!--/span12-->




  </div>
  <!--/row-->





</div>
<!-- / -->


<?php echo H::sitemap();?>



<?php

$this->widget ( 'ext.cloudzoom.CloudZoom' );
?>

<?php
Yii::app ()->getClientScript ()->registerScript ( 'xx', '$(\'[id="xx"]\').click(function() { $(\'[id="xx"]\').parent().parent().removeClass("blight"); $(this).parent().parent().addClass("blight");});', CClientScript::POS_END );
?>

