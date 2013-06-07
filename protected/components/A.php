<?php
class A {
	public static function nav(){
		return  '<div class="navbar navbar-inverse navbar-static-top">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="#">Service</a>
                  <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav">
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelayanan <b class="caret"></b></a>
                        <ul>
                        	<li>'.CHtml::link('Tanda Terima', array('pelayanan/tandaterima')).'</li>
							<li>'.CHtml::link('Pembayaran', array('pelayanan/admin')).'</li>
                        </ul>
                      </li>			
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <b class="caret"></b></a>
                        <ul>
                        	<li>'.CHtml::link('Barang', array('barang/admin')).'</li>
							<li>'.CHtml::link('Pelanggan', array('pelanggan/admin')).'</li>
                        </ul>
                      </li>
					  <li>'.CHtml::link('Report', array('pelayanan/report')).'</li>			
                    </ul>
								
								

                    <ul class="nav pull-right">
                      <li>'.CHtml::link('Logout', array('site/logout')).'</li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div><!-- /navbar -->';
	} 
	public static function hero(){
		return '<div class="container-fluid hero">
            <h1>Genreakers</h1>
            <p>Scuba diving is a form of underwater diving in which a diver uses a scuba set to breathe underwater.</p>
          </div>';
	}
	public static function sidebar(){
		return '<div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->';
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
				'jquery.js'=>false,
				'jquery-ui.min.js'=>false,
				'jquery-ui.css'=>false,
		);
	
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/q-responsive.css');
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/style.css');
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/flat-ui.css');
		
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/libs/jquery-1.7.1.min.js', CClientScript::POS_BEGIN);
		//$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/bootstrap.bootbox.min.js', CClientScript::POS_END);
		//$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/bootstrap.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/custom_checkbox_and_radio.js', CClientScript::POS_END);
		//$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/jqueryui.min.js', CClientScript::POS_END);
		//$cs->registerScriptFile(Yii::app()->baseUrl . '/css/bootstrap/js/', CClientScript::POS_END);
	
	}

}
