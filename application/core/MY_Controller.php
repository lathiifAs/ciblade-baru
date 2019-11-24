<?php

defined('BASEPATH') OR exit('No direct script access allowed');
    use Coolpraz\PhpBlade\PhpBlade;
    class MY_Controller extends CI_Controller {

        protected $views = APPPATH . 'views';
        protected $cache = APPPATH . 'cache';
        protected $blade;
        protected $tmp_var=[];
        protected $tmp_data;
        protected $tmp_navbar;
        // init portal variable
        protected $portal_id;
        protected $com_portal;
        protected $com_user;
        protected $nav_id = 0;
        protected $parent_id = 0;
        protected $parent_selected = 0;
        protected $role_tp = array();
    
        public function __construct(){
            parent::__construct();
            $this->load->model('sistem/M_site');
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

            // display current page
            self::_display_current_page();
            //display authorize
            self::_check_authority();
            // display sidebar navigation
            self::_display_sidebar_navigation();

            $content = ['content' => $content];
            //get semget url
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            if (!empty($uri_segments[3])) {
                $segment = array(
                    'seg_menu' => $uri_segments[3]
                );
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data, $this->tmp_navbar, $segment,$u_login);
            }else{
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data, $this->tmp_navbar, $u_login);
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
            // echo "<pre>";print_r($update_params);exit;
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
        
        public function parsing_navbar($navbar)
        {
            return $this->tmp_navbar = $navbar;
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

        /* --

        System Base
        
        */

        private function _display_current_page() {
            // get current page (segment 1 : folder, segment 2 : sub folder, segment 3 : controller)
            $url_menu = $this->uri->segment(1) . '/' . $this->uri->segment(2);
            if (is_dir(APPPATH . 'controllers' . '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2))) {
                $url_menu .= '/' . $this->uri->segment(3);
            }
            $url_menu = trim($url_menu, '/');
            $url_menu = (empty($url_menu)) ? $this->notif_msg('welcome', 'Error', 'Data tidak memiliki akses ke menu tersebut'): $url_menu;
            
            $result = $this->M_site->get_current_page($url_menu);
            
            // print_r($result);die();
            if (!empty($result)) {
                $this->parsing_navbar([
                    'page' => $result
                ]);
                $this->nav_id = $result['nav_id'];
                $this->parent_id = $result['parent_id'];
            
            }
        }

        // authority
        protected function _check_authority() {
            // default rule tp
            $this->role_tp = array("C" => "0", "R" => "0", "U" => "0", "D" => "0");
            // check
            if (!empty($this->get_login())) {
                // user authority
                $params = array($this->get_login('user_id'), $this->nav_id);
                $role_tp = $this->M_site->get_user_authority_by_nav($params);
                // get rule tp
                $i = 0;
                foreach ($this->role_tp as $rule => $val) {
                    $N = substr($role_tp, $i, 1);
                    $this->role_tp[$rule] = $N;
                    $i++;
                }
            } else {
                // tidak memiliki authority
                echo "Anda tidak memiliki authority !";exit;
            }
        }

        // sidebar navigation
        protected function _display_sidebar_navigation() {
            $html = "";
            // get data
            $params = array($this->get_login('user_id'), 0);
            $rs_id = $this->M_site->get_navigation_user_by_parent($params);
            if (!empty($rs_id)) {
                foreach ($rs_id as $rec) {
                    // check selected
                    $parent_selected = self::_get_parent_group($this->parent_id, $this->parent_selected);
                    if ($parent_selected == 0) {
                        $parent_selected = $this->nav_id;
                    }
                    // get child navigation
                    $child = $this->_get_child_navigation($rec['nav_id']);
                    if (!empty($child)) {
                        $url_parent = 'javascript:void(0)';
                        $sub_toggle = 'class="sidebar-sub-toggle"';
                        $data_toggle = '<span class="sidebar-collapse-icon ti-angle-down"></span>';
                    } else {
                        $url_parent = site_url($rec['nav_url']);
                        $data_toggle = '';
                        $sub_toggle = '';
                    }
                    // selected
                    $selected = ($rec['nav_id'] == $parent_selected) ? 'active' : '';

                    //parse 
                    $html .='
                    <li class="'.$selected.'">
                        <a  href="'.$url_parent.'" '.$sub_toggle.'><i class="'.$rec['nav_icon'].'"></i>'.$rec['nav_title'] . $data_toggle .'</a>
                            '.$child.'
                    </li>';
                    
                    // // parse
                    // $html .= '
                    // <li class="slide">
                    //   <a class="side-menu__item" data-toggle="'.$data_toggle.'" href="$url_parent" title="'.$rec['nav_desc'].'">
                    //     <i class="side-menu__icon '.$rec['nav_icon'].'"></i>
                    //     <span class="side-menu__label">'.$rec['nav_title'].'</span>
                    //     '.$parent_class_caret.'
                    //   </a>
                    //   '.$child.'
                    // </li>';
                }
            }
            // output
            $this->parsing_navbar([
                'list_sidebar_nav' => $html
            ]);
        }
        
        // utility to get parent selected
        protected function _get_parent_group($int_nav, $int_limit) {
            $selected_parent = 0;
            $result = $this->M_site->get_menu_by_id($int_nav);
            if (!empty($result)) {
                if ($result['parent_id'] == $int_limit) {
                    $selected_parent = $result['nav_id'];
                } else {
                    return self::_get_parent_group($result['parent_id'], $int_limit);
                }
            } else {
                $selected_parent = $result['nav_id'];
            }
            return $selected_parent;
        }

            // get child
        protected function _get_child_navigation($parent_id) {
            $html = '';
            // get parent selected
            $parent_selected = self::_get_parent_group($this->parent_id, $parent_id);
            if ($parent_selected == 0) {
                $parent_selected = $this->nav_id;
            }
            $params = array($this->get_login('user_id'), $parent_id);
            $rs_id = $this->M_site->get_navigation_user_by_parent($params);
            if (!empty($rs_id)) {
                $html .= '<ul>';
                foreach ($rs_id as $rec) {
                    // get child navigation
                    $child = $this->_get_child_navigation($rec['nav_id']);
                    if (!empty($child)) {
                        $url_parent = 'javascript:void(0)';
                    } else {
                        $url_parent = site_url($rec['nav_url']);
                    }
                    // selected
                    $selected = ($rec['nav_id'] == $parent_selected) ? 'active' : '';

                    // <li><a href="{{ site_url('welcome') }}">Dashboard 1</a></li>
                    // parse
                    $html .= '<li>';
                    $html .= '<a href="' . $url_parent . '">'. $rec['nav_title'] . '</a>';
                    $html .= $child;
                    $html .= '</li>';
                }
                $html .= '</ul>';
            }
            // return
            return $html;
        }
        
    }
