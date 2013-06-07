	<div class="span2b fl mt10">
    <div class="span12">
    <a href="<?php echo Yii::app()->baseUrl?>/site/product/<?php echo $data->ID;?>" title="<?php echo CHtml::encode($data->NAMA)?>">
            <img src="<?php echo Yii::app()->baseUrl?>/images/best/180x260/img/product/1/<?php echo $data->IMG?>" alt="<?php echo CHtml::encode($data->NAMA)?>">
        </a>
        <h4>No Brand</h4>
        <h5><?php echo CHtml::encode($data->NAMA)?></h5>
        <span class="hfirstd">Rp <?php echo number_format($data->HARGA,2)?></span>
    	
    	
        
        </div>
    </div>