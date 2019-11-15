<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Welcome extends MY_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing css url
		$this->parsing_js([
			// 'url_js_1',
			// 'url_js_2'
			]);
		//parsing css url
		$this->parsing_css([
			// 'assets/fontAwesome/css/fontawesome-all.min.css',
			// 'assets/css/lib/themify-icons.css'
			]);

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Dashboard',
			'tanggal' => date('d-m-Y')
		]);
	}

	public function index()
	{
		//contoh data berbentuk array
		$tes_array = array('tes array 1', 'tes array 2');

		/*
		isi parameter yang akan di parsing dalam bentuk array 		
		variabel parsing = [
			penamaan 	=> isi dari sebuah data
		];
		*/
		$data = [
			'nama' 			=> 'lathiif aji santhosho',
			'contoh_array' 	=> $tes_array
		];

		//parsing (template_content, variabel_parsing)
		$this->parsing_template('dashboard/index', $data);
	}
}
