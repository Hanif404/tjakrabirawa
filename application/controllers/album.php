<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Album extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('admin_m');
        }
        
        public function add_album()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['album_active_treeview'] = "active";
            $this->data['album_active_add'] = "active";
            $this->data['title'] = "Administrator - Add Album";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-album');
            $this->load->view('element/footer-admin');
        }
        
        public function list_album()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	    $config['base_url'] = base_url().'admin/list-album/page/';
            $config['total_rows'] = $this->admin_m->total_album();
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
            $this->data['album'] = $this->admin_m->detail_album($config['per_page'], $offset);
            
            $this->data['album_active_treeview'] = "active";
            $this->data['album_active_list'] = "active";
            $this->data['title'] = "Administrator - List Album";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/album');
            $this->load->view('element/footer-admin');
        }
        
        public function create_album()
        {
            $this->form_validation->set_rules('judul_album', 'Judul Album','trim|required|xss_clean');
            $this->form_validation->set_rules('kategori', 'Kategori','trim|required|xss_clean');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');
            
            $this->load->library('image_moo');
            $this->load->library('upload');
            
            $config['upload_path'] = 'asset/img/gallery/'.slug($this->input->post('judul_album', TRUE)). "/"; //path folder
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
                    
                    $source          = 'asset/img/gallery/'.slug($this->input->post('judul_album', TRUE)). '/'.$gambar['file_name'];
                    $new_destination = 'asset/img/gallery/'.slug($this->input->post('judul_album', TRUE)). '/';
                        
                    $this->image_moo->load($source);
                    $this->image_moo->resize_crop(448, 299);
                    $this->image_moo->save($new_destination .slug($this->input->post('judul_album', TRUE)). '-448x299' .$gambar['file_name']);
                    $this->image_moo->resize_crop(270, 180);
                    $this->image_moo->save($new_destination .slug($this->input->post('judul_album', TRUE)). '-270x180-' .$gambar['file_name']);
                        
                    /* Delete original file to save space */
                    @unlink($source);
                    
                    $data = array(
                        'photo'             => $gambar['file_name'],
                        'judul_album'       => $this->input->post('judul_album', TRUE),
                        'url_album'         => slug($this->input->post('judul_album', TRUE)),
                        'kategori'          => $this->input->post('kategori', TRUE),
                        'deskripsi'         => $this->input->post('deskripsi', TRUE),
                        'create'            => date('Y-m-d H:i:s')
                    );
                    
                    $res_update = $this->admin_m->add_album($data);
                        
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Album Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-album');
                    
                }else{
                    
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Ukuran Gambar Terlalu Besar !!</div>");
                    redirect('admin/add-album'); 
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Gambar Belum Di Upload!!</div>");
                redirect('admin/add-album'); 
            }
        }
        
        public function edit_album($id_album= FALSE)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            if($id_album == NULL){ redirect('admin/list-album');}
            
            $this->data['album'] = $this->admin_m->get_album_detail($id_album);
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['album_active_treeview'] = "active";
            $this->data['title'] = "Administrator - Edit Album";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-album');
            $this->load->view('element/footer-admin');
        }
        
        public function update_album($id_album = FALSE)
        {
            $this->load->library('image_moo');
            
            $this->form_validation->set_rules('judul_album', 'Judul Album','trim|required|xss_clean');
            $this->form_validation->set_rules('kategori', 'Kategori','trim|required|xss_clean');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi','trim|required|xss_clean');
            
            $this->data['album'] = $this->admin_m->get_one_album($id_album);
            
            if ($this->form_validation->run($this))
            {
                if($_FILES['userfile']['name'])
                {
                    $folder_path = FCPATH . 'asset/img/gallery/'.slug($this->input->post('judul_album', TRUE)). '/';
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
                            @unlink("asset/img/gallery/". $this->data['album']['url_album'] ."/".slug($this->data['album']['judul_album'], 'dash', true)."-448x299-". $this->data['album']['photo']);
                            @unlink("asset/img/gallery/". $this->data['album']['url_album'] ."/".slug($this->data['album']['judul_album'], 'dash', true)."-270x180-". $this->data['album']['photo']);
                                
                        }
                        else
                        {
                            $image = $this->data['album']['photo'];
                        }
                        $source          = 'asset/img/gallery/'.slug($this->input->post('judul_album', TRUE)). '/'.$gambar['file_name'];
                        $new_destination = 'asset/img/gallery/'.slug($this->input->post('judul_album', TRUE)). '/';
                            
                        $this->image_moo->load($source);
                        $this->image_moo->resize_crop(448, 299);
                        $this->image_moo->save($new_destination .slug($this->input->post('judul_album', TRUE)). '-448x299-' .$gambar['file_name']);
                        $this->image_moo->resize_crop(270, 180);
                        $this->image_moo->save($new_destination .slug($this->input->post('judul_album', TRUE)). '-270x180-' .$gambar['file_name']);
                            
                        /* Delete original file to save space */
                        @unlink($source);
                        
                        $res_update = $this->admin_m->update_album($id_album, $this->input->post(NULL, TRUE), $gambar['file_name']);
                        
                        $old_album_name = "asset/img/gallery/".$this->data['album']['url_album'] ."";
						$new_album_name = "asset/img/gallery/". slug($this->input->post('judul_album'), 'dash', true) ."";
						@rename($old_album_name, $new_album_name);
                        
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Album Berhasil Di Update !!</div>");
                        redirect('admin/list-album');
                        
                    }else{
                        
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Ukuran Gambar Terlalu Besar !!</div>");
                        redirect('admin/list-album'); 
                    }
                }else{
                    // Update Album tanpa gambar
                    $this->admin_m->update_album($id_album, $this->input->post(NULL, TRUE), $this->data['album']['photo']);
                    
                    $old_album_name = "asset/img/gallery/". $this->data['album']['url_album'] ."";
					$new_album_name = "asset/img/gallery/". slug($this->input->post('judul_album'), 'dash', true) ."";
					@rename($old_album_name, $new_album_name);
							
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Album Berhasil Di Update !!</div>");
                    redirect('admin/list-album');
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Update Album !!</div>");
                redirect('admin/list-album'); 
            }
        }
		
			function hapus_album($id_album)
		{
			$where = array('id_album' => $id_album);
			$this->admin_m->hapus_album($where,'album');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id_album." Berhasil dihapus !!</div>");
             redirect('admin/list-album');
		}
		
    }
