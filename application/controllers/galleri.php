<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Galleri extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('admin_m');
        }
        
        public function add_galleri()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['album'] = $this->admin_m->get_album();
            $this->data['galleri_active_treeview'] = "active";
            $this->data['galleri_active_add'] = "active";
            $this->data['title'] = "Administrator - Add Galleri";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-galleri');
            $this->load->view('element/footer-admin');
        }
        
        public function list_galleri()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	    $config['base_url'] = base_url().'admin/list-galleri/page/';
            $config['total_rows'] = $this->admin_m->total_galleri();
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
            $this->data['galleri'] = $this->admin_m->detail_galleri($config['per_page'], $offset);
            
            $this->data['galleri_active_treeview'] = "active";
            $this->data['galleri_active_list'] = "active";
            $this->data['title'] = "Administrator - List Galleri";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/galleri');
            $this->load->view('element/footer-admin');
        }
        
        public function create_galleri()
        {
            $this->form_validation->set_rules('album_id', 'Album Id','trim|required|xss_clean');
            $this->form_validation->set_rules('jdl_gallery', 'Judul Galleri','trim|required|xss_clean');
            $this->form_validation->set_rules('keterangan', 'Keterangan','trim|required|xss_clean');
            
            $this->data['album'] = $this->admin_m->get_slug_album($this->input->post('album_id'));
            
            $this->load->library('image_moo');
            
            for($i = 1; $i < @$_FILES['userfile_'.$i]; $i++)
            {
                $folder_path = FCPATH . 'asset/img/gallery/'.$this->data['album']['url_album']. '/';
                if(isset($_FILES['userfile_'.$i]) && ! is_dir($folder_path))
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
                
                if ($this->upload->do_upload('userfile_'.$i)) 
                {
                    $gambar = $this->upload->data();
                    
                    $source          = $folder_path.$gambar['file_name'];
                    $new_destination = $folder_path;
                        
                    $this->image_moo->load($source);
                    $this->image_moo->resize_crop(448, 299);
                    $this->image_moo->save($new_destination .slug($this->input->post('jdl_gallery_'.$i, TRUE)). '-448x299-' .$gambar['file_name']);
                    $this->image_moo->resize_crop(270, 180);
                    $this->image_moo->save($new_destination .slug($this->input->post('jdl_gallery_'.$i, TRUE)). '-270x180-' .$gambar['file_name']);
                        
                    /* Delete original file to save space */
                    @unlink($source);
                    
                    $data = array(
                        'gbr_gallery'       => $gambar['file_name'],
                        'album_id'          => $this->input->post('album_id', TRUE),
                        'jdl_gallery'       => $this->input->post('jdl_gallery_'.$i, TRUE),
                        'url_galleri'       => slug($this->input->post('jdl_gallery_'.$i, TRUE)),
                        'keterangan'        => $this->input->post('keterangan_'.$i, TRUE),
                        'created'           => date('Y-m-d H:i:s')
                    );
                    
                    $res_update = $this->admin_m->add_galleri($data);
                        
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Galleri Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-galleri');
                    
                }else{
                    
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Galleri !!</div>");
                    redirect('admin/add-galleri'); 
                }
            }
        }
        
        public function edit_galleri($id_galleri)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            if($id_galleri == NULL){ redirect('admin/list-galleri');}
            
            $this->data['album'] = $this->admin_m->get_album();
            $this->data['galleri'] = $this->admin_m->get_galleri_detail($id_galleri);
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['galleri_active_treeview'] = "active";
            $this->data['title'] = "Administrator - Edit Album";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-galleri');
            $this->load->view('element/footer-admin');
        }
        
        public function update_galleri($id_galleri = FALSE)
        {
            $this->form_validation->set_rules('jdl_gallery', 'Judul Galleri','trim|required|xss_clean');
            $this->form_validation->set_rules('keterangan', 'Keterangan','trim|required|xss_clean');
            
            $this->data['galleri'] = $this->admin_m->get_one_gallery($id_galleri);
	    $this->data['album'] = $this->admin_m->get_slug_album($this->data['galleri']['album_id']);
            
            $this->load->library('image_moo');
            
            if ($this->form_validation->run($this))
            {
                if($_FILES['userfile']['name'])
                {
                    $folder_path = FCPATH . 'asset/img/gallery/'.$this->data['album']['url_album']. '/';
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
                            @unlink("asset/img/gallery/". $this->data['album']['url_album'] ."/". $this->data['galleri']['gbr_gallery']);
                            @unlink("asset/img/gallery/". $this->data['album']['url_album'] ."/".slug($this->data['galleri']['jdl_gallery'], 'dash', true)."-448x299-". $this->data['galleri']['gbr_gallery']);
                            @unlink("asset/img/gallery/". $this->data['album']['url_album'] ."/".slug($this->data['galleri']['jdl_gallery'], 'dash', true)."-270x180-". $this->data['galleri']['gbr_gallery']);
                            
                        }else
                        {
                            $image = $this->data['galleri']['gbr_gallery'];
                        }
                        
                        $source          = $folder_path.$gambar['file_name'];
                        $new_destination = $folder_path;
                            
                        $this->image_moo->load($source);
                        $this->image_moo->resize_crop(448, 299);
                        $this->image_moo->save($new_destination .slug($this->input->post('jdl_gallery', TRUE)). '-448x299-' .$gambar['file_name']);
                        $this->image_moo->resize_crop(270, 180);
                        $this->image_moo->save($new_destination .slug($this->input->post('jdl_gallery', TRUE)). '-270x180-' .$gambar['file_name']);
                            
                        /* Delete original file to save space */
                        @unlink($source);
                        
                        $res_update = $this->admin_m->update_gallery($id_galleri, $this->input->post(NULL, TRUE), $gambar['file_name']);
                            
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Galleri Berhasil Di Update !!</div>");
                        redirect('admin/list-galleri');
                        
                    }else{
                        
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Update Galleri !!</div>");
                        redirect('admin/edit-galleri'); 
                    }
                }else{
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Gambar Belum Di Upload!!</div>");
                    redirect('admin/edit-galleri'); 
                }
            }else{
                        
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Update Galleri !!</div>");
                redirect('admin/edit-galleri'); 
            }
        }
		
			function hapus_galleri($id_galleri)
		{
			$where = array('id_galleri' => $id_galleri);
			$this->admin_m->hapus_galleri($where,'galleri');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id_galleri." Berhasil dihapus !!</div>");
             redirect('admin/list-album');
		}
		
    }

