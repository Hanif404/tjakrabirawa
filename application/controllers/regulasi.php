<?php
    class Regulasi extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('admin_m');
        }
    
        function index()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	    $config['base_url'] = base_url().'admin/list-regulasi/page/';
            $config['total_rows'] = $this->admin_m->total_regulasi();
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
            $this->data['regulasi'] = $this->admin_m->detail_regulasi($config['per_page'], $offset);
            
	    $this->data['regulasi_active_treeview'] = "active";
            $this->data['regulasi_active_list'] = "active";
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['title'] = "Layanan Publikasi";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/regulasi');
            $this->load->view('element/footer-admin');
        }
        
        public function add_regulasi()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['regulasi_active_treeview'] = "active";
            $this->data['regulasi_active_add'] = "active";
            $this->data['title'] = "Administrator - Add Regulasi";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-regulasi');
            $this->load->view('element/footer-admin');
        }
        
        public function create_regulasi()
        {
            $this->form_validation->set_rules('title_regulasi', 'title_layanan','trim|required|xss_clean');
            $this->form_validation->set_rules('kategori', 'kategori','trim|required|xss_clean');
            $this->form_validation->set_rules('deskripsi', 'deskripsi','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');
            
            $this->load->library('image_moo');
            $this->load->library('upload');
            
            $config['upload_path'] = 'asset/img/regulasi/'; //path folder
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
                    
                    $source          = 'asset/img/regulasi/'. $gambar['file_name'];
                    $new_destination = 'asset/img/regulasi/';
                        
                    $this->image_moo->load($source);
                    $this->image_moo->resize(481, 480, true);
                    $this->image_moo->save($new_destination .slug($this->input->post('title_regulasi', TRUE)). '-cover-' .$gambar['file_name']);
                        
                    /* Delete original file to save space */
                    @unlink($source);
                    
                    $data = array(
                        'photo'             => $gambar['file_name'],
                        'title_regulasi'     => $this->input->post('title_regulasi', TRUE),
                        'url_regulasi'       => slug($this->input->post('title_regulasi', TRUE)),
                        'meta_keyword'      => slug($this->input->post('title_regulasi', TRUE)),
                        'meta_description'  => slug($this->input->post('title_regulasi', TRUE)),
                        'kategori'          => $this->input->post('kategori', TRUE),
                        'deskripsi'         => $this->input->post('deskripsi', TRUE),
                        'create'            => date('Y-m-d H:i:s')
                    );
                    
                    $res_update = $this->admin_m->add_regulasi($data);
                        
                    $this->session->set_flashdata("pesan", "<div class=\"callout callout-success\" id=\"alert\">Regulasi Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-regulasi');
                    
                }else{
                    
                    $this->session->set_flashdata("pesan", "<div class=\"callout callout-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Regulasi !!</div>");
                    redirect('admin/add-regulasi'); 
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"callout callout-danger\" id=\"alert\">Gambar Belum Di Upload!!</div>");
                redirect('admin/add-regulasi'); 
            }
        }
        
        public function edit_regulasi($id_regulasi)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            if($id_regulasi == NULL){ show_404();}
            
            $this->data['regulasi'] = $this->admin_m->get_regulasi($id_regulasi);
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['regulasi_active_treeview'] = "active";
            $this->data['title'] = "Administrator - Edit Regulasi";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-regulasi');
            $this->load->view('element/footer-admin');
        }
        
        public function update_regulasi($id_regulasi = false)
        {
            $this->form_validation->set_rules('title_regulasi', 'title_layanan','trim|required|xss_clean');
            $this->form_validation->set_rules('kategori', 'kategori','trim|required|xss_clean');
            $this->form_validation->set_rules('deskripsi', 'deskripsi','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');
            
            $this->data['regulasi'] = $this->admin_m->get_one_regulasi($id_regulasi);
            
            $this->load->library('image_moo');
            $this->load->library('upload');
            
            $config['upload_path'] = 'asset/img/regulasi/'; //path folder
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
                    
                    if ($gambar['file_name'])
                    {
                        $image = $gambar['file_name'];
                        @unlink("asset/img/regulasi/". slug($this->input->post('title_regulasi', TRUE)) ."-cover-". $this->data['regulasi']['photo']);
                            
                    }else
                    {
                        $image = $this->data['regulasi']['photo'];
                    }
                    
                    $source          = 'asset/img/regulasi/'. $gambar['file_name'];
                    $new_destination = 'asset/img/regulasi/';
                        
                    $this->image_moo->load($source);
                    $this->image_moo->resize(481, 480, true);
                    $this->image_moo->save($new_destination .slug($this->input->post('title_regulasi', TRUE)). '-cover-' .$gambar['file_name']);
                        
                    /* Delete original file to save space */
                    @unlink($source);
                    
                    $res_update = $this->admin_m->update_regulasi($id_regulasi, $this->input->post(NULL, TRUE), $gambar['file_name']);
                    
                    $old_album_name = "asset/img/regulasi/". $this->data['regulasi']['url_regulasi'] ."";
                    $new_album_name = "asset/img/regulasi/". slug($this->input->post('title_regulasi', TRUE)) ."";
                    @rename($old_album_name, $new_album_name);
                
                    $this->session->set_flashdata("pesan", "<div class=\"callout callout-success\" id=\"alert\">Regulasi Berhasil Di Update !!</div>");
                    redirect('admin/list-regulasi');
                    
                }else{
                    
                    $this->session->set_flashdata("pesan", "<div class=\"callout callout-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Regulasi !!</div>");
                    redirect('admin/edit-regulasi'); 
                }
            }else{
                
                $this->session->set_flashdata("pesan", "<div class=\"callout callout-danger\" id=\"alert\">Terjadi Kesalahan, Gambar Belum Di Upload !!</div>");
                redirect('admin/edit-regulasi'); 
            }
        }
		
		function hapus_regulasi($id_regulasi)
		{
			$where = array('id_regulasi' => $id_regulasi);
			$this->admin_m->hapus_regulasi($where,'regulasi');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id_regulasi." Berhasil dihapus !!</div>");
             redirect('admin/list-regulasi');
		}
		
    }
