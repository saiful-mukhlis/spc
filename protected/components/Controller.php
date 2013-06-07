<?php

class Controller extends CController
{

	public $layout='//layouts/main';
	public $menu=array();
	public $breadcrumbs=array();

    public $title='Service Komputer',$description='',$keywords='';

    
    public function __construct($id,$module=null)
    {
    	parent::__construct($id,$module);
    	A::css();
    }


	
}