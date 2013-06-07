<!doctype html>
<?php
echo H::ie();
echo CHtml::openTag('head');
$this->renderDynamic('H::meta',$this->title, $this->description, $this->keywords);
H::css();
echo H::ico();
echo "<link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>";
echo CHtml::closeTag('head');
echo CHtml::openTag('body');
$this->widget('ext.bmb.widgets.BmbUpgradeBrowser');
echo H::header();


echo '<div class="logo" style="margin-bottom:50px;margin-left:10px;width:200px;float:left;">'.CHtml::image(Yii::app()->baseUrl.'/img/logo-darul-ilmi-160.jpg').'</div>';
echo '<div class="span6"><h1  style="color:#7fc61a;font-weight: bold;font-family: sans-serif;font-size: 40px;margin-bottom:0px;margin-top:30px;">DARUL ILMI</h1><br/>
		<h2  style="color:#0081c2;font-family: sans-serif;font-size: 27px;margin-bottom:0px;margin-top:-28px;">Education For Better Life</h2></div>';

echo '<div class=""  style="margin-top:60px;">
		<form method="get" id="omc-main-search" action="#">
			<fieldset>
				<label class="hidden" for="s"></label>
				<input type="text" class="search_input_sidebar span4" value="Search..." onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;" name="s" id="s">
				<input type="submit" class="search_button_sidebar" id="searchsubmit" value="Go →">
			</fieldset>
		</form>
		
</div>';

//echo H::nav();

echo $content;
echo H::footer();
//echo $this->renderPartial('/global/header');
echo CHtml::closeTag('body');
?>
</html>
