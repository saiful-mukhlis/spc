<?php

/**
 * This is the model class for table "pelayanan".
 *
 * The followings are the available columns in table 'pelayanan':
 * @property integer $id
 * @property string $tanggal
 * @property integer $pelangganid
 * @property string $jenis_barang
 * @property string $type_merek
 * @property string $sn
 * @property string $kelengkapan
 * @property string $kerusakan
 * @property string $service
 * @property string $biaya
 * @property string $total
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ItemGanti[] $itemGantis
 * @property Pelanggan $pelanggan
 * @property Returservice[] $returservices
 */
class Pelayanan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pelayanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pelayanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pelangganid', 'required'),
			array('pelangganid, status', 'numerical', 'integerOnly'=>true),
			array('jenis_barang, type_merek, sn', 'length', 'max'=>100),
			array('kelengkapan, kerusakan, service', 'length', 'max'=>255),
			array('biaya, total', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tanggal, pelangganid, jenis_barang, type_merek, sn, kelengkapan, kerusakan, service, biaya, total, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'itemGantis' => array(self::HAS_MANY, 'ItemGanti', 'pelayananid'),
			'pelanggan' => array(self::BELONGS_TO, 'Pelanggan', 'pelangganid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tanggal' => 'Tanggal',
			'pelangganid' => 'Pelangganid',
			'jenis_barang' => 'Jenis Barang',
			'type_merek' => 'Type Merek',
			'sn' => 'Sn',
			'kelengkapan' => 'Kelengkapan',
			'kerusakan' => 'Kerusakan',
			'service' => 'Service',
			'biaya' => 'Biaya',
			'total' => 'Total',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.tanggal',$this->tanggal,true);
		$criteria->compare('t.pelangganid',$this->pelangganid);
		$criteria->compare('t.jenis_barang',$this->jenis_barang,true);
		$criteria->compare('t.type_merek',$this->type_merek,true);
		$criteria->compare('t.sn',$this->sn,true);
		$criteria->compare('t.kelengkapan',$this->kelengkapan,true);
		$criteria->compare('t.kerusakan',$this->kerusakan,true);
		$criteria->compare('t.service',$this->service,true);
		$criteria->compare('t.biaya',$this->biaya,true);
		$criteria->compare('pelanggan.nama',$this->total,true);
		$criteria->compare('pelanggan.notelp',$this->status,true);

		return new CActiveDataProvider($this->with('pelanggan'), array(
			'criteria'=>$criteria,
		));
	}
}