
<style>
<!--
.blight {background:#fff; border:1px solid #bbb;  margin-bottom:10px;
  -webkit-box-shadow:0 0 10px rgba(0,0,0,0.2); -moz-box-shadow:0 0 10px rgba(0,0,0,0.2); box-shadow:0 0 10px rgba(0,0,0,0.2);
  -webkit-border-radius:6px; -moz-border-radius:6px; border-radius:6px;}
.pprice{
	width: 208px;
	height: 300px;
	float: right;
}
.dprice{
	color: #8A9C10;
font-size: 35px;
font-style: normal;
font-family: 'Georgia', serif;
font-weight: bold;
display: block;
margin-bottom: 17px;
margin-top:20px;
text-align: center;
}
-->
</style>
    
    <?php echo H::navSimple()?>

    <?php echo H::hero()?>

     <div class="container-fluid">
    <?php Yii::beginProfile('nav1');?>
    <?php $this->widget('ext.bmb.widgets.BmbNav')?>
    <?php Yii::endProfile('nav1');?>
    
    
    


    

    
      <div class="row-fluid">
        
        
        
        <div class="span12">
        
        
        <div class="span4">
 
   
 
    <a href='<?php echo Yii::app()->baseUrl?>/img/product/a.jpg' class='cloud-zoom' id='zoom1'
       rel="smoothMove:5"  >
        <img src='<?php echo Yii::app()->baseUrl?>/img/product/am.jpg' alt='' align="left"
             title="XXXXXxxx"/>
    </a>
    
    </div>
    
    
    <div class="blight pprice span6">
    	<span class="dprice">Harga : 50.000</span>
    </div>
    
    
 
    <div class="span4">
        <p>and here is some text</p>
 
        <!--
        You can optionally create a gallery by creating anchors with a class of 'cloud-zoom-gallery'.
        The anchor's href should point to the big zoom image.
        In the rel attribute you must specify the id of the zoom to use (useZoom: 'zoom1'),
        and also the small image to use (smallImage: /images/....)
        -->
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/a.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/am.jpg' ">
            <img id="xx" src='<?php echo Yii::app()->baseUrl?>/img/product/as.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/b.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/bm.jpg' ">
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/bs.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/c.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/cm.jpg' ">
            <img id="xx" src='<?php echo Yii::app()->baseUrl?>/img/product/cs.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/d.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/dm.jpg' ">
            <img id="xx" src='<?php echo Yii::app()->baseUrl?>/img/product/ds.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/e.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/em.jpg' ">
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/es.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/f.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom1', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/fm.jpg' ">
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/fs.jpg' alt="Thumbnail 1"/>
        </a>
 
        
 
    </div>
    
    
 

        
        
     <?php      
          
          $this->widget(
    'ext.cloudzoom.CloudZoom',
    array()
);
?>
 


          
          
          
          
          
        </div><!--/span-->
      </div><!--/row-->

      <hr>


      
<!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    
    
    
    
     <a href='<?php echo Yii::app()->baseUrl?>/img/product/a.jpg' class='cloud-zoom' id='zoom2'
       rel="smoothMove:5, position:'inside'"  >
        <img src='' alt='' align="left"
             title="XXXXXxxx"/>
    </a>
    
    
        <p>and here is some text</p>
 
        <!--
        You can optionally create a gallery by creating anchors with a class of 'cloud-zoom-gallery'.
        The anchor's href should point to the big zoom image.
        In the rel attribute you must specify the id of the zoom to use (useZoom: 'zoom2'),
        and also the small image to use (smallImage: /images/....)
        -->
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/a.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom2', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/am.jpg' ">
            <img id="xx" src='<?php echo Yii::app()->baseUrl?>/img/product/as.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/b.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom2', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/bm.jpg' ">
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/bs.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/c.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom2', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/cm.jpg' ">
            <img id="xx" src='<?php echo Yii::app()->baseUrl?>/img/product/cs.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/d.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom2', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/dm.jpg' ">
            <img id="xx" src='<?php echo Yii::app()->baseUrl?>/img/product/ds.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/e.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom2', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/em.jpg' ">
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/es.jpg' alt="Thumbnail 1"/>
        </a>
        
        <a href='<?php echo Yii::app()->baseUrl?>/img/product/f.jpg' class='cloud-zoom-gallery'
           title='Thumbnail 1'
           rel="useZoom: 'zoom2', smallImage: '<?php echo Yii::app()->baseUrl?>/img/product/fm.jpg' ">
            <img src='<?php echo Yii::app()->baseUrl?>/img/product/fs.jpg' alt="Thumbnail 1"/>
        </a>
 
        
 
    
    
  </div>
  <div class="modal-footer">
    <button class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>



<div id="footer">
	<div class="container">
		<p class="muted credit">
			&copy; 2012 <span title="genmoodbreakers.com">GenMoodBreakersxx</span>
			Inc. All rights reserved.
		</p>
	</div>
</div>


<?php 
Yii::app()->getClientScript()->registerScript(
		'xx',
		'$(\'[id="xx"]\').click(function() { $(\'[id="xx"]\').removeClass("blight"); $(this).addClass("blight");});',
		CClientScript::POS_END
);
?>

