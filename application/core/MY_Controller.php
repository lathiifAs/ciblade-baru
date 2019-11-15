<?php

defined('BASEPATH') OR exit('No direct script access allowed');
    use Coolpraz\PhpBlade\PhpBlade;
    class MY_Controller extends CI_Controller {

        protected $views = APPPATH . 'views';
        protected $cache = APPPATH . 'cache';
        protected $blade;
        protected $tmp_var=[];
        protected $tmp_data;
    
        public function __construct(){
            parent::__construct();
            $this->blade = new PhpBlade($this->views, $this->cache);
        }

        public function front_render($view_name,$data,$head){
            
            echo $this->blade->view()->make('_parts/header', $head);
            echo $this->blade->view()->make($view_name, $data);
            echo $this->blade->view()->make('_parts/footer', $head);
            
        }

        //template admin
        public function parsing_template($content, $data ='')
        {
            //cek validate login
            if (empty($this->session->userdata('com_user'))) {
                // default error
                $this->notif_msg('sistem/login','Error', 'Harus login terlebih dulu !');
            }else{
                $u_login = array('user_login' => $this->session->userdata('com_user'));
            }

            $content = ['content' => $content];
            //get semget url
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            if (!empty($uri_segments[3])) {
                $segment = array(
                    'seg_menu' => $uri_segments[3]
                );
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data, $segment,$u_login);
            }else{
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data, $u_login);
            }
            $all = array('all_data' => $params_parsing); 
            //change name of array to js     
            if (!empty($all['all_data'][0])){
                $all['all_data']['js'] = $all['all_data'][0];
                unset($all['all_data'][0]);
            }  
            //change name of array to css       
            if (!empty($all['all_data'][1])){
                $all['all_data']['css'] = $all['all_data'][1];
                unset($all['all_data'][1]); 
            }  
            $update_params = $all['all_data'];
            echo $this->blade->view()->make('template/template',  $update_params);
        }

        //template client
        public function client_template($content, $data ='')
        {
            $content = ['content' => $content];
            //get semget url
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            if (!empty($uri_segments[3])) {
                $segment = array(
                    'seg_menu' => $uri_segments[3]
                );
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data, $segment);
            }else{
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data);
            }
            $all = array('all_data' => $params_parsing); 
            $update_params = $all['all_data'];
            echo $this->blade->view()->make('client_template/template',  $update_params);
        }

        // //pasring template login
        // public function parsing_template_login($data ='')
        // {
        //     if (!empty($data)) {
        //         echo $this->blade->view()->make('sistem/login',  $data);
        //     }else{
        //         echo $this->blade->view()->make('sistem/login');
        //     }
        // }

        public function parsing_template_custom($content, $data ='')
        {
            if (!empty($data)) {
                echo $this->blade->view()->make($content,  $data);
            }else{
                echo $this->blade->view()->make($content);
            }
        }

        //kirim notifikasi
        public function notif_msg($content, $tipe, $pesan)
        {

            if (!empty($tipe) && !empty($pesan)) {
                if ($tipe == 'Sukses') {
                    $tipe_notif = 'Sukses';
                }else{
                    $tipe_notif = 'Error';
                }
                $data = [
                    'tipe'	=> $tipe_notif,
                    'pesan' => $pesan
                ];
                $this->session->set_userdata('sess_notif', $data);
                redirect($content);
            }
        }

        //parsing url js
        public function parsing_js($data)
        {   
            $result = array();
            if (!empty($data)) {
                foreach ($data as $key) {
                    array_push($result, $key);
                }
                return array_push($this->tmp_var, $result);
            }else{
                return $result;
            }
        }

        //parsing url css
        public function parsing_css($data)
        {
            $result = array();
            if (!empty($data)) {
                foreach ($data as $key) {
                    array_push($result,  $key);
                }
                return array_push($this->tmp_var, $result);
            }else{
                return $result;
            }
        }

        public function parsing($data)
        {
            return $this->tmp_data = $data;
        }

        //get data login
        public function get_login($key=[])
        {
            $data_login = $this->session->userdata('com_user');
            if (empty($key)) {
                    return $data_login;
            }else{
                    if (is_array($key)){
                        $data = array();
                        foreach ($key as $p_key) {
                            $data[] = $data_login[$p_key];
                        }
                    }else{
                        $data = $data_login[$key];
                    }
                return $data;
            }

        }


    }
