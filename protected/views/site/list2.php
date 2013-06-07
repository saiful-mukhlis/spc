
<style>
<!--
.blight2 {background:#fff; border:1px solid #fff;  margin-bottom:10px;
  -webkit-box-shadow:0 0 10px rgba(0,0,0,0.2); -moz-box-shadow:0 0 10px rgba(0,0,0,0.2); box-shadow:0 0 10px rgba(0,0,0,0.2);
  -webkit-border-radius:6px; -moz-border-radius:6px; border-radius:6px;
height: 55px;

transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	-webkit-transition: all 0.2s ease-in-out;
}
.blight2 img:hover {
opacity:0.4;
transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	-webkit-transition: all 0.2s ease-in-out;
}
.blight2 img:active {
opacity:1;
}
.blight { border:1px solid #bbb; }
.blightp {background:#fff; border:1px solid #bbb;  margin-bottom:10px;
  -webkit-box-shadow:0 0 10px rgba(0,0,0,0.2); -moz-box-shadow:0 0 10px rgba(0,0,0,0.2); box-shadow:0 0 10px rgba(0,0,0,0.2);
  -webkit-border-radius:6px; -moz-border-radius:6px; border-radius:6px;
height: 55px;
}
.pprice{
	width: 208px;
	height: 580px;
	float: right;
	text-align: center;
}
.noteall{
	text-align: left;
	margin-left: 50px;
}
.dprice{
	font-size:36px;
font-style: normal;
font-family: 'Georgia', serif;
font-weight: bold;
display: block;
margin-bottom: 17px;
margin-top:20px;
color: red;

}


.row-fluid .span12 .mimg{
height: 505px;
}


.row-fluid .s1 {
width: 50px;
height: 50px;
}

.center {
    text-align: center;
}

.diskon {
display: block;
color: red;
font-style: italic;
font-family: 'Georgia', serif;
font-size: 15px;
font-weight: bold;
}
.hfirst {
    display: block;
color: #777;
text-decoration: line-through;
font-family: 'Georgia', serif;
font-size: 17px;
}
.pprice h2{
	font-size: 24px;
}
.note {
color: #777;
font-family: 'Georgia', serif;
font-size: 17px;
}


.hfirstd {
color: #777;
text-decoration: line-through;
font-family: 'Georgia', serif;
}
.dpriced{
font-style: normal;
font-family: 'Georgia', serif;
font-weight: bold;
margin-bottom: 17px;
margin-top:20px;
color: red;

}
.fdtail{
	text-align: center;
	border: 1px solid #fff;
	transition: all 1s ease-in-out;
	-moz-transition: all 1s ease-in-out;
	-o-transition: all 1s ease-in-out;
	-webkit-transition: all 1s ease-in-out;
}
.fdtail:hover{
	border: 1px solid black;
	transition: all 1s ease-in-out;
	-moz-transition: all 1s ease-in-out;
	-o-transition: all 1s ease-in-out;
	-webkit-transition: all 1s ease-in-out;
}
.fdtail:active{
	opacity:0.8;
	border: 1px solid #08C;
	transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	-webkit-transition: all 0.2s ease-in-out;
}

.fdtail h4{
	color: #08C;
}

.d8 .span12 h3{
    margin-left: 13px;
    border-bottom: 1px solid #BFBFBF;
}
.d2{
	margin-top: 10px;
	margin-bottom: 10px;
	text-align: center;
}
.sm ul, .sm ul li{
	list-style: none;
	font-size: 90%;
	line-height: 23px;
}
.small{
	border-top: 2px solid #08C;
}
.small h5{
	text-shadow: 0.01em 0.08em gray;
	text-transform: uppercase;
}

.accordion-inner ul li{
	list-style-type: none;
}

@media (min-width: 1200px) {
.row-fluid .d8{
	width:69.5%;
}
.span12 .ml20{
	margin-left: 13px;
}

}
@media (min-width: 979px) and (max-width: 1200px) {
.row-fluid .d8{
	width:67.9%;
}
.span12 .ml20{
	margin-left: 8px;
}

}
@media (min-width: 768px) and (max-width: 979px) {
.row-fluid .d8{
	width:67.8%;
}
.span12 .ml20{
	margin-left: 5px;
}

}

@media (max-width: 768px) {
.row-fluid .d8{
	width:100%;
}
.span12 .ml20{
	margin-left: 0px;
}

}
-->
</style>
    
    <?php echo H::navSimple()?>

    <?php echo H::hero()?>

     <div class="container-fluid">
    <?php Yii::beginProfile('nav1');?>
    <?php $this->widget('ext.bmb.widgets.BmbNav')?>
    <?php Yii::endProfile('nav1');?>
    
    
    

<?php 
$ukuran=Ukuran::model()->findAll(array('order'=>'short'));
$warna=Warna::model()->findAll(array('order'=>'nama'));
$bahan=Bahan::model()->findAll(array('order'=>'nama'));
?>
    

    
      <div class="row-fluid">
        
        <?php $this->widget('ext.bmb.widgets.BmbSidebar')?>
        
        
        
        <div class="span8 d8">
        
        
         <div class="span12">
    <h3>Promo 1</h3>
    <div class="span4 fdtail ml20">
    <div class="span12 d2">
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
        </a>
        <h4>Baju selam super dry</h4>
        <span class="hfirstd">Rp 100.000</span>
    	<span class="dpriced">Rp 50.000</span>
    	<a class="btn btn-mini btn-primary" >Beli</a>
        
        </div>
    </div>
   <div class="span4 fdtail  ml20">
    <div class="span12 d2">
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
        </a>
        <h4>Baju selam super dry</h4>
        <span class="hfirstd">Rp 100.000</span>
    	<span class="dpriced">Rp 50.000</span>
    	<a class="btn btn-mini btn-primary" >Beli</a>
        
        </div>
    </div>
    <div class="span4 fdtail  ml20">
    <div class="span12 d2">
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
        </a>
        <h4>Baju selam super dry</h4>
        <span class="hfirstd">Rp 100.000</span>
    	<span class="dpriced">Rp 50.000</span>
    	<a class="btn btn-mini btn-primary" >Beli</a>
        
        </div>
    </div>
    <div class="span4 fdtail ml20">
    <div class="span12 d2">
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
        </a>
        <h4>Baju selam super dry</h4>
        <span class="hfirstd">Rp 100.000</span>
    	<span class="dpriced">Rp 50.000</span>
    	<a class="btn btn-mini btn-primary" >Beli</a>
        
        </div>
    </div>
    </div>
    
    <div class="span12">
    <h3>Promo 1</h3>
    <div class="span4 fdtail">
    <div class="span12 d2">
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
        </a>
        <h4>Baju selam super dry</h4>
        <span class="hfirstd">Rp 100.000</span>
    	<span class="dpriced">Rp 50.000</span>
    	<a class="btn btn-mini btn-primary" >Beli</a>
        
        </div>
    </div>
   <div class="span4 fdtail">
    <div class="span12 d2">
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
        </a>
        <h4>Baju selam super dry</h4>
        <span class="hfirstd">Rp 100.000</span>
    	<span class="dpriced">Rp 50.000</span>
    	<a class="btn btn-mini btn-primary" >Beli</a>
        
        </div>
    </div>
    <div class="span4 fdtail">
    <div class="span12 d2">
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
        </a>
        <h4>Baju selam super dry</h4>
        <span class="hfirstd">Rp 100.000</span>
    	<span class="dpriced">Rp 50.000</span>
    	<a class="btn btn-mini btn-primary" >Beli</a>
        
        </div>
    </div>
    <div class="span4 fdtail">
    <div class="span12 d2">
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' title='Thumbnail 1'>
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/p/d/a.jpg' alt="Thumbnail 1"/>
        </a>
        <h4>Baju selam super dry</h4>
        <span class="hfirstd">Rp 100.000</span>
    	<span class="dpriced">Rp 50.000</span>
    	<a class="btn btn-mini btn-primary" >Beli</a>
        
        </div>
    </div>
    </div>
        
        </div>
        
        
       
       <div class="span2">
       
    <?php 
    for ($i = 0; $i < 3; $i++) {
    	?>
    	
    	<div class="span12 well">
    	<strong>Jujur!!!</strong>
    <?php echo CHtml::image(Yii::app()->baseUrl.'/img/benner/jujur.jpg')?> 
    
    </div>
    	<?php 
    }
    
    ?>
    
    
       
       </div>
          
          
          
          
          <div class="span12 small">
        <div class="span2">
        <h5>Tejhgdfhg sahgd</h5>
        <div class="sm">
        <ul>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        </ul>
        
        </div>
        </div>
        
        <div class="span2">
        <h5>Tejhgdfhg sahgd</h5>
        <div class="sm">
        <ul>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        </ul>
        
        </div>
        </div>
        
        <div class="span2">
        <h5>Tejhgdfhg sahgd</h5>
        <div class="sm">
        <ul>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        </ul>
        
        </div>
        </div>
        
        
        <div class="span2">
        <h5>Tejhgdfhg sahgd</h5>
        <div class="sm">
        <ul>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        </ul>
        
        </div>
        </div>
        
        <div class="span2">
        <h5>Tejhgdfhg sahgd</h5>
        <div class="sm">
        <ul>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        </ul>
        
        </div>
        </div>
        
        <div class="span2">
        <h5>Tejhgdfhg sahgd</h5>
        <div class="sm">
        <ul>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        <li><a>Aasdfdsf asdfasdf</a></li>
        </ul>
        
        </div>
        </div>
        
        </div>
          
          
          
          
        </div><!--/span12-->
        
        
        

      </div><!--/row-->

      <hr>




<div id="footer">
	<div class="container">
		<p class="muted credit">
			&copy; 2012 <span title="genmoodbreakers.com">GenMoodBreakersxx</span>
			Inc. All rights reserved.
		</p>
	</div>
</div>


     <?php      
          
          $this->widget(
    'ext.cloudzoom.CloudZoom',
    array()
);
?>

<?php 
Yii::app()->getClientScript()->registerScript(
		'xx',
		'$(\'[id="xx"]\').click(function() { $(\'[id="xx"]\').parent().parent().removeClass("blight"); $(this).parent().parent().addClass("blight");});',
		CClientScript::POS_END
);
?>

