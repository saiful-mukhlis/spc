<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ServiceForm extends CFormModel
{
	public $nama;
	public $alamat;
	public $telp;
	public $jenisBarang;
	public $typeMerek;
	public $sn;
	public $kelengkapan;
	public $kerusakan;
	public $service;
	public $biaya;
	public $barang;
	public $jumlah;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('nama', 'required'),
				array('nama, jenisBarang, typeMerek, sn, telp', 'length', 'max'=>100),
				array('alamat, kelengkapan, kerusakan, service', 'length', 'max'=>255),
			array('nama, alamat, telp, jenisBarang, typeMerek, sn, kelengkapan, kerusakan, service, biaya, barang, jumlah', 'safe', 'on'=>'search'),
		);
	}
	public function attributeLabels()
	{
		return array(
				'kerusakan' => 'Kerusakan/Keluhan',
		);
	}

}