<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barcode extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('zend');
	}
	
	public function index()
	{
		//load library
		$code=$_GET['bcd'];
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		//Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
		
		$barcodeOptions = array('text' => $code);
		$rendererOptions = array('imageType'=>'png');
		Zend_Barcode::factory('code128', 'image', $barcodeOptions, $rendererOptions)->render();
		
		

	}
	
}