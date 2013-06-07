<?php

/**
 * This is the model class for table "item_ganti".
 *
 * The followings are the available columns in table 'item_ganti':
 * @property integer $id
 * @property integer $pelayananid
 * @property integer $barangid
 * @property integer $jumlah
 * @property string $harga
 * @property string $total
 *
 * The followings are the available model relations:
 * @property Pelayanan $pelayanan
 * @property Barang $barang
 */
class ItemGanti extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemGanti the static model class
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
		return 'item_ganti';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pelayananid, barangid, jumlah', 'required'),
			array('pelayananid, barangid, jumlah', 'numerical', 'integerOnly'=>true),
			array('harga, total', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pelayananid, barangid, jumlah, harga, total', 'safe', 'on'=>'search'),
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
			'pelayanan' => array(self::BELONGS_TO, 'Pelayanan', 'pelayananid'),
			'barang' => array(self::BELONGS_TO, 'Barang', 'barangid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pelayananid' => 'Pelayananid',
			'barangid' => 'Barangid',
			'jumlah' => 'Jumlah',
			'harga' => 'Harga',
			'total' => 'Total',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('pelayananid',$this->pelayananid);
		$criteria->compare('barangid',$this->barangid);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('harga',$this->harga,true);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}