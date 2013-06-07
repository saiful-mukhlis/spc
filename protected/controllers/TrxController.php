<?php

class TrxController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index'),
                'users'=>array('admin','pemilik'),
            ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
                'users'=>array('admin','kasir','pemilik'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','kasir','pemilik'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->renderPartial('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Trx;
		$model2=new Trxd;
		

		$barangs = array();

        $totalTmp=0;
 

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
// 		if(isset($_POST['yt0']))
// 		{

		if(isset($_POST['yt1']))
		{
			if(isset($_POST['Trx']) && isset($_POST['Barang']))
			{
				$model->attributes=$_POST['Trx'];
				$model->ID_USER=1;
                $model->TGL=date('Y-m-d H:i:s');
				$model->save();
				
				
				$barangstmp = $_POST['Barang'];
				$totalTmp=0;

				foreach ($barangstmp as $v) {
//					$b=new Barang();
//                    $b->ID_BARANG=$v['ID_BARANG'];
//					$b->NAMA=$v['NAMA'];
//					$b->HARGA=$v['HARGA'];
//					$b->jumlah=$v['jumlah'];
//					$b->total=$b->jumlah*$b->HARGA;
                    $ba=Barang::model()->findByPk($v['ID_BARANG']);
                    if($ba!=NULL){
                        $ba->jumlah=$ba->jumlah- $v['jumlah'];
                        $ba->save();
                    }
					
					$trxdTmp=new Trxd();
                    $trxdTmp->ID_TRXD=null;
					$trxdTmp->ID_BARANG=$v['ID_BARANG'];
					$trxdTmp->ID_TRX=$model->ID_TRX;
					$trxdTmp->JUMLAH=$v['jumlah'];
					$trxdTmp->TOTAL=$v['jumlah']*$v['HARGA'];
                    $trxdTmp->save();
//                    echo $trxdTmp->ID_BARANG.':'.$trxdTmp->ID_TRX.':'.$trxdTmp->JUMLAH.'===='.$v['ID_BARANG'].'---------------';

					
					$totalTmp=$trxdTmp->TOTAL+$totalTmp;
				}

//                    return;
//                $model2->attributes=$_POST['Trxd'];
//
//                $tmp=Barang::model()->findByPk($model2->ID_BARANG);
//                if ($tmp!=NULL) {
//                    //$tmp->id=$i;
//                    $tmp->jumlah=$model2->JUMLAH;
//                    if ($tmp->jumlah<0) {
//                        $tmp->jumlah=1;
//                    }
//                    $tmp->total=$tmp->jumlah*$tmp->HARGA;
//                    $barangs[]=$tmp;
//                    $totalTmp=$totalTmp+ $tmp->total;
//                    $model2->save();
//                }
				
				$model->TOTAL=$totalTmp;
				$model->save();
				$this->redirect(array('view','id'=>$model->ID_TRX));
				
			}
		}
			
			if(isset($_POST['Barang']))
			{
				$barangstmp = $_POST['Barang'];
			}else{
				$barangstmp = array();
			}
			
			$i=1;
        $totalTmp=0;
			foreach ($barangstmp as $v) {
				
				if(!isset($_POST['del'.$v['id']]))
				{
					$b=new Barang();
					$b->NAMA=$v['NAMA'];
					$b->HARGA=$v['HARGA'];
                    $b->ID_BARANG=$v['ID_BARANG'];
					$b->id=$i;
					$b->jumlah=$v['jumlah'];
					$b->total=$b->jumlah*$b->HARGA;
					$barangs[]=$b;
					$i++;
                    $totalTmp=$b->total+$totalTmp;
				}
				
			}
// 			print_r($barangstmp);
// 			return ;
			
			
			if(isset($_POST['Trx']))
			{
				$model->attributes=$_POST['Trx'];
				$model2->attributes=$_POST['Trxd'];
				$tmp=Barang::model()->findByPk($model2->ID_BARANG);
				if ($tmp!=NULL) {
					$tmp->id=$i;
					$tmp->jumlah=$model2->JUMLAH;
					if ($tmp->jumlah<0) {
						$tmp->jumlah=1;
					}
					$tmp->total=$tmp->jumlah*$tmp->HARGA;
					$barangs[]=$tmp;
                    $totalTmp=$totalTmp+ $tmp->total;
				}
					
				$model2=new Trxd();
			}
			
			
			
// 		}
		$gridDataProvider = new CArrayDataProvider($barangs);

//		if(isset($_POST['yt1']))
//		{
//			$model->attributes=$_POST['Trx'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->ID_TRX));
//		}

		$this->render('create',array(
			'model'=>$model,
				'model2'=>$model2,
				'gridDataProvider'=>$gridDataProvider,
				'barangs'=>$barangs,
                'total'=>$totalTmp,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Trx']))
		{
			$model->attributes=$_POST['Trx'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_TRX));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
    {

        $model=new TglForm;

        // collect user input data
        if(isset($_POST['TglForm']))
        {
            $model->attributes=$_POST['TglForm'];
            $criteria=new CDbCriteria;
            //$begindate = CDateTimeParser::parse($model->tanggal, 'yyyy-MM-dd');
            //echo $model->tanggal.$begindate.'dfg';return;
            $criteria->compare('TGL',$model->tanggal,true);

            $criteria->with='iDPEMBELI';

            $dataProvider=new CActiveDataProvider('Trx', array(
                'criteria'=>$criteria,
                'pagination'=>array('pageSize'=>1000,),
            ));
            $tot = Yii::app()->db->createCommand()
                ->select('sum(TOTAL) as t')
                ->from('Trx u')
                ->where('TGL=:tgl', array(':tgl'=>$model->tanggal))
                ->queryRow();
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
                'model'=>NULL  ,
                'tgl'=>$model->tanggal,
                'tot'=>$tot['t']
            ));

        }else{
            // display the login form
            $this->render('index',array('model'=>$model, 'dataProvider'=>NULL,'tgl'=>NULL,));
        }



	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Trx('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Trx']))
			$model->attributes=$_GET['Trx'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Trx::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='trx-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
