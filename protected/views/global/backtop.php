<div id="back-top" style="display: block;"><a href="#header"><span></span></a></div>
<?php 
Yii::app ()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/backtop.css');
Yii::app ()->clientScript ->registerScript('backtop',
"$(\"#back-top\").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});;"
,CClientScript::POS_END);


?>