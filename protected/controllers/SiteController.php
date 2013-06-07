<?php

class SiteController extends Controller
{

//  	public function filters()
//  	{
//  		return array(
//  				array(
//  						'COutputCache',
//  						'cacheID'=>'cache2',
//  						'duration'=>1000,
//  				),
//  		);
//  	}

    /**  All layouts use css/styles.css from html5 boilerplate.
    All less files are compiled into the css folder(you can define the output folder in WinLess).
     */


    /**
     *      Semantic,responsive  layout with Semantic Grid
     *       http://semantic.gs/
     *       This layout needs  less/sg/layout.less ,less/sg/responsive_sg.less and less/bs/bootstrap.less
     *        Also less/bs/responsive.less if you use the  bootstrap navbar for navigation
     *       Bootstrap is still used for non-layout design,so you can exclude layout related code in bootstrap.less.
     */
    // public $layout='//layouts/grid_sg';


    /**
     *This layout is used with Bootstrap non-semantic classes.
     * It uses    less/bs/bootstrap.less,less/bs/responsive.less and  less/responsive_custom.less,
     */
    //public $layout='//layouts/grid_bs';

    /**
     *This layout is semantic with Bootstrap,it uses  layout mixins like .makeRow() and .makeColumn();
     * It uses    less/sem_layout.less and bootstrap.less(with all layout code optionally excluded),
     * The downside is that you have to code a custom responsive less or css file.The default bootstrap responsive.less
     *  file will not work,since it produces the non-semantic classes .span* which are not used in this semantic layout.
     *
     */
    public $layout = '//layouts/p1';


    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
       $this->layout = '//layouts/main';
       $this->render('index');

    }
    
    public function actionSd()
    {
    	$this->title='Home';
    	$this->buildNavs();
    	$this->layout = '//layouts/main';
    	

    	 
    	$model = new ContactForm;

    	$this->render('sd', array('model' => $model));
    	
    	
    	
    	//$this->render('sd');
    
    }
    
    public function actionAllp($id=0,$s='')
    {
    	$pos = strpos('-'.$s.'-', '-'.$id.'-');
    	if ($pos === false) {
    		//tdk ketemu
    		$s=$s.'-'.$id;
    	}
    	$this->actionAll(0,$s);
    }
    
    public function actionAllm($id=0,$s='')
    {
    	$pos = strpos('-'.$s.'-', '-'.$id.'-');
    	if ($pos !== false) {
    		//ketemu
    		$s=str_replace('-'.$id.'-', '-', '-'.$s.'-');
    		if (substr($s, 0, 1)==='-') {
    			$s=substr($s, 1);
    		}else if(substr($s, -1)==='-'){
    			$s=substr($s, 0,-1);
    		}
    		
    	}
    	$this->actionAll(0,$s);
    }
    
    public function actionAll($id=0,$s='')
    {
    	$s=str_replace('--', '', $s);
    	if(substr($s, -1)==='-'){
    		$s=substr($s, 0,-1);
    	}
    	$tmpids=array();
    	$this->layout = '//layouts/main';
    	$this->buildNavs();
    	$model=null;
    	if ($id==0 && $s === '') {
    		//$model=Product::model()->findAll();
    		$criteria=new CDbCriteria;
    		//$criteria->compare('TYPEPRODUCTS.IDT',2, false,'AND');
    		//$criteria->compare('TYPEPRODUCTS.IDT',6, false, 'AND');
    		//$criteria->join = 'JOIN "TYPE_PRODUCT" "A" ON ("A"."IDP" = "t"."ID" AND "A"."ROWID" < "t"."ROWID" AND "A"."IDT"=:p1 OR "A"."IDT"=:p2)';
    		//$criteria->params = array(':p1'=>2,':p2'=>6);
    		$model=new CActiveDataProvider('Product', array('pagination' => array (
    						'pageSize' => 24
    				),));
    		//return ;
    	}else{
    		$tmpids=explode('-', $s);
    		$criteria=new CDbCriteria;
    		
    		$join='';
    		$jml=count($tmpids);
    		$awal=false;
    		if ($id!=0) {
    			$awal=true;
    			$join.=' "B"."IDT"=:px';
    			$criteria->params[':px']=$id;
    		}
    		for ($i = 0; $i < $jml; $i++) {
    			if (is_numeric($tmpids[$i])) {
    				
    				$criteria->params[':p'.$i]=$tmpids[$i];
    				if ($awal==false) {
    					$join.=' "B"."IDT"=:p'.$i;
    				}else{
    					$join.=' OR '.' "B"."IDT"=:p'.$i;
    				}
//     				if ($i==0) {
//     					$join.=' "B"."IDT"=:p'.$i;
//     				}else{
//     					$join.=' OR '.' "B"."IDT"=:p'.$i;
//     				}
    				$awal=true;
    			}
    		}
    		
    		
    		$criteria->join = 'JOIN (SELECT "A"."ID"  FROM "PRODUCT" "A", "TYPE_PRODUCT" "B" WHERE "A"."ID"="B"."IDP" AND ('.$join.') GROUP BY "A"."ID") C ON "t"."ID"="C"."ID" ';
    		//echo $criteria->join;return ;
//     		$criteria->join = str_replace('AND ()', '', $criteria->join);
    		
    		//$criteria->params = array(':p1'=>2,':p2'=>6);
    		$model=new CActiveDataProvider('Product', array(
			'criteria'=>$criteria,
    				'pagination' => array (
    						'pageSize' => 24
    				),
		));
    	}
    	
    	$this->render('all',array('dataProvider'=>$model,'tids'=>$tmpids,'s'=>$s,'id'=>$id));
    
    }
    
    public function actionNota($id)
    {
    	$model=Trx::model()->findByPk($id);
    	//$this->setMyweb();
    	$this->buildNavs();
    	$this->layout = '//layouts/main';
    	$this->render('nota',array('model'=>$model));
    
    }
    
    public function actionMember()
    {
    	$model=new Member();
    	if (isset($_POST['email'])) {
    		$model->EMAIL=$_POST['email'];
    		if ($model->EMAIL!=NULL) {
    			$tmp=Member::model()->findByAttributes(array('EMAIL'=>$model->EMAIL));
    			if ($tmp!=NULL) {
    				$model=$tmp;
    			}
    		}
    	}
    	
    	
    	
    	if(isset($_POST['Member']))
    	{
    		
    		$model->attributes=$_POST['Member'];
    		if ($model->EMAIL!=NULL) {
    			//echo 'asdf';return ;
    			$tmp=Member::model()->findByAttributes(array('EMAIL'=>$model->EMAIL));
    			if ($tmp!=NULL) {
    				$modeltmp=$model;
    				$model = $tmp;
    				$model->ALAMAT=$modeltmp->ALAMAT;
    				$model->NOTELP=$modeltmp->NOTELP;
    			}
    			$transaction=Yii::app()->db->beginTransaction();
    			try{
    				
    				
    				if($model->save()){
    					if (Yii::app()->session['idb']==NULL) {
    						$this->redirect(array('site/index'));
    					}
    					$ids=explode(',', Yii::app()->session['idb']);
    					if (count($ids)==0) {
    						$this->redirect(array('site/index'));
    					}
    					//echo "asdf".Yii::app()->session['idb'];return ;
    					$sizes=explode(',', Yii::app()->session['sizeb']);
    					$jmls=explode(',', Yii::app()->session['jmlb']);
    					$i1=count($ids);
    					// simpan trx
    					$trx=new Trx();
    					$trx->IDMEMBER=$model->ID;
    					//$cur_date = date('Y-m-d');
    					//$trx->TGL_TRX= "to_date($cur_date,'yyyy-mm-dd')";
    					//$trx->TGL_TRX=date('Y-m-d H:i:s');
    					//$cur_date = date('Y-m-d');
    					//$trx->TGL_TRX = 'sysdate';
    					//echo date("Y-m-d");return ;
    					//$trx->TGL_TRX="to_date(".date("Y-m-d").",'YYYY-MM-DD')";
    					$trx->TGL_TRX =strtoupper(date('d-M-y'));
    					
    					$trx->save();//return ;
    					
    					$trx->TOTAL=0;
    					// simpan cart
    					for ($i = 0; $i < $i1; $i++) {
    						//
    						$product = Product::model()->findByPk($ids[$i]);
    						if ($product!=NULL) {
    							$trxd=new Trxd();
    							$trxd->IDTRX=$trx->ID;
    							$trxd->IDP=$product->ID;
    							$trxd->IDS=$sizes[$i];
    							$trxd->HARGA=$product->HARGA;
    							$trxd->JML=$jmls[$i];
    							$trxd->save();
    							$trx->TOTAL=$trx->TOTAL+($jmls[$i]*$product->HARGA);
    						}
    						
    					}
    					$trx->save();
    					$transaction->commit();
    					unset(Yii::app()->session['idb']);unset(Yii::app()->session['sizeb']);unset(Yii::app()->session['jmlb']);
    					$this->redirect(array('site/nota','id'=>$trx->ID));
    				}
    				
    			}catch(Exception $e){ // an exception is raised if a query fails{
    				
					$transaction->rollBack();
					echo $e->getMessage();return ;
				}
    		
    		}
    		
    	}
    	 
    	$this->buildNavs();
    	$this->layout = '//layouts/main';
    	$this->render('datamember', array('model'=>$model,));
    
    }
    
    public function actionEmptyCart()
    {
    	unset(Yii::app()->session['idb']);unset(Yii::app()->session['sizeb']);unset(Yii::app()->session['jmlb']);
    	$this->redirect(array('site/index'));
    
    }
    
    public function actionKeranjangBelanja()
    {
    	$ids=explode(',', Yii::app()->session['idb']);
    	$sizes=explode(',', Yii::app()->session['sizeb']);
    	$jmls=explode(',', Yii::app()->session['jmlb']);
    	
    	$this->buildNavs();
    	$this->layout = '//layouts/main';
    	$this->render('keranjang', array('ids'=>$ids, 'sizes'=>$sizes, 'jmls'=>$jmls));
    
    }
    
    public function actionProduct($id)
    {
    	//unset(Yii::app()->session['idb']);unset(Yii::app()->session['sizeb']);unset(Yii::app()->session['jmlb']);return ;
    	//echo 'asdf';
    	if(isset($_POST['size']))
		{
			//echo 'asdfxx';
			$s=$_POST['size'];
			//print_r($s);return ;
// 			$keyx=null;
// 			foreach ($s as $key=>$v) {
// 				$keyx= $key;
// 			}
			//echo $keyx.'asdfff';
			if ($s!=null) {
				//echo 'asdf';
				if (Yii::app()->session['idb']==null) {
					Yii::app()->session['idb'] = ''.$id;
					Yii::app()->session['sizeb'] = ''.$s;
					Yii::app()->session['jmlb'] = '1';
				}else{
					//echo 'as';
					//echo Yii::app()->session['idb'];
					$ids=explode(',', Yii::app()->session['idb']);
					$sizes=explode(',', Yii::app()->session['sizeb']);
					$jmls=explode(',', Yii::app()->session['jmlb']);
					$i1=count($ids);
					$sama=FALSE;
					for ($i = 0; $i < $i1; $i++) {
						//echo '--'.$sizes[$i].$keyx.'==';
						if ($ids[$i]===$id && $sizes[$i]==$s) {
							$jmls[$i]=$jmls[$i]+1;
							//echo $jmls[$i];
							$sama=TRUE;
							break;
						}
					}
					if ($sama==FALSE) {
						Yii::app()->session['idb'] = Yii::app()->session['idb'].','.$id;
						Yii::app()->session['sizeb'] = Yii::app()->session['sizeb'].','.$s;
						Yii::app()->session['jmlb'] = Yii::app()->session['jmlb'].','.'1';
					}else{
						$idtmp='';
						$sizetmp='';
						$jmltmp='';
						for ($i = 0; $i < $i1; $i++) {
							if ($i==$i1-1) {
								$idtmp.=$ids[$i];
								$sizetmp.=$sizes[$i];
								$jmltmp.=$jmls[$i];
							}else{
								$idtmp.=$ids[$i].',';
								$sizetmp.=$sizes[$i].',';
								$jmltmp.=$jmls[$i].',';
							}
							
						}
						Yii::app()->session['idb'] = $idtmp;
						Yii::app()->session['sizeb'] = $sizetmp;
						Yii::app()->session['jmlb'] = $jmltmp;
						//echo $idtmp.$sizetmp.$jmltmp;
					}
				
				
				}
			}
			$this->redirect(array('site/keranjang-belanja'));
			return ;
		}
		//return ;
    	
    	//$this->setMyweb();
    	$this->buildNavs();
    	$p=Product::model()->findByPk($id);
    	//$p2=Product2::model()->findByPk($id);
    	if ($p==null) {
    		$this->redirect('index');
    	}else{
    		$this->layout = '//layouts/main';
    		$this->render('product', array('p'=>$p));
    	}
    	
    
    }


    
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
    	$this->title='Home';
    	$this->buildNavs();
    	$this->layout = '//layouts/main';
    	
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', '<strong>Message sent!   </strong>Thank you for contacting us. We will respond to you as soon as possible.');

                $this->refresh();

            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
    	$this->layout = '//layouts/main_admin_login';
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                Yii::app()->user->setFlash('success', '<strong>Logged In!</strong>');
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form

        if (!empty($_POST['LoginForm'])) {
            Yii::app()->user->setFlash('error', '<strong>Not Logged In.</strong>Wrong Credentials.');
        }
        $this->render('login', array('model' => $model));

    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionTest()
    {
        throw new CHttpException(404, 'The specified post cannot be found.');
    }

    public function actionImg()
    {
        $this->layout = '//layouts/main';
        $this->render('img');
    }

//     public function actionProduct($id)
//     {
//     	if ($id==null) {
//     		$this->redirect(array('index'));
//     	}else{
//     		$product = ProductDetail::model()->with(array('status0', 'brand0', 'stock0'))->findByPk($id);
//     		if ($product!=null) {
//     			$this->layout = '//layouts/main';
//     			$this->render('product', array('product'=>$product));
//     		}else{
//     			$this->redirect(array('index'));
//     		}
//     	}
        
//     }

    public function actionList1()
    {
        $this->layout = '//layouts/main';
        $this->render('list1');
    }

    public function actionList2()
    {
        $this->layout = '//layouts/main';
        $this->render('list2');
    }

    public function actionList3()
    {
        $this->layout = '//layouts/main';

//         $dataProvider = new CActiveDataProvider('Product', array('pagination' => array(
//             'pageSize' => 21,
//         ),
// 				'criteria'=>array(
//                                 'with'=>array('pus'),
//                         ),
//         ));
        
        $dataProvider = new CActiveDataProvider ( 'Product', array (
        		'pagination' => array (
        				'pageSize' => 21
        		),
        		'criteria' => array (
        				'with' => array (
        						'pus'=>array('condition'=>'ukuranid=2',)
        				),
        				'together'=>true,
        		)
        ) );
        $this->render('list3', array(
            'dataProvider' => $dataProvider,

        ));

    }


    public function actionP()
    {
        $this->layout = '//layouts/column1_admin';
        $model = new Pall();


        if (isset($_POST['Pall'])) {
            $model->attributes = $_POST['Pall'];
            $model->img=CUploadedFile::getInstance($model,'img');
            if ($model->validate()) {
                //$model->img->saveAs(Yii::app() -> getBasePath() . '/../img/product/p/t2.jpg');
                $product = new Product();
                $product->nama = $model->nama;
                $product->status = $model->status;
                $product->rating = $model->rating;
                $product->ket = $model->ket;

                if ($product->validate()) {
                    if ($product->save()) {
                        // setelah valid dan save -> image
                        $product->img=time().'-'.$model->img->name;
                        $img_tersimpan=$model->img->saveAs(Yii::app() -> getBasePath() . '/../img/product/p/'.$product->img);
                        if($img_tersimpan){
                            $product->save();
                        }
                        if (is_array($model->bahanps)) {
                            foreach ($model->bahanps as $v) {
                                $bahanps = new Bahanp();
                                $bahanps->pid = $product->id;
                                $bahanps->bahanid = $v;
                                try {
                                    if ($bahanps->validate()) {
                                        $bahanps->save();
                                    }
                                } catch (Exception $e) {
                                    //echo $e;return;
                                }
                            }
                        }

                        if (is_array($model->motifps)) {
                            foreach ($model->motifps as $v) {
                                $motifps = new Motifp();
                                $motifps->pid = $product->id;
                                $motifps->motifid = $v;
                                try {
                                    if ($motifps->validate()) {
                                        $motifps->save();
                                    }
                                } catch (Exception $e) {

                                }
                            }
                        }

                        if (is_array($model->warnaps)) {
                            foreach ($model->warnaps as $v) {
                                $warnaps = new Warnap();
                                $warnaps->pid = $product->id;
                                $warnaps->warnaid = $v;
                                try {
                                    if ($warnaps->validate()) {
                                        $warnaps->save();
                                    }
                                } catch (Exception $e) {

                                }
                            }
                        }

                        if ($model->brand = null) {
                            $brand = new Brandp();
                            $brand->pid = $product->id;
                            $brand->brandid = $model->brand;
                            try {
                                if ($brand->validate()) {
                                    $brand->save();
                                }
                            } catch (Exception $e) {

                            }
                        }

                        //ukuran   1
                        $ukuran = new Pu();
                        $ukuran->ukuranid = $model->ukuranid_1;
                        $ukuran->pid = $product->id;
                        $ukuran->kethg1 = $model->kethg1_1;
                        $ukuran->hg1 = $model->hg1_1;
                        $ukuran->diskonphg1 = $model->diskonphg1_1;
                        if ($ukuran->diskonphg1 != null && $ukuran->diskonphg1 > 0) {
                            $ukuran->diskonhg1 = $ukuran->diskonphg1 * $ukuran->hg1 / 100;
                        }
                        $ukuran->kethg2 = $model->kethg2_1;
                        $ukuran->hg2 = $model->hg2_1;
                        $ukuran->diskonphg2 = $model->diskonphg2_1;
                        if ($ukuran->diskonphg2 != null && $ukuran->diskonphg2 > 0) {
                            $ukuran->diskonhg2 = $ukuran->diskonphg2 * $ukuran->hg2 / 100;
                        }

                        if ($ukuran->validate()) {
                            try {
                                $ukuran->save();
                            } catch (Exception $e) {
                            }
                        }

                        //ukuran 2
                        $ukuran = new Pu();
                        $ukuran->ukuranid = $model->ukuranid_2;
                        $ukuran->pid = $product->id;
                        $ukuran->kethg1 = $model->kethg1_2;
                        $ukuran->hg1 = $model->hg1_2;
                        $ukuran->diskonphg1 = $model->diskonphg1_2;
                        if ($ukuran->diskonphg1 != null && $ukuran->diskonphg1 > 0) {
                            $ukuran->diskonhg1 = $ukuran->diskonphg1 * $ukuran->hg1 / 100;
                        }
                        $ukuran->kethg2 = $model->kethg2_2;
                        $ukuran->hg2 = $model->hg2_2;
                        $ukuran->diskonphg2 = $model->diskonphg2_2;
                        if ($ukuran->diskonphg2 != null && $ukuran->diskonphg2 > 0) {
                            $ukuran->diskonhg2 = $ukuran->diskonphg2 * $ukuran->hg2 / 100;
                        }

                        if ($ukuran->validate()) {
                            try {
                                $ukuran->save();
                            } catch (Exception $e) {
                            }
                        }

                        //ukuran 3
                        $ukuran = new Pu();
                        $ukuran->ukuranid = $model->ukuranid_3;
                        $ukuran->pid = $product->id;
                        $ukuran->kethg1 = $model->kethg1_3;
                        $ukuran->hg1 = $model->hg1_3;
                        $ukuran->diskonphg1 = $model->diskonphg1_3;
                        if ($ukuran->diskonphg1 != null && $ukuran->diskonphg1 > 0) {
                            $ukuran->diskonhg1 = $ukuran->diskonphg1 * $ukuran->hg1 / 100;
                        }
                        $ukuran->kethg2 = $model->kethg2_3;
                        $ukuran->hg2 = $model->hg2_3;
                        $ukuran->diskonphg2 = $model->diskonphg2_3;
                        if ($ukuran->diskonphg2 != null && $ukuran->diskonphg2 > 0) {
                            $ukuran->diskonhg2 = $ukuran->diskonphg2 * $ukuran->hg2 / 100;
                        }

                        if ($ukuran->validate()) {
                            try {
                                $ukuran->save();
                            } catch (Exception $e) {
                            }
                        }

                        //ukuran 4
                        $ukuran = new Pu();
                        $ukuran->ukuranid = $model->ukuranid_4;
                        $ukuran->pid = $product->id;
                        $ukuran->kethg1 = $model->kethg1_4;
                        $ukuran->hg1 = $model->hg1_4;
                        $ukuran->diskonphg1 = $model->diskonphg1_4;
                        if ($ukuran->diskonphg1 != null && $ukuran->diskonphg1 > 0) {
                            $ukuran->diskonhg1 = $ukuran->diskonphg1 * $ukuran->hg1 / 100;
                        }
                        $ukuran->kethg2 = $model->kethg2_4;
                        $ukuran->hg2 = $model->hg2_4;
                        $ukuran->diskonphg2 = $model->diskonphg2_4;
                        if ($ukuran->diskonphg2 != null && $ukuran->diskonphg2 > 0) {
                            $ukuran->diskonhg2 = $ukuran->diskonphg2 * $ukuran->hg2 / 100;
                        }

                        if ($ukuran->validate()) {
                            try {
                                $ukuran->save();
                            } catch (Exception $e) {
                            }
                        }
                    }
                }

            }
        }

        $this->render('p_form', array(
            'model' => $model,
        ));
    }

    public function actionPd($id)
    {
        $this->layout = '//layouts/column1_admin';
        $model = Product::model()->findByPk($id);
        $bahan = Bahanp::model()->with('bahan')->findAllByAttributes(array('pid' => $id));
        $motif = Motifp::model()->with('motif')->findAllByAttributes(array('pid' => $id));
        $warna = Warnap::model()->with('warna')->findAllByAttributes(array('pid' => $id));
        $ukuran = Pu::model()->with('ukuran')->findAllByAttributes(array('pid' => $id));
        $brand = Brandp::model()->findByAttributes(array('pid' => $id));
        $img = new UploadForm;
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $this->render('pd', array(
            'model' => $model,
            'bahan' => $bahan,
            'motif' => $motif,
            'ukuran' => $ukuran,
            'warna' => $warna,
            'brand' => $brand,
            'img'=>$img,
        ));
    }

    public function actionPuimg($id)
    {
        $this->layout = '//layouts/column1_admin';
        $img = new UploadForm;
        $this->render('puimg', array(
            'img'=>$img,
        ));
    }
    
    public function actionListall($ukuran='all', $warna='all', $bahan='all')
    {
    	
        $this->layout = '//layouts/main';
        // condisi ukuran
        // variable tmp yang berisi data angka
        $tmpuvalid=array();
        if ($ukuran!=='all') {
			$u = explode ( 'u', $ukuran );
			foreach ($u as $v) {
				if (is_numeric($v)) {
					$tmpuvalid[]='ukuranid='.$v;
				}	
			}
        }
        $cu=implode(' or ', $tmpuvalid);
//         echo $cu;
//         return ;
        
    	 $dataProvider = new CActiveDataProvider ( 'Product', array (
        		'pagination' => array (
        				'pageSize' => 21
        		),
        		'criteria' => array (
        				'with' => array (
        						'pus'=>array('condition'=>$cu,)
        				),
        				'together'=>true,
        		)
        ) );
    	$this->render('list3', array(
            'dataProvider' => $dataProvider,

        ));
    }

    
}