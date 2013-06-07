<?php 
if ($id!=0) {
	$t1=Menu::model()->with('ty')->findByPk($id);
	$this->breadcrumbs=array(
			'All Product',
			$t1->ty->NAMA,
	);
}else{
	$this->breadcrumbs=array(
			'New Arrivals',
	);
}

?>


<div class="container-fluid content">
<div class="row-fluid">
<div class="span12">
<?php echo H::sidebar($tids,$s);?>

<div class="span9">

<div class="span12">
<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
	
<?php 
if (isset($t1)) {
	echo '<h3>'.$t1->ty->NAMA.'</h3>';
}else{
	echo '<h3>Product New Arrivals</h3>';
}
?>	

    
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_all',
		'template'=>'<div class="span12">{summary}</div><div class="span12">{items}</div><div class="span12">{pager}</div>',
)); ?>  
    
    
    </div>

</div>			

		</div>

</div>

</div>



