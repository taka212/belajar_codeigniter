<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_code extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->library('ciqrcode');

		header("Content-Type: image/png");
		$params['data'] = 'This is a text to encode become QR Code';
		$this->ciqrcode->generate($params);
	}

	public function coba($value='')
	{
		# code...
		$this->load->helper('url');
		$this->load->library('ciqrcode');
		$id = uniqid();
		$dir = FCPATH.'assets/qrcode/';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
		$params['data'] = 'https://cobainajadulu.com';
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = $dir.$id.'.png';
		$this->ciqrcode->generate($params);

		echo '<img src="'.base_url().'/assets/qrcode/'.$id.'.png" />';
	}

}

/* End of file Qrcode.php */
/* Location: ./application/controllers/Qrcode.php */