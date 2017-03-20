<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Banner extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('admin_m');
			if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
        }
        
        public function list_banner()
        {
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
			$config['base_url'] = base_url().'admin/list-banner/page/';
            $config['total_rows'] = $this->admin_m->total_banner();
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
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['banner'] = $this->admin_m->detail_banner($config['per_page'], $offset);
            $this->data['banner_active_treeview'] = "active";
            $this->data['banner_active_list'] = "active";
            $this->data['title'] = "Administrator - List Banner";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/banner');
            $this->load->view('element/footer-admin');
        }
        
        public function add_banner()
        {
            
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['banner_active_treeview'] = "active";
            $this->data['banner_active_add'] = "active";
            $this->data['title'] = "Administrator - Add Banner";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-banner');
            $this->load->view('element/footer-admin');
        }
        
        public function create_banner()
        {
            $this->load->library('image_moo');
            $this->load->library('upload');
            
            $this->form_validation->set_rules('title', 'Titte','trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'URL','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');
            
            $config['upload_path'] = 'asset/img/banner/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '2048'; //maksimum besar file 2M
            $config['max_width']  = '2288'; //lebar maksimum 1288 px
            $config['max_height']  = '2288'; //tinggi maksimu 768 px
            $config['remove_spaces']  	= TRUE;
            $config['encrypt_name']  	= TRUE;
            $config['image_library'] = 'gd2';
            
            if(!is_dir($config['upload_path'])){
                mkdir($config['upload_path'], 0755, TRUE);
            }
            $this->load->library('image_lib', $config); 

            $this->image_lib->resize();
            $this->upload->initialize($config);
            
            if($_FILES['userfile']['name'])
            {
                if ($this->upload->do_upload('userfile'))
                {
                    $gambar = $this->upload->data();
                    
                    $source          = 'asset/img/banner/'. $gambar['file_name'];
                    $new_destination = 'asset/img/banner/';
                        
                    $this->image_moo->load($source);
                    $this->image_moo->resize(1084, 100);
                    $this->image_moo->save($new_destination .slug($this->input->post('title', TRUE)). '-1000x100-' .$gambar['file_name']);
                    $this->image_moo->resize(240, 70);
                    $this->image_moo->save($new_destination .slug($this->input->post('title', TRUE)). '-240x70-' .$gambar['file_name']);    
                    /* Delete original file to save space */
                    @unlink($source);
                    
                    $data = array(
                        'image'         => $gambar['file_name'],
                        'title'         => slug($this->input->post('title', TRUE)),
                        'url'         => $this->input->post('url', TRUE),
                        'create'        => date('Y-m-d H:i:s')
                    );
                    
                    if($data['title'] != NULL)
                    {
                        $res_update = $this->admin_m->add_banner($data);
                        
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data Berhasil Ditambahkan !!</div>");
                        redirect('admin/list-banner');
                        
                    }else{
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Data Belum Lengkap !!</div>");
                        redirect('admin/add-banner');
                    }
                    
                    
                }else{
                    
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Ukuran Foto Terlalu Besar !!</div>");
                    redirect('admin/add-banner'); 
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Gambar Belum Di Upload!!</div>");
                redirect('admin/add-banner'); 
            }
        }
        
        public function edit_banner($id_banner)
        {
            $id_admin = $this->session->userdata('ADMIN_ID');
            if($id_banner == NULL){ redirect('admin/list-banner');}
            
            $this->data['banner'] = $this->admin_m->get_banner($id_banner);
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['banner_active_treeview'] = "active";
            $this->data['banner_active_add'] = "active";
            $this->data['title'] = "Administrator - Edit Banner";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-banner');
            $this->load->view('element/footer-admin');
        }
        
        public function update_banner()
        {
            $this->load->library('image_moo');
            $this->load->library('upload');
            
            $this->form_validation->set_rules('title', 'Titte','trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'URL','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');
            
            $config['upload_path'] = 'asset/img/banner/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '2048'; //maksimum besar file 2M
            $config['max_width']  = '1288'; //lebar maksimum 1288 px
            $config['max_height']  = '1288'; //tinggi maksimu 768 px
            $config['remove_spaces']  	= TRUE;
            $config['encrypt_name']  	= TRUE;
            $config['image_library'] = 'gd2';
            
            if(!is_dir($config['upload_path'])){
                mkdir($config['upload_path'], 0755, TRUE);
            }
            $this->load->library('image_lib', $config); 

            $this->image_lib->resize();
            $this->upload->initialize($config);
            
            if($_FILES['userfile']['name'])
            {
                if ($this->upload->do_upload('userfile'))
                {
                    $gambar = $this->upload->data();
                    
                    $source          = 'asset/img/banner/'. $gambar['file_name'];
                    $new_destination = 'asset/img/banner/';
                        
                    $this->image_moo->load($source);
                    $this->image_moo->resize_crop(1084, 100);
                    $this->image_moo->save($new_destination .slug($this->input->post('title', TRUE)). '-1000x100-' .$gambar['file_name']);
                    $this->image_moo->resize(240, 70);
                    $this->image_moo->save($new_destination .slug($this->input->post('title', TRUE)). '-240x70-' .$gambar['file_name']);   
                        
                    /* Delete original file to save space */
                    @unlink($source);
                    
                    $id_banner = $this->input->post('id_banner', TRUE);
                    $data = array(
                        'image'             => $gambar['file_name'],
                        'title'             => slug($this->input->post('title', TRUE)),
                        'url'               => $this->input->post('url', TRUE),
                        'last_modified'     => date('Y-m-d H:i:s')
                    );
                    
                    if($data['title'] != NULL)
                    {
                        $res_update = $this->admin_m->update_banner($id_banner, $data);
                        
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data Berhasil Di Update !!</div>");
                        redirect('admin/list-banner');
                        
                    }else{
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Data Belum Lengkap !!</div>");
                        redirect('admin/list-banner');
                    }
                    
                    
                }else{
                    
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Ukuran Gambar Terlalu Besar!!</div>");
                    redirect('admin/list-banner'); 
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Gambar Belum Di Upload!!</div>");
                redirect('admin/list-banner'); 
            }
        }
		
		function hapus_banner($id_banner)
		{
			$where = array('id_banner' => $id_banner);
			$this->admin_m->hapus_banner($where,'banner');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id_banner." Berhasil dihapus !!</div>");
             redirect('admin/list-banner');
		}
        
    }
