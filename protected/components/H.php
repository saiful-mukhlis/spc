<?php
class H
{
	public static function sitemap() {
	}
	public static function navx() {

		$nav=Yii::app()->cache->get('nav');
		if($nav===false){
			$out= CHtml::openTag('div', array('class'=>'navbar navbar-inverse navp')).
			CHtml::openTag('div', array('class'=>'navbar-inner')).
			CHtml::openTag('div', array('class'=>'container')).

			'<a class="btn btn-navbar" data-toggle="collapse"	data-target=".nav-collapse"> <span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></a>'.

			CHtml::openTag('div', array('class'=>'nav-collapse collapse')).

			'<ul class="nav">';

			$nav1s=Nav::model()->findAll(array('order'=>'sort'));
			foreach ($nav1s as $v) {
				$nav2s=Navc::model()->findAllByAttributes(array('navid'=>$v->id),array('order'=>'sort'));
				if ($nav2s==null) {
					$out.= '<li><a href="'.Yii::app()->baseUrl.'/'.rawurlencode($v->url).'">'.CHtml::encode($v->name).'</a></li>';
				}else{

					$out.= '<li class="dropdown"><a href="'.Yii::app()->baseUrl.'/'.rawurlencode($v->url).'" class="dropdown-toggle"	data-toggle="dropdown">'.CHtml::encode($v->name).'<b class="caret"></b></a>';
					$count = count($nav2s);
					$lebar=ceil($count/$count);
					if ($lebar>1){
						$out.= '<ul class="dropdown-menu row-fluid"  style="min-width: '.(165*$lebar).'px;">';
					}else{
						$out.= '<ul class="dropdown-menu">';
					}
						
					if ($lebar>1){
						$i=0;
						foreach ($nav2s as $v2) {
							if ($i==0){
								$out.= '<div class="span4" style="min-width: 160px;">';
							}
							$out.= '<li><a href="'.Yii::app()->baseUrl.'/'.$v2->url.'">'.$v2->name.'</a></li>';
							if ($i==($count-1)) {
								$out.= '</div>';
							}
							$i++;
							if ($i==$count) {
								$i=0;
							}
						}
						if ($i!=0) {
							$out.= '</div>';
						}
					}else{
						foreach ($nav2s as $v2) {
							$out.=  '<li><a href="'.Yii::app()->baseUrl.'/'.$v2->url.'">'.$v2->name.'</a></li>';
						}
					}
						
					$out.= '</ul>';

				}
			}

			$out.= '</ul>';


			$out.= '<p class="navbar-text pull-right"> <a href="#" class="navbar-link">Shipment</a> </p>'.
					'<p class="navbar-text pull-right"> <a href="#" class="navbar-link">Pay</a> </p>'.
					'<p class="navbar-text pull-right"> <a href="#" class="navbar-link">Order</a> </p>'.
					'</div></div></div></div>';
			Yii::app()->cache->set('nav', $out, 86400, new CDbCacheDependency('SELECT dep FROM cache where id=2'));
			return $out;
		}

		return $nav;


	}
	public static function meta($title,$description,$keywords) {
		return '<meta charset="utf-8">'.
				'<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.
				'<title>'.$title.'</title>'.
				'<meta name="description" content="'.$description.'">'.
				'<meta name="keywords" content="'.$keywords.'">'.
				'<meta name="language" content="id" />'.
				'<meta name="generator" content="WordPress 2.9.1"/>'.
				'<meta name="author" content="beembe"/>'.
				'<meta name="robots" content="index, follow"/>'.
				'<meta content="1 days" name="revisit-after"/>';
	}
	public static function link() {
		return CHtml::link(Yii::app()->baseUrl);
	}
	public static function ico($urlIco='favicon.ico') {
		return '<link rel="shortcut icon"	href="'.Yii::app()->request->baseUrl.'/'.$urlIco.'"	type="image/x-icon" />';
	}
	public static function ie() {
		return '<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->'.
				'<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->'.
				'<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->'.
				'<!--[if gt IE 8]><!--> <html class="no-js" lang="id"> <!--<![endif]-->';
	}
	public static function css()
	{
		$cs=Yii::app()->getClientScript();
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/bootstrap/css/bootstrap.min.css');
		$cs->registerMetaTag('width=device-width, initial-scale=1.0', 'viewport');
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/bootstrap/css/bootstrap-responsive.min.css');
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/bootstrap/css/bootstrap-yii.css');
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/bootstrap/css/bootstrap-yii.css');
		$cs->scriptMap['jquery-ui.css'] = Yii::app()->baseUrl . '/css/bootstrap/css/jquery-ui-bootstrapx.css';
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/bootstrap/css/jquery-ui-bootstrap.css');
		
		
		$cs->scriptMap=array(
				//'jquery.js'=>false,
				'jquery-ui.min.js'=>false,
				'jquery-ui.css'=>false,
		);

		$cs->registerCssFile(Yii::app()->baseUrl.'/css/q-responsive.css');
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/style.css');
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/slider.css');
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/flat-ui.css');

		//$cs->registerScriptFile(Yii::app()->baseUrl . '/js/libs/jquery-1.7.1.min.js', CClientScript::POS_BEGIN);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/bootstrap.bootbox.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/bootstrap.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/jqueryui.min.js', CClientScript::POS_END);
		//$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/', CClientScript::POS_END);
		
		$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/jqueryui.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/jqueryui.min.js', CClientScript::POS_END);

		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.eislideshow.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.easing.1.3.js', CClientScript::POS_END);
	}
	
	public	static function sidebar2($tids=array(),$s='',$id=2,$lv=3)
	{
		$tmp=array();
		//$tmp2=array();
		$o='';
		$m1=Menu::model()->with('ty')->findAllByAttributes(array('P'=>$id));
		foreach ($m1 as $v) {
			$m2=Menu::model()->findAllByAttributes(array('P'=>$v->ID));
			$o.='<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle collapsed" data-toggle="collapse"
							data-parent="#accordion2" href="#collapse'.$v->ID.'">'.$v->ty->NAMA.'</a>
					</div>
					<div id="collapse'.$v->ID.'" class="accordion-body in collapse"
						style="height: auto;">
						<div class="accordion-inner">
							<ul>';
			foreach ($m2 as $v2) {
				$m3=Menu::model()->with('ty')->findAllByAttributes(array('P'=>$v2->ID));
				foreach ($m3 as $v3) {
					if (!array_search($v3->ty->ID, $tmp)) {
						if (array_search($v3->ID, $tids)) {
							if ($s==='') {
								$o.='<li><i class="icon-check"></i> '.CHtml::link($v3->ty->NAMA,Yii::app()->baseUrl).'</li>';
							}else{
								$o.='<li><i class="icon-check"></i> '.CHtml::link($v3->ty->NAMA,array('site/allm','id'=>$v3->ID,'s'=>$s)).'</li>';
							}
							
						}else{
							if ($s==='') {
								$o.='<li><i class="icon-minus"></i> '.CHtml::link($v3->ty->NAMA,array('site/allp','id'=>$v3->ID,'s'=>$s)).'</li>';
							}else{
								$o.='<li><i class="icon-minus"></i> '.CHtml::link($v3->ty->NAMA,array('site/allp','id'=>$v3->ID,'s'=>$s)).'</li>';
							}
						}
						
						$tmp[]=$v3->ty->ID;
						//$tmp2[]=$v3->ID;
					}
					
				}
			}
			$o.='</ul></div></div></div>';
		}
		return $o;
	}

	public	static function sidebar($tids=array(),$s='')
	{
		return '<div class="span3">
<div class="accordion" id="accordion2">
				'.self::sidebar2($tids,$s).'
			</div>
</div>';
	}

	public static function corousel(){
		return ' <!-- Carousel
    ================================================== -->
    <div class="bs-docs-example">
              <div id="myCarousel" class="carousel slide" data-interval="5000">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
				  <li data-target="#myCarousel" data-slide-to="3"></li>
				  <li data-target="#myCarousel" data-slide-to="4"></li>
				
                </ol>
                <div class="carousel-inner">
				<div class="item active">
                    '.CHtml::image(Yii::app()->baseUrl.'/img/benner5.jpg').'
                    
                  </div>
                  <div class="item">
                   '.CHtml::image(Yii::app()->baseUrl.'/img/benner1.png').'
                    
                  </div>
                  <div class="item">
                    '.CHtml::image(Yii::app()->baseUrl.'/img/benner2.jpg').'
                    
                  </div>
                  <div class="item">
                    '.CHtml::image(Yii::app()->baseUrl.'/img/benner3.jpg').'
                    
                  </div>
				<div class="item">
                    '.CHtml::image(Yii::app()->baseUrl.'/img/benner4.jpg').'
                    
                  </div>
				
				
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
              </div>
            </div><!-- /.carousel -->';
	} 

	public static function imageLink($srcImg,$text='', $alt='', $url='#')
	{
		return CHtml::link(CHtml::image(Yii::app()->baseUrl . $srcImg, $alt).$text, $url);
	}

	public static function nav($navs=array()){
		$out1='';
		
		$t1=Menu::model()->with('t0')->findAllByAttributes(array('p'=>1));
		
		foreach ($t1 as $v) {
			$t2=Menu::model()->with('t0')->findAllByAttributes(array('p'=>$v->id));
			
			if (count($t2)==0) {
				$out1.='<li>'.CHtml::link($v->t0->nama, Yii::app()->baseUrl).'</li>';
			}else{
				$out1.='';
				$out1.='<li class="dropdown">';
				$out1.='<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$v->t0->nama.' <b class="caret"></b></a>';
				$out1.='<ul class="dropdown-menu">';
				//$out1.='<div class="row">';
				//$out1.='<div class="span7b">';
					
					
				foreach ($t2 as $v2) {
					//$out1.='<div class="span2">';
					$out1.='<li>'.CHtml::link($v2->t0->nama, Yii::app()->baseUrl).'</li>';
					$t3=Menu::model()->with('t0')->findAllByAttributes(array('p'=>$v2->id));
					foreach ($t3 as $v3) {
						//$out1.='<li>'.CHtml::link($v3->t0->NAMA, Yii::app()->baseUrl).'</li>';
						$out1.='<li>'.CHtml::link($v3->t0->NAMA, array('site/all','id'=>$v3->id)).'</li>';
						$t4=Menu::model()->with('t0')->findAllByAttributes(array('P'=>$v3->id));
						foreach ($t4 as $v4) {
							$out1.='<li>'.CHtml::link($v4->t0->nama, array('site/all','id'=>$v4->id)).'</li>';
						}
							
					}
				
					// 				$out1.='';
					// 				$out1.='';
					// 				$out1.='';
					// 				$out1.='';
					//$out1.='</div>';
				}
				//$out1.='</div>';
				//$out1.='</div>';
				$out1.='</ul>';
				$out1.='</li>';
			}
			

			
			
			

		}
		
		//<a class="brand" href="'.Yii::app()->baseUrl.'">Darul Ilmi School</a>
		return  '<div class="navbar mt-nav">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  
                  <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav">
                      <li>'.CHtml::link('Home', Yii::app()->baseUrl).'</li>
                      
                      '.$out1.'
                      
                      
                      
                    </ul>
                    
                    <ul class="nav pull-right">
                      <li>'.CHtml::link('Contact Us',array('site/contact')).'</li>
                      <li>'.CHtml::link('Pendaftaran',array('site/registration')).'</li>
                      <li>'.CHtml::link('Akademik',Yii::app()->baseUrl).'</li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div><!-- /navbar -->';
	}
	public static function header(){
		return '<div class="container-fluid mt-top">
	<div class="row-fluid">
		<div class="span12 navtop">
			<div class="span2"></div>
			<div class="span7">

			</div>

			<div class="span2 pull-right">
				'.CHtml::link('Cart',array('site/keranjang-belanja')).'  '.((Yii::app()->user->isGuest)?CHtml::link('Login', array('site/login')):CHtml::link(ucwords(Yii::app()->user->nama),array('usr/admin')).' <i class="icon-user"></i> '.CHtml::link('Logout', array('site/logout'))).'
			</div>

		</div>
	</div>
</div>';
	}
    public static function footer(){
    	return '<div id="footer" class="navbar-static-bottom">
    <div class="container">
        <p class="muted credit">
            &copy; 2013 <span title="www.beembe.com">www.beembe.com</span>
            Inc. All rights reserved.
        </p>
    </div>
</div>';
    }

	public static function navDown($navs=array()){
		
// 		$t1=TypeType::model()->findAllByAttributes(array('T1'=>1));
		
// 		$span=0;
// 		$out='<div class="nav-down">';
// 		foreach ($navs as $v) {
			
// 			if ($v->PARENT==1) {
				
// 				foreach ($navs as $v2) {
// 					if ($span==0) {
// 						$out.='<div class="container-fluid nav-down-child"><div class="row-fluid">';
// 						$out.='<div class="span12">';
// 						$span++;
// 					}
// 					if ($v2->PARENT==$v->ID) {
// 						$out.='<div class="span2">';
// 						$out.='<li class="nav-header"><a href="#">'.CHtml::encode($v2->NAMA).'</a></li>';
// 						foreach ($navs as $v3) {
// 							if ($v3->PARENT==$v2->ID) {
// 								$out.='<li><a href="#">'.CHtml::encode($v3->NAMA).'</a></li>';
// 							}
// 						}
// 						$out.='</div>';
// 						$span++;
// 					}
					
// 					if ($span>6) {
// 						$span=0;
// 						$out.='</div>';
						
// 						$out.='</div>';
// 						$out.='</div>';
						
// 					}
// 				}
				
				
				
// 			}
			
			
			
			
// 		}
// 		if ($span!=0) {
// 			$span=0;
// 			$out.='</div>';
			
// 			$out.='</div>';
// 			$out.='</div>';
// 		}
		
// 		$out.='</div>';
		return '';//$out;//'<div class="nav-down">

// <div class="container-fluid nav-down-child">
// <div class="row-fluid">

// <div class="span12">

// <div class="span2">
//                         <li class="nav-header"><a href="#">MEN\'S SHOES</a></li>
//                           <li><a href="#">Sneakers</a></li>
//                           <li><a href="#">Lace Ups</a></li>
//                           <li><a href="#">Slip Ons</a></li>
//                           <li><a href="#">Formal & Business Shoes</a></li>
//                           <li><a href="#">Boat Shoes</a></li>
//                           <li><a href="#">Sandals & Flip Flops</a></li>
//                           <li><a href="#">Boots</a></li>
//                           <li><a href="#">Comfort</a></li>
//                           <li><a href="#">Sport Shoes</a></li>
//                         </div>
                        
// <div class="span2">
//                         <li class="nav-header"><a href="#">MEN\'S CLOTHING</a></li>
//                           <li><a href="#">T-Shirts</a></li>
//                           <li><a href="#">Shirts</a></li>
//                           <li><a href="#">Pants</a></li>
//                           <li><a href="#">Polo Shirts</a></li>
//                           <li><a href="#">Jumpers & Cardigans</a></li>
//                           <li><a href="#">Shorts</a></li>
//                           <li><a href="#">Jeans</a></li>
//                           <li><a href="#">Jackets & Coats</a></li>
//                           <li><a href="#">Blazers</a></li>
//                         </div>                        

// <div class="span2">
//                         <li class="nav-header"><a href="#">Men\'s Accessories</a></li>
//                           <li><a href="#">Belts</a></li>
//                           <li><a href="#">Watches</a></li>
//                           <li><a href="#">Wallets</a></li>
//                           <li><a href="#">Technology</a></li>
//                           <li><a href="#">Ties & Formal</a></li>
//                           <li><a href="#">Jewellery</a></li>
//                           <li><a href="#">Sunglasses</a></li>
//                           <li><a href="#">Hats & Caps</a></li>
//                           <li><a href="#">Stationery</a></li>
//                         </div>
                        
                                      
// <div class="span2">
//                         <li class="nav-header"><a href="#">WOMEN\'S SHOES</a></li>
//                           <li><a href="#">Heels</a></li>
//                           <li><a href="#">Flats</a></li>
//                           <li><a href="#">Wedges</a></li>
//                           <li><a href="#">Boots</a></li>
//                           <li><a href="#">Sandals</a></li>
//                           <li><a href="#">Sport Shoes</a></li>
//                           <li><a href="#">Flip Flops</a></li>
//                           <li><a href="#">Comfort</a></li>
//                           <li><a href="#">Sneakers</a></li>
//                         </div>                                                


// <div class="span2">
//                         <li class="nav-header"><a href="#">WOMEN\'S CLOTHING</a></li>
//                           <li><a href="#">Dresses</a></li>
//                           <li><a href="#">Tops</a></li>
//                           <li><a href="#">Skirts</a></li>
//                           <li><a href="#">Pants & Leggings</a></li>
//                           <li><a href="#">Jackets & Coats</a></li>
//                           <li><a href="#">Playsuits & Jumpsuits</a></li>
//                           <li><a href="#">Lingerie & Sleepwear</a></li>
//                           <li><a href="#">Jumpers & Cardigans</a></li>
//                           <li><a href="#">Hoodies & Sweatshirts</a></li>
//                         </div>
                        
                        
                                                
                                                
// <div class="span2">
//                         <li class="nav-header"><a href="#">Women\'s Accessories</a></li>
//                           <li><a href="#">Jewellery</a></li>
//                           <li><a href="#">Watches</a></li>
//                           <li><a href="#">Belts</a></li>
//                           <li><a href="#">Sunglasses</a></li>
//                           <li><a href="#">Hats & Caps</a></li>
//                           <li><a href="#">Scarves & Shawls</a></li>
//                           <li><a href="#">Technology</a></li>
//                           <li><a href="#">Stationery</a></li>
//                         </div>
                        
                                                                                                                        
                        
// </div>

// </div>
// </div>






// <div class="container-fluid nav-down-child">
// <div class="row-fluid">

// <div class="span12">

// <div class="span2">
//                         <li class="nav-header"><a href="#">Women\'s Accessories</a></li>
//                           <li><a href="#">Jewellery</a></li>
//                           <li><a href="#">Watches</a></li>
//                           <li><a href="#">Belts</a></li>
//                           <li><a href="#">Sunglasses</a></li>
//                           <li><a href="#">Hats & Caps</a></li>
//                           <li><a href="#">Scarves & Shawls</a></li>
//                           <li><a href="#">Technology</a></li>
//                           <li><a href="#">Stationery</a></li>
//                         </div>
                        
                        
// <div class="span2">
//                         <li class="nav-header"><a href="#">Women\'s Accessories</a></li>
//                           <li><a href="#">Jewellery</a></li>
//                           <li><a href="#">Watches</a></li>
//                           <li><a href="#">Belts</a></li>
//                           <li><a href="#">Sunglasses</a></li>
//                           <li><a href="#">Hats & Caps</a></li>
//                           <li><a href="#">Scarves & Shawls</a></li>
//                           <li><a href="#">Technology</a></li>
//                           <li><a href="#">Stationery</a></li>
//                         </div>
                        
                        
// <div class="span2">
//                         <li class="nav-header"><a href="#">Women\'s Accessories</a></li>
//                           <li><a href="#">Jewellery</a></li>
//                           <li><a href="#">Watches</a></li>
//                           <li><a href="#">Belts</a></li>
//                           <li><a href="#">Sunglasses</a></li>
//                           <li><a href="#">Hats & Caps</a></li>
//                           <li><a href="#">Scarves & Shawls</a></li>
//                           <li><a href="#">Technology</a></li>
//                           <li><a href="#">Stationery</a></li>
//                         </div>



// </div>

// </div>
// </div>
                        




// </div>';
	}
}
