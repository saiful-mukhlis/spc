<?php

class PelayananController extends Controller
{
	public $layout='//layouts/main_admin';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'service', 'tandaterima', 'report'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pelayanan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pelayanan']))
		{
			$model->attributes=$_POST['Pelayanan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionReport()
	{
		$model=new ReportForm();
		if(isset($_POST['ReportForm']))
		{
			$model->attributes=$_POST['ReportForm'];
			if ($model->validate()) {
				$criteria = new CDbCriteria();
				$criteria->addBetweenCondition('tanggal', date('Y-m-d', strtotime($model->start))
						, date('Y-m-d', strtotime($model->end)));
				$dataProvider=new CActiveDataProvider('Pelayanan', array(
			'criteria'=>$criteria,
		));
				$this->render('index',array(
						'dataProvider'=>$dataProvider,
				));
				Yii::app()->end();
			}
			
		}
		$this->render('report',array(
				'model'=>$model,
		));
	}
	public function actionTandaterima()
	{
		//$this->layout='//layouts/satu';
		$model=new ServiceForm();
		$p1=null;$p2=null;$bs=array();$t=0;
	
		if(isset($_POST['ServiceForm']))
		{
			$model->attributes=$_POST['ServiceForm'];
			if ($model->validate()) {
	
				$transaction=Yii::app ()->db->beginTransaction();
				try {
						
					$pelanggan=new Pelanggan();
					$pelanggan->nama=$model->nama;
					$pelanggan->alamat=$model->alamat;
					$pelanggan->notelp=$model->telp;
					$pelanggan->status=1;
					if ($pelanggan->save()) {
						$s=new Pelayanan();
						$s->pelangganid=$pelanggan->id;
						$s->jenis_barang=$model->jenisBarang;
						$s->type_merek=$model->typeMerek;
						$s->sn=$model->sn;
						$s->kelengkapan=$model->kelengkapan;
						$s->kerusakan=$model->kerusakan;
						//$s->save();
						//$transaction->commit();
						$p1=$pelanggan;$p2=$s;
					}
						
						
				} catch (Exception $e) {
					$transaction->rollBack();
				}
	
	
			}
				
		}
	
		$this->render('tandaterima',array(
				'model'=>$model,'p1'=>$p1,'p2'=>$p2
		));
	}
	public function actionService($id)
	{
		$s=Pelayanan::model()->with('pelanggan')->findByPk($id);
		if ($s==null) {
			$this->redirect('admin');
		}
		//$this->layout='//layouts/satu';
		$model=new ServiceForm();
		$model->nama=$s->pelanggan->nama;
		$model->alamat=$s->pelanggan->nama;
		$model->telp=$s->pelanggan->nama;
		$model->jenisBarang=$s->jenis_barang;
		$model->typeMerek=$s->type_merek;
		$model->sn=$s->sn;
		$model->kelengkapan=$s->kelengkapan;
		$model->kerusakan=$s->kerusakan;
		$model->service=$s->service;
		
		
		$p1=null;$p2=null;$bs=array();$t=0;
	
		if(isset($_POST['ServiceForm']))
		{
			$model->attributes=$_POST['ServiceForm'];
			if ($model->validate()) {
				
				$transaction=Yii::app ()->db->beginTransaction();
				try {
					$s->service=$model->service;
						$s->biaya=$model->biaya;
						$total=$s->biaya;

							$model->barang=$_POST['ServiceForm']['barang'];
							$model->jumlah=$_POST['ServiceForm']['jumlah'];
							//echo print_r($_POST['ServiceForm']['barang']);return ;
							if (is_array($model->barang) && count($model->barang)>0) {
								//echo 'ddd';return ;
								$c=count($model->barang);
								//echo $c;return ;
								for ($i = 0; $i < $c; $i++) {
									if (key_exists($i, $model->barang) && $model->barang[$i]>0 && key_exists($i, $model->jumlah) && $model->jumlah[$i]>0 ) {
										$bi=new ItemGanti();
										$bi->pelayananid=$s->id;
										$b=Barang::model()->findByPk($model->barang[$i]);
										if ($b!=null) {
											$bi->barangid=$b->id;
											$bi->jumlah=$model->jumlah[$i];
											$bi->harga=$b->harga;
											$bi->jumlah=$model->jumlah[$i];
											$bi->total=$bi->jumlah*$bi->harga;
											$bi->save();
											$bi->barang=$b;
											$bs[]=$bi;
											$total=$total+$bi->total;
										}
											
									}
					
								}
								$s->total=$total;
								//$s->save();
								//$transaction->commit();
								$p1=$s->pelanggan;$p2=$s;$t=$total;
							}
						
					
					
					
				} catch (Exception $e) {
					$transaction->rollBack();
				}
				
				
			}
			
		}
	
		$this->render('service',array(
				'model'=>$model,'p1'=>$p1,'p2'=>$p2,'bs'=>$bs,'t'=>$t
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

		if(isset($_POST['Pelayanan']))
		{
			$model->attributes=$_POST['Pelayanan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Pelayanan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pelayanan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pelayanan']))
			$model->attributes=$_GET['Pelayanan'];

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
		$model=Pelayanan::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pelayanan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
