<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Website extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->model('admin_m');
        }
        
        public function list_menu()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
			$config['base_url'] = base_url().'admin/list-menu-website/page/';
            $config['total_rows'] = $this->admin_m->total_menu();
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
            $this->data['menu_website'] = $this->admin_m->detail_menu_website($config['per_page'], $offset);
            
            $this->data['website_active_treeview'] = "active";
            $this->data['website_active_list_menu'] = "active";
            $this->data['title'] = "Administrator - List Menu Website";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/website');
            $this->load->view('element/footer-admin');
        }
        
        public function add_menu()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['class'] = $this->admin_m->get_class_menu();
            $this->data['website_active_treeview'] = "active";
            $this->data['website_active_add_menu'] = "active";
            $this->data['title'] = "Administrator - Add Menu Website";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-menu-website');
            $this->load->view('element/footer-admin');
        }
        
        public function create()
        {
            $this->form_validation->set_rules('isi_menu', 'Title Menu','trim|required|xss_clean');
            $this->form_validation->set_rules('menu', 'menu','trim|required|xss_clean');
            $this->form_validation->set_rules('parent_id', 'Parent','trim|required|xss_clean');
            
            if ($this->form_validation->run($this))
            {
                $data_arry = array(
                    'isi_menu'    => $this->input->post('isi_menu'),
                    'menu'        => $this->input->post('menu'),
                    'parent_id'   => $this->input->post('parent_id'),
                );
                
                $res_update = $this->admin_m->add_menu_website($data_arry);
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Menu Website Berhasil Di Tambahkan !!</div>");
                redirect('admin/list-menu-website');
                
            }else{
                    
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Menu Website !!</div>");
                redirect('admin/add-menu-website'); 
            }
        }
        
        public function edit_menu($id_menu = false, $isi_menu = false)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            if($id_menu == NULL || $isi_menu == NULL){ redirect('admin/list-menu-website');}
            
            $id_admin = $this->session->userdata('ADMIN_ID');
            $this->data['menu'] = $this->admin_m->get_detail_menu($id_menu);
            $this->data['class'] = $this->admin_m->get_class_menu();
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['website_active_treeview'] = "active";
            $this->data['title'] = "Administrator - Edit Menu Website";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-menu-website');
            $this->load->view('element/footer-admin');
        }
		
		function hapus_menu($id_menu)
		{
			$where = array('id_menu' => $id_menu);
			$this->admin_m->hapus_menu($where,'menu_website');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id_menu." Berhasil dihapus !!</div>");
             redirect('admin/list-menu-website');
		}
		
        
        public function update($id_menu = false, $title_menu = false)
        {
            $this->form_validation->set_rules('isi_menu', 'Title Menu','trim|required|xss_clean');
            $this->form_validation->set_rules('menu', 'menu','trim|required|xss_clean');
            $this->form_validation->set_rules('parent_id', 'Parent','trim|required|xss_clean');
            
            if ($this->form_validation->run($this))
            {
                $data_arry = array(
                    'isi_menu'  => $this->input->post('isi_menu'),
                    'menu'      => $this->input->post('menu'),
                    'parent_id' => $this->input->post('parent_id')
                );
                
                $res_update = $this->admin_m->update_menu_website($id_menu, $data_arry);
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Menu Website Berhasil Di Tambahkan !!</div>");
                redirect('admin/list-menu-website');
                
            }else{
                    
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Menu Website !!</div>");
                redirect('admin/list-menu-website'); 
            }
        }
        
        public function add_page()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['menu'] = $this->admin_m->get_menu();
            $this->data['website_active_treeview'] = "active";
            $this->data['website_active_add_static'] = "active";
            $this->data['title'] = "Administrator - Add Static Pages";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-static-page');
            $this->load->view('element/footer-admin');
        }
        
        public function list_page()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
			$config['base_url'] = base_url().'admin/list-static-page/page/';
            $config['total_rows'] = $this->admin_m->total_pages();
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
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['website'] = $this->admin_m->detail_pages($config['per_page'], $offset);
            $this->data['sort_number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
            
            $this->data['website_active_treeview'] = "active";
            $this->data['website_active_list_static'] = "active";
            $this->data['title'] = "Administrator - List Static Pages";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/pages-website');
            $this->load->view('element/footer-admin');
        }
        
        public function create_page()
        {
            $this->load->library('image_moo');
            
            $this->form_validation->set_rules('active_page', 'Active','trim|required|xss_clean');
            $this->form_validation->set_rules('menu_id', 'Menu ID','trim|required|xss_clean');
            $this->form_validation->set_rules('title_pages', 'Title','trim|required|xss_clean');
            $this->form_validation->set_rules('isi_pages', 'Isi','trim|required|xss_clean');
            
            $this->load->library('upload');
            
            $config['upload_path'] = 'asset/img/page_statis/'.$this->input->post('menu_id', TRUE). '/'; //path folder
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
            
            if ($this->form_validation->run($this))
            {
                if($_FILES['userfile']['name'])
                {
                    
                    if ($this->upload->do_upload('userfile'))
                    {
                        
                        $gambar = $this->upload->data();
                    
                        $source          = 'asset/img/page_statis/'.$this->input->post('menu_id', TRUE). '/'.$gambar['file_name'];
                        $new_destination = 'asset/img/page_statis/'.$this->input->post('menu_id', TRUE). '/';
                            
                        $this->image_moo->load($source);
                        $this->image_moo->resize_crop(448, 299);
                        $this->image_moo->save($new_destination .slug($this->input->post('title_pages', TRUE)). '-448x299-' .$gambar['file_name']);
                        $this->image_moo->resize_crop(270, 180);
                        $this->image_moo->save($new_destination .slug($this->input->post('title_pages', TRUE)). '-270x180-' .$gambar['file_name']);
                            
                        /* Delete original file to save space */
                        @unlink($source);
                        
                        $data_arry = array(
                            'gambar'             => $gambar['file_name'],
                            'active_page'        => $this->input->post('active_page'),
                            'menu_id'            => $this->input->post('menu_id'),
                            'url_pages'          => slug($this->input->post('title_pages')),
                            'title_pages'        => $this->input->post('title_pages'),
                            'isi_pages'          => $this->input->post('isi_pages')
                        );
                        
                        $res_update = $this->admin_m->add_pages($data_arry);
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Halaman Website Berhasil Di Tambahkan !!</div>");
                        redirect('admin/list-static-page');
                    }else{
                    
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Ukuran Gambar Melebihi Maximal !!</div>");
                        redirect('admin/add-static-page'); 
                    }
                }else{
                    
                    $data_arry = array(
                        'active_page'        => $this->input->post('active_page'),
                        'menu_id'            => $this->input->post('menu_id'),
                        'url_pages'          => slug($this->input->post('title_pages')),
                        'title_pages'        => $this->input->post('title_pages'),
                        'isi_pages'          => $this->input->post('isi_pages')
                    );
                        
                    $res_update = $this->admin_m->add_pages($data_arry);
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Halaman Website Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-static-page');
                }
            }else{
                    
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Data Tidak Boleh Kosong !!</div>");
                redirect('admin/add-static-page'); 
            }
        }
        
        public function edit_page($id_pages = false, $title_pages = false)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            if($id_pages == NULL || $title_pages == NULL){ redirect('admin/list-static-page');}
            
            $id_admin = $this->session->userdata('ADMIN_ID');
            $this->data['menu'] = $this->admin_m->get_menu();
            $this->data['pages'] = $this->admin_m->get_pages($id_pages);
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['website_active_treeview'] = "active";
            $this->data['title'] = "Administrator - Edit Static Pages";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-static-page');
            $this->load->view('element/footer-admin');
        }
        
        public function update_page($id_pages = false, $title_pages = false)
        {
            $this->load->library('image_moo');
            
            $this->form_validation->set_rules('active_page', 'Active','trim|required|xss_clean');
            $this->form_validation->set_rules('menu_id', 'Menu ID','trim|required|xss_clean');
            $this->form_validation->set_rules('title_pages', 'Title','trim|required|xss_clean');
            $this->form_validation->set_rules('isi_pages', 'Isi','trim|required|xss_clean');
            
            $this->data['gambar'] = $this->admin_m->get_one_gambar($id_pages);
            
            if ($this->form_validation->run($this))
            {
                if($_FILES['userfile']['name'])
                {
                    $folder_path = FCPATH . 'asset/img/page_statis/'.$this->input->post('menu_id', TRUE). '/';
                    if(isset($_FILES['userfile']) && ! is_dir($folder_path))
                    {
                        mkdir($folder_path, 0755, TRUE);
                    }
                    $config['upload_path'] = $folder_path;; //path folder
                    $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
                    $config['max_size'] = '2048'; //maksimum besar file 2M
                    $config['max_width']  = '1288'; //lebar maksimum 1288 px
                    $config['max_height']  = '1288'; //tinggi maksimu 768 px
                    $config['remove_spaces']  	= TRUE;
                    $config['encrypt_name']  	= TRUE;
                    
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload('userfile'))
                    {
                        $gambar = $this->upload->data();
                        if ($gambar['file_name'])
                        {
                            $image = $gambar['file_name'];
                            @unlink("asset/img/page_statis/". $this->data['gambar']['menu_id'] ."/".slug($this->data['gambar']['url_pages'], 'dash', true)."-448x299-". $this->data['gambar']['gambar']);
                            @unlink("asset/img/page_statis/". $this->data['gambar']['menu_id'] ."/".slug($this->data['gambar']['url_pages'], 'dash', true)."-270x180-". $this->data['gambar']['gambar']);
                                
                        }
                        else
                        {
                            $image = $this->data['gambar']['gambar'];
                        }
                        
                        $source          = 'asset/img/page_statis/'.$this->input->post('menu_id', TRUE). '/'.$gambar['file_name'];
                        $new_destination = 'asset/img/page_statis/'.$this->input->post('menu_id', TRUE). '/';
                            
                        $this->image_moo->load($source);
                        $this->image_moo->resize_crop(448, 299);
                        $this->image_moo->save($new_destination .slug($this->input->post('title_pages', TRUE)). '-448x299-' .$gambar['file_name']);
                        $this->image_moo->resize_crop(270, 180);
                        $this->image_moo->save($new_destination .slug($this->input->post('title_pages', TRUE)). '-270x180-' .$gambar['file_name']);
                            
                        /* Delete original file to save space */
                        @unlink($source);
                        
                        $res_update = $this->admin_m->edit_pages($id_pages, $this->input->post(NULL, TRUE), $gambar['file_name']);
                        
                        $old_album_name = "asset/img/page_statis/".$this->data['gambar']['menu_id'] ."";
						$new_album_name = "asset/img/page_statis/".$this->input->post('menu_id',true) ."";
						@rename($old_album_name, $new_album_name);
                        
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Halaman Website Berhasil Di Tambahkan !!</div>");
                        redirect('admin/list-static-page');
                    }else{
                    
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Ukuran Gambar Melebihi Maximal !!</div>");
                        redirect('admin/list-static-page'); 
                    }
                }else{
                    $res_update = $this->admin_m->edit_pages($id_pages, $this->input->post(NULL, TRUE));
					
					$old_album_name = "asset/img/page_statis/".$this->data['gambar']['menu_id'] ."";
					$new_album_name = "asset/img/page_statis/".$this->input->post('menu_id',true) ."";
					@rename($old_album_name, $new_album_name);
					
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Halaman Website Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-static-page'); 
                }
            }else{
                    
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Data Tidak Boleh Kosong !!</div>");
                redirect('admin/list-static-page'); 
            }
        }
		
		function hapus_static($id_pages)
		{
			$where = array('id_pages' => $id_pages);
			$this->admin_m->hapus_static_page($where,'page_static');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id_pages." Berhasil dihapus !!</div>");
            redirect('admin/list-static-page'); 
		}
    }

