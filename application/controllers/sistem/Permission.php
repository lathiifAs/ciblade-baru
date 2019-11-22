<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Permission extends MY_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('sistem/M_role');
		$this->load->model('sistem/M_permission');
        
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing js url
		$this->parsing_js([
			'assets/plugin/select2/select2.full.min.js'
		]);
		//parsing css url
		$this->parsing_css([
			'assets/plugin/select2/select2.min.css',
			'assets/plugin/select2/select2-bootstrap.min.css'
		]);
		//parsing data tanpa template
		$this->parsing([
			'title' => 'Hak Akses'
		]);
	}

	public function index()
	{
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//load library and config pagination
		$this->load->library('pagination');
		$this->load->config('pagination');
		$config = $this->config->item('pagination_config');
		//search
		$search = '';
		//create pagination
		$total_row = $this->M_permission->count_all();
		//konfigurasi pagination
		$config['base_url'] = site_url('sistem/permission/index'); //site url
		$config['total_rows'] = $total_row; //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = array($config["per_page"], $data['page']);
		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['data'] =   $this->M_permission->get_all($limit);           
		$data['pagination'] = $this->pagination->create_links();
		if (empty($data['data'])) {
			$no = 0;
		}else{
			$no = 1;
		}
		//get all group roles
		$group = $this->M_role->get_all_group();
		/*
		isi parameter yang akan di parsing dalam bentuk array 		
		variabel parsing = [
			penamaan 	=> isi dari sebuah data
		];
		*/
		$data = [
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			'result' 		=> $data['data'],
			'page' 			=> $data['page'],
			'rs_group' 		=> $group,
			'pagination'	=> $data['pagination'],
			'no'			=> $no
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('sistem/permission/index', $data);
	}

	public function edit($role_id='')
	{
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//cek data
		if (empty($role_id)) {
			// default error
			$this->notif_msg('sistem/permission', 'Error', 'Data tidak ditemukan !');
		}
		// get all menu
		$all_menu = $this->M_permission->get_all_menu();
		$result = $this->M_role->get_by_id($role_id);
		if (empty($all_menu)) {
			$no = 0;
		}else{
			$no = 1;
		}
		//parsing
		$data = [	
			'tipe'		=> $notif['tipe'],
			'pesan' 	=> $notif['pesan'],
			'result' 	=> $result,
			'no' 		=> $no,
			'rs_menu'	=> $all_menu	
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing and view content
		$this->parsing_template('sistem/permission/edit', $data);
	}

	// edit process
	public function edit_process() {
        // cek input
        $this->form_validation->set_rules('parent_id', 'Induk Menu', 'trim|required');
		$this->form_validation->set_rules('nav_title', 'Judul Menu', 'required|max_length[50]');
		$this->form_validation->set_rules('nav_url', 'Alamat Menu', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('nav_no', 'Urutan', 'trim|required');
		$this->form_validation->set_rules('active_st', 'Digunakan', 'trim|required');
		$this->form_validation->set_rules('display_st', 'Ditampilkan', 'trim|required');
		// check data
        if (empty($this->input->post('nav_id'))) {
            //sukses notif
			$this->notif_msg('sistem/permission', 'Error', 'Data tidak ditemukan');
		}
		$nav_id = $this->input->post('nav_id');
		// process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'parent_id'		=> $this->input->post('parent_id'),
				'nav_title'		=> $this->input->post('nav_title'), 
				'nav_desc'		=> $this->input->post('nav_desc'),
				'nav_url'		=> $this->input->post('nav_url'),
				'nav_no'		=> $this->input->post('nav_no'),
				'nav_icon'		=> $this->input->post('nav_icon'),
				'active_st'		=> $this->input->post('active_st'),
				'display_st'	=> $this->input->post('display_st'),
				'mdb'			=> $this->get_login('user_id'),
				'mdb_name'		=> $this->get_login('user_name'),
				'mdd'			=> date('Y-m-d H:i:s') 
			);
			$where = array(
				'nav_id'	=> $nav_id
			);
            // insert
            if ($this->M_permission->update('com_menu', $params, $where)) {
				//sukses notif
				$this->notif_msg('sistem/permission/', 'Sukses', 'Data berhasil diedit');
            } else {
				// default error
				$this->notif_msg('sistem/permission/edit/'.$role_id, 'Error', 'Data gagal diedit');
            }
        } else {
			// default error
			$this->notif_msg('sistem/permission/edit/'.$role_id, 'Error', 'Data gagal diedit');
        }
    }
}
