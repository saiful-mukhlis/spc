<?php 


//$p=new Product();
//$p=new Product2();
$this->breadcrumbs=array(
		'Home'=>array('site/index'),
		'Product'=>array('site/all'),
		$p->NAMA
);

?>




















<div class="container-fluid content">
<div class="row-fluid">
<div class="span12">
<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
</div>

</div>

</div>



<div class="container-fluid content">
<div class="row-fluid">
<div class="span12 tp">
<h1><?php echo CHtml::encode($p->NAMA)?></h1>
</div>

</div>

</div>

<div class="container-fluid content">
<div class="row-fluid">
<div class="span12">

        <div class="span4 di">
          <div class="row-fluid center">
            <div class="span12 mimg mb10">
              <a href='<?php echo Yii::app()->baseUrl?>/images/best/1400x2021/img/product/1/<?php echo $p->IMG?>' class='cloud-zoom' id='zoom1' rel="smoothMove:5,zoomWidth:'auto'"> <img src='<?php echo Yii::app()->baseUrl?>/images/best/350x505/img/product/1/<?php echo $p->IMG?>' alt='brighton' />
              </a>
            </div>
            <div class="span12" style="margin-left: 0px;">
              <span class="span2 blight2"> <a href='<?php echo Yii::app()->baseUrl?>/images/best/1400x2021/img/product/1/<?php echo $p->IMG?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/images/best/350x505/img/product/1/<?php echo $p->IMG?>' "> <img id="xx"
                  src='<?php echo Yii::app()->baseUrl?>/images/best/37x54/img/product/1/<?php echo $p->IMG?>' alt="" />
              </a>
              </span>
              
              <?php 
              
              
              if ($p->IMG1!=null) {
              	?>
              			<span class="span2 blight2"> <a href='<?php echo Yii::app()->baseUrl?>/images/best/1400x2021/img/product/1/<?php echo $p->IMG1?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/images/best/350x505/img/product/1/<?php echo $p->IMG1?>' "> <img id="xx"
                  src='<?php echo Yii::app()->baseUrl?>/images/best/37x54/img/product/1/<?php echo $p->IMG1?>' alt="" />
              </a>
              </span>
              			<?php 
              }
              
              
              if ($p->IMG2!=null) {
              	?>
                            			<span class="span2 blight2"> <a href='<?php echo Yii::app()->baseUrl?>/images/best/1400x2021/img/product/1/<?php echo $p->IMG2?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/images/best/350x505/img/product/1/<?php echo $p->IMG2?>' "> <img id="xx"
                                src='<?php echo Yii::app()->baseUrl?>/images/best/37x54/img/product/1/<?php echo $p->IMG2?>' alt="" />
                            </a>
                            </span>
                            			<?php 
                            }
                            
                            if ($p->IMG3!=null) {
                            	?>
                                          			<span class="span2 blight2"> <a href='<?php echo Yii::app()->baseUrl?>/images/best/1400x2021/img/product/1/<?php echo $p->IMG3?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/images/best/350x505/img/product/1/<?php echo $p->IMG3?>' "> <img id="xx"
                                              src='<?php echo Yii::app()->baseUrl?>/images/best/37x54/img/product/1/<?php echo $p->IMG3?>' alt="" />
                                          </a>
                                          </span>
                                          			<?php 
                                          }
                                          
                                          if ($p->IMG4!=null) {
                                          	?>
                                                        			<span class="span2 blight2"> <a href='<?php echo Yii::app()->baseUrl?>/images/best/1400x2021/img/product/1/<?php echo $p->IMG4?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/images/best/350x505/img/product/1/<?php echo $p->IMG4?>' "> <img id="xx"
                                                            src='<?php echo Yii::app()->baseUrl?>/images/best/37x54/img/product/1/<?php echo $p->IMG4?>' alt="" />
                                                        </a>
                                                        </span>
                                                        			<?php 
                                                        }
                                                        if ($p->IMG5!=null) {
                                                        	?>
                                                                      			<span class="span2 blight2"> <a href='<?php echo Yii::app()->baseUrl?>/images/best/1400x2021/img/product/1/<?php echo $p->IMG5?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/images/best/350x505/img/product/1/<?php echo $p->IMG5?>' "> <img id="xx"
                                                                          src='<?php echo Yii::app()->baseUrl?>/images/best/37x54/img/product/1/<?php echo $p->IMG5?>' alt="" />
                                                                      </a>
                                                                      </span>
                                                                      			<?php 
                                                                      }
                                                                      
              
//               	$imgs=$product->getOtherImage();
//               	//print_r($imgs); return ;
//               	if ($imgs!=null) {
//               		foreach ($imgs as $v) {
              			?>

              			<?php 
//               		}
//               	}
              	
              ?>
               
              
            </div>
          </div>
        </div>
        
        
        
        
        
        
        <div class="span5 desc">
        <div class="span12">Brand</div>
        <div class="span12">
        <?php echo $p->DESCRIPTION?>
        </div>
        
        <div class="span12 mt10">
        <span class="prc">Rp.  <?php echo number_format($p->HARGA,2);?></span>
        </div>
        
        
        <?php echo CHtml::form(array('site/product','id'=>$p->ID))?>
        <div class="span12 mt10">
        CHOOSE YOUR SIZE : 
        <?php 
//         $this->widget('bootstrap.widgets.TbButtonGroup', array(
//         		//'type' => 'primary',
//         		'toggle' => 'radio',
// 				//'name' => 'Beli[size]',
// 				'buttonType' => 'radio',
//         		'buttons' => array(
//         				array('label'=>'38'),
//         				array('label'=>'39'),
//         				array('label'=>'40'),
// 						array('label'=>'41'),
// 						array('label'=>'42'),
// 						array('label'=>'42'),
//         		),
//         ));
        ?>
        
<?php $radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
    'name'=>'btnradio',
    'buttonType'=>'buttonset'
)); ?>

<?php 
$st1=Stock::model()->with('s')->findAllByAttributes(array('P'=>$p->ID));
foreach ($st1 as $v) {
	if ($v->JUMLAH<=0) {
		echo '<input type="radio" id="Size'.$v->ID.'" name="size" disabled="disabled" value="'.$v->ID.'" /><label for="Size'.$v->ID.'">'.$v->s->NAMA.'</label>';
	}else {
		echo '<input type="radio" id="Size'.$v->ID.'" name="size"  value="'.$v->ID.'"/><label for="Size'.$v->ID.'">'.$v->s->NAMA.'</label>';
}	
}
// for ($i = 38; $i < 45; $i++) {
// 	echo '<input type="radio" id="Size'.$i.'" name="size" /><label for="Size'.$i.'">'.$i.'</label>';
// }
?>





<?php $this->endWidget();?>
        


        </div>
        
        
        <div class="span12 mt10">
        <button class="btn btn-large" type="submit" name="yt0">Buy Now</button>
        </div>
        </form>
        
        </div>
        <div class="span3">
        
        <div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle collapsed" data-toggle="collapse"
							data-parent="#accordion2" href="#collapse1">Our Services</a>
					</div>
					<div id="collapse1" class="accordion-body collapse in">
						<div class="accordion-inner">
						
<ul>
        <li>FREE DELIVERY AVAILABLE</li>
        <li>CASH ON DELIVERY</li>
        <li>30 DAYS FREE RETURN</li>
        <li>CALL US +65 6742 4500</li>
</ul>

						</div>
					</div>
				</div>


			</div>
        
        </div>


</div>

</div>

</div>



<div class="container-fluid content">
<div class="row-fluid">
<div class="span12">
<ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
              <li><a href="#profile" data-toggle="tab">Profile</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#dropdown1" data-toggle="tab">@fat</a></li>
                  <li><a href="#dropdown2" data-toggle="tab">@mdo</a></li>
                </ul>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="home">
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
              </div>
              <div class="tab-pane fade" id="profile">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
              </div>
              <div class="tab-pane fade" id="dropdown1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
              </div>
              <div class="tab-pane fade" id="dropdown2">
                <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
              </div>
            </div>
</div>

</div>

</div>

            






<?php

$this->widget ( 'ext.cloudzoom.CloudZoom' );
?>

<?php
Yii::app ()->getClientScript ()->registerScript ( 'xx', '$(\'[id="xx"]\').click(function() { $(\'[id="xx"]\').parent().parent().removeClass("blight"); $(this).parent().parent().addClass("blight");});', CClientScript::POS_END );
?>