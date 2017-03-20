<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Admin extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('admin_m');
        }
    
        function index()
        {
            $this->data['title'] = "Login Administrator";
            $this->load->view('pages/admin/login-admin',$this->data);
        }
        
        public function cek_login()
        {
            $this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password','trim|required|xss_clean');
            
            if ($this->form_validation->run($this)){
                
                $email = $this->input->post('email', TRUE);
                $password = sha1($this->input->post('password', TRUE));
                
                if($email == NULL || $password == NULL){
                    
                    $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Username / Password Tidak Boleh Kosong !!</div></div>");
                    redirect('admin/login-page');
                    
                }else{
                    
                    $cek_user_account = $this->admin_m->cek_admin_account($email, $password);
                
                    if($cek_user_account->num_rows() == 1){
                        
                        $this->session->sess_destroy();// Destroy old session
						$this->session->sess_create(); // Create a fresh, brand new session
                        // Set session data
                        foreach ($cek_user_account->result() as $sess){
                            
                            $user_data['USERNAME'] = $sess->username;
                            $user_data['EMAIL'] = $sess->email;
                            $user_data['LEVEL'] = $sess->level;
                            $user_data['ADMIN_ID'] = $sess->id_admin;
                            $user_data['SESS_ADMIN'] = TRUE;
                            
                        }
                        $this->session->set_userdata($user_data);
                        redirect('admin/dashboard');
                        
                    }else{
                        
                        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Username / Password Tidak Valid !!</div></div>");
                        redirect('admin/login-page');
                    }
                }
            }else{
                show_error('No direct script access allowed');
            }
        }
        
        function logout() {
            
            $this->session->unset_userdata(array(
				'USERNAME'=>'', 
				'EMAIL'=>'',
                'LEVEL'=>'', 
				'ADMIN_ID'=>'',
                'SESS_ADMIN' => FALSE
			));
			$this->session->sess_destroy();
            redirect('admin/login-page');
        }
        
        public function dashboard()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
			$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
			$config['base_url'] = base_url().'admin/list-berita/page/';
            $config['total_rows'] = $this->admin_m->total_request_berita();
			$config['per_page'] = 20;
			$config['uri_segment'] = 4;
			$config['first_url'] = 1;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<div class="pagination"><ul>';
			$config['full_tag_close'] = '</ul></div>';
			$config['first_link'] = '&larr;';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = '&rarr;';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] =  '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
            
            $this->data['paging'] = $this->pagination->create_links();
            $this->data['sort_number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
            $this->data['berita'] = $this->admin_m->request_berita($config['per_page'], $offset);
	    
			$this->data['dashboard_active'] = "active";
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['title'] = "Dashboard Administrator";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/admin');
            $this->load->view('element/footer-admin');
        }
	
		public function edit_status_berita($id)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            if($id == NULL){ redirect('admin/dashboard');}
            
            $this->data['berita'] = $this->admin_m->get_berita($id);
            $this->data['album'] = $this->admin_m->get_album();
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['dashboard_active'] = "active";
            $this->data['title'] = "Administrator - Edit Berita";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-status-berita');
            $this->load->view('element/footer-admin');
        }
	
		public function update_status_berita($id)
		{
			$this->form_validation->set_rules('active', 'Active','trim|required|xss_clean');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita','trim|required|xss_clean');
            
            if($this->form_validation->run($this))
			{
                $data = array(
                    'active'            => $this->input->post('active', TRUE),
                    'isi_berita'        => $this->input->post('isi_berita', TRUE)
                );
                $res_update = $this->admin_m->update_status_berita($id, $data);
                   
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Berita Berhasil Di Publish !!</div>");
                redirect('admin/dashboard');
                 
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Berita Gagal Di Publish, Harap Periksa Kembali!!</div>");
                redirect('admin/dashboard'); 
            }
        }
		
		public function message()
		{
			if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
			$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
			$config['base_url'] = base_url().'admin/message/page/';
            $config['total_rows'] = $this->admin_m->total_message();
			$config['per_page'] = 20;
			$config['uri_segment'] = 4;
			$config['first_url'] = 1;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<div class="pagination"><ul>';
			$config['full_tag_close'] = '</ul></div>';
			$config['first_link'] = '&larr;';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = '&rarr;';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] =  '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
            
            $this->data['paging'] = $this->pagination->create_links();
            $this->data['sort_number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
            $this->data['message'] = $this->admin_m->all_message($config['per_page'], $offset);
	    
			$this->data['contact_menu'] = "active";
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['title'] = "Dashboard Administrator";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/message');
            $this->load->view('element/footer-admin');
		}
		
		function hapus_message($id)
		{
			$where = array('id' => $id);
			$this->admin_m->hapus_message($where,'message');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id." Berhasil dihapus !!</div>");
             redirect('admin/message');
		}
		
    }
