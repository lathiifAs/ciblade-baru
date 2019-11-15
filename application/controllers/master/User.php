<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class User extends MY_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('sistem/M_user');
        
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing js url
		$this->parsing_js([
			// 'assets/js/jquery.smartWizard.js'
			// 'assets/vendor/jquery-validation/dist/jquery.validate.min.js',
			// 'assets/vendor/jquery-validation/dist/additional-methods.min.js',
			// 'assets/vendor/jquery-steps/jquery.steps.min.js',
			// 'assets/costum/js/main.js'
		   ]);
		//parsing css url
		$this->parsing_css([
			// 'assets/css/smart_wizard.css',
			// 'assets/css/smart_wizard_theme_dots.css'
			]);

		//parsing data tanpa template
		$this->parsing([
			'title' => 'User'
		]);
	}

	public function index()
	{
		//default notif
		$notif = $this->session->userdata('sess_notif');

		//create pagination
		$this->load->library('pagination');
		$total_row = $this->M_user->count_all();
		$config['base_url'] = base_url('index.php/master/user/index/');
		$config['total_rows'] = $total_row;
		$config['per_page'] = 10;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);		
		$result = $this->M_user->get_all($config['per_page'],$from);
		if (empty($result)) {
			$no = 0;
		}else{
			$no = 1;
		}

		/*
		isi parameter yang akan di parsing dalam bentuk array 		
		variabel parsing = [
			penamaan 	=> isi dari sebuah data
		];
		*/
		$data = [
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			'result' 		=> $result,
			'no' 			=> $no,
			'pagination'	=> $this->pagination->create_links()
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('master/user/index', $data);
	}

	public function add($notif='')
	{
		//default notif
		$notif = $this->session->userdata('sess_notif');
		// get all role
		$all_role = $this->M_user->get_all_role();
		$data = [
			'tipe'	=> $notif['tipe'],
			'pesan' => $notif['pesan'],
			'roles' => $all_role
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('master/user/add', $data);
	}

	 // add process
	 public function add_process() {
        // cek input
        $this->form_validation->set_rules('user_mail', 'User Email', 'trim|required|valid_email|max_length[50]');
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('user_pass', 'Password', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('user_st', 'Status', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('role_id', 'Hak Akses', 'required');
		// check email
		$email = trim($this->input->post('user_mail'));
        if ($this->M_user->is_exist_email($email)) {
            //sukses notif
			$this->notif_msg('master/user/add', 'Error', 'Email telah terdaftar');
		}
        // check username
        $username = trim($this->input->post('user_name'));
        if ($this->M_user->is_exist_username($username)) {
			//sukses notif
			$this->notif_msg('master/user/add', 'Error', 'Username telah digunakan');
		}

        // process
        if ($this->form_validation->run() !== FALSE) {
            $password_key = abs(crc32($this->input->post('user_pass', true)));
            $password = $this->encrypt->encode(md5($this->input->post('user_pass', true)), $password_key);
			// parameter
			// $params = array($this->input->post('user_name'), $password, $password_key, $this->input->post('user_st'), $this->input->post('user_mail'), $this->com_user['user_id']);
			// generate user_id
			$prefix = date('ymd');
			$params_prefix = $prefix . '%';
			$user_id = $this->M_user->generate_id($prefix, $params_prefix);
			$params = array(
				'user_id'	=> $user_id,
				'user_name'	=> $this->input->post('user_name'), 
				'user_pass'	=> $password, 
				'user_key' 	=> $password_key, 
				'user_st'	=> $this->input->post('user_st'), 
				'user_mail'	=> $this->input->post('user_mail'),
				'mdb'		=> $this->get_login('user_name'),
				'mdd'		=> date('Y-m-d H:i:s') 
			);
            // insert
            if ($this->M_user->insert('com_user', $params)) {
                // insert to users
                $params = array(
					'user_id'		=>	$user_id, 
					'nama'			=> 	$this->input->post('nama'), 
					'alamat'		=>	$this->input->post('alamat'), 
					'jns_kelamin'	=>	$this->input->post('jns_kelamin')
				);
                $this->M_user->insert('user',$params);
				// insert hak akses
				$params = array(
					'user_id'		=>	$user_id, 
					'role_id'		=> 	$this->input->post('role_id')
				);
                $this->M_user->insert('com_role_user', $params);
				//sukses notif
				$this->notif_msg('master/user/add', 'Sukses', 'Data berhasil ditambahkan');
            } else {
				// default error
				$this->notif_msg('master/user/add', 'Error', 'Data gagal ditambahkan');
            }
        } else {
			// default error
			$this->notif_msg('master/user/add', 'Error', 'Data gagal ditambahkan');
        }
    }

	public function detail($user_id='')
	{
		//cek data
		if (empty($user_id)) {
			// default error
			$this->notif_msg('master/user', 'Error', 'Data tidak ditemukan !');
		}

		//parsing
		$data = [
			'result' => $this->M_user->get_by_id($user_id)
		];
		$this->parsing_template('master/user/detail', $data);
	}

	public function delete($user_id='')
	{
		//cek data
		if (empty($user_id)) {
			// default error
			$this->notif_msg('master/user', 'Error', 'Data tidak ditemukan !');
		}

		//parsing
		$data = [
			'result' => $this->M_user->get_by_id($user_id)
		];
		$this->parsing_template('master/user/delete', $data);
	}

	public function delete_process()
	{
		$user_id = $this->input->post('user_id', true);
		//cek data
		if (empty($user_id)) {
			// default error
			$this->notif_msg('master/user', 'Error', 'Data tidak ditemukan !');
		}

		$where = array(
			'user_id' => $user_id
		);
		//process
		if ($this->M_user->delete('com_user', $where)) {
			//sukses notif
			$this->notif_msg('master/user', 'Sukses', 'Data berhasil dihapus');
		}else{
			//default error
			$this->notif_msg('master/user', 'Error', 'Data gagal dihapus !');
		}
	}

	public function edit($user_id='')
	{
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//cek data
		if (empty($user_id)) {
			// default error
			$this->notif_msg('master/user', 'Error', 'Data tidak ditemukan !');
		}
		// get all role
		$all_role = $this->M_user->get_all_role();
		//parsing
		$data = [
			'tipe'		=> $notif['tipe'],
			'pesan' 	=> $notif['pesan'],
			'result' 	=> $this->M_user->get_by_id($user_id),
			'roles'		=> $all_role	
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing and view content
		$this->parsing_template('master/user/edit', $data);
	}

	// edit process
	public function edit_process() {
        // cek input
        $this->form_validation->set_rules('user_mail', 'User Email', 'trim|required|valid_email|max_length[50]');
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('user_st', 'Status', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('role_id', 'Hak Akses', 'required');
		// check data
        if (empty($this->input->post('user_id'))) {
            //sukses notif
			$this->notif_msg('master/user', 'Error', 'Data tidak ditemukan');
		}
		$user_id = $this->input->post('user_id');
        // process
        if ($this->form_validation->run() !== FALSE) {
			//with password or no
			if (!empty($this->input->post('user_pass'))) {
				$password_key = abs(crc32($this->input->post('user_pass', true)));
				$password = $this->encrypt->encode(md5($this->input->post('user_pass', true)), $password_key);
				// parameter
				// $params = array($this->input->post('user_name'), $password, $password_key, $this->input->post('user_st'), $this->input->post('user_mail'), $this->com_user['user_id']);
				$params = array(
					'user_name'	=> $this->input->post('user_name'), 
					'user_pass'	=> $password, 
					'user_key' 	=> $password_key, 
					'user_st'	=> $this->input->post('user_st'), 
					'user_mail'	=> $this->input->post('user_mail'),
					'mdb'		=> $this->get_login('user_name'),
					'mdd'		=> date('Y-m-d H:i:s') 
				);
			}else{
				$params = array(
					'user_name'	=> $this->input->post('user_name'),
					'user_st'	=> $this->input->post('user_st'), 
					'user_mail'	=> $this->input->post('user_mail')
				);
			}
			$where = array(
				'user_id'	=> $user_id
			);
            // insert
            if ($this->M_user->update('com_user', $params, $where)) {
                // insert to users
                $params = array(
					'nama'			=> 	$this->input->post('nama'), 
					'alamat'		=>	$this->input->post('alamat'), 
					'jns_kelamin'	=>	$this->input->post('jns_kelamin')
				);
                $this->M_user->update('user', $params, $where);
				// insert hak akses
				$params = array(
					'role_id'		=> 	$this->input->post('role_id')
				);
                $this->M_user->update('com_role_user', $params, $where);
				//sukses notif
				$this->notif_msg('master/user/edit/'.$user_id, 'Sukses', 'Data berhasil diedit');
            } else {
				// default error
				$this->notif_msg('master/user/edit/'.$user_id, 'Error', 'Data gagal diedit');
            }
        } else {
			// default error
			$this->notif_msg('master/user/edit/'.$user_id, 'Error', 'Data gagal diedit');
        }
    }
}