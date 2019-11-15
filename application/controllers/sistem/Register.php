<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Coolpraz\PhpBlade\PhpBlade;

class Register extends MY_Controller{

    public function __construct()
    {        
        parent::__construct();
    }


    public function index()
	{
		$data = [
            
		];

		//parsing (template_content, variabel_parsing)
		$this->parsing_template_custom('sistem/register',$data);
    }

}