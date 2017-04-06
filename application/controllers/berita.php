<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Berita extends CI_Controller
    {

        function __construct(){
            parent::__construct();
            $this->load->model('admin_m');
        }

        public function list_berita()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');

            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	    $config['base_url'] = base_url().'admin/list-berita/page/';
            $config['total_rows'] = $this->admin_m->total_berita();
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
            $this->data['berita'] = $this->admin_m->detail_berita($config['per_page'], $offset);

            $this->data['berita_active_treeview'] = "active";
            $this->data['berita_active_list'] = "active";
            $this->data['title'] = "Administrator - List Berita";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/berita');
            $this->load->view('element/footer-admin');
        }

        public function add_berita()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');

            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['album'] = $this->admin_m->get_album();
            $this->data['berita_active_treeview'] = "active";
            $this->data['berita_active_add'] = "active";
            $this->data['title'] = "Administrator - Add Berita";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-berita');
            $this->load->view('element/footer-admin');
        }

        public function create_berita()
        {
            $this->form_validation->set_rules('album_id', 'Album Id','trim|required|xss_clean');
            $this->form_validation->set_rules('title', 'Titte','trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'Url','trim|required|xss_clean');
            //$this->form_validation->set_rules('kategori', 'Kategori','trim|required|xss_clean');
            //$this->form_validation->set_rules('posisi', 'Posisi','trim|required|xss_clean');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');

            $this->load->library('image_moo');
            $this->load->library('upload');

            $config['upload_path'] = 'asset/img/artikel/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            //$config['max_size'] = '2048'; //maksimum besar file 2M
            //$config['max_width']  = '1588'; //lebar maksimum 1588 px
            //$config['max_height']  = '1288'; //tinggi maksimu 768 px
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

                    $source          = 'asset/img/artikel/'. $gambar['file_name'];
                    $new_destination = 'asset/img/artikel/';

                    //$this->image_moo->load($source);
		                //$this->image_moo->save($new_destination .slug($this->input->post('title', TRUE)). '-' .$gambar['file_name']);
                    /* Delete original file to save space */
                    //@unlink($source);

                    $data = array(
                        'photo'             => $gambar['file_name'],
                        'album_id'          => $this->input->post('album_id', TRUE),
                        'title'             => $this->input->post('title', TRUE),
                        'url'               => slug($this->input->post('title', TRUE)),
                        'meta_keyword'      => $this->input->post('title', TRUE),
                        'meta_description'  => $this->input->post('title', TRUE),
                        'author'            => $this->session->userdata('ADMIN_ID'),
                        'kategori'          => 'news', //$this->input->post('kategori', TRUE),
                        'posisi'            => 'headline', //$this->input->post('posisi', TRUE),
                        'isi_berita'        => $this->input->post('isi_berita'),
                        'posisi'            => $this->input->post('posisi', TRUE),
                        'active'            => 'active',
                        'create'            => date('Y-m-d H:i:s'),
                        'last_modified'            => date('Y-m-d H:i:s')
                    );
                    $res_update = $this->admin_m->add_berita($data);

                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Berita Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-berita');
                }else{
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Berita !!<br/>".$this->upload->display_errors()."</div>");
                    redirect('admin/add-berita');
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Gambar Belum Di Upload!!</div>");
                redirect('admin/add-berita');
            }
        }

        public function edit_berita($id)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            if($id == NULL){ redirect('admin/list-berita');}

            $this->data['berita'] = $this->admin_m->get_berita($id);
            $this->data['album'] = $this->admin_m->get_album();
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['berita_active_treeview'] = "active";
            $this->data['berita_active_add'] = "active";
            $this->data['title'] = "Administrator - Edit Berita";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-berita');
            $this->load->view('element/footer-admin');
        }

        public function update_berita()
        {
            $this->form_validation->set_rules('album_id', 'Album Id','trim|required|xss_clean');
            $this->form_validation->set_rules('title', 'Titte','trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'Url','trim|required|xss_clean');
            //$this->form_validation->set_rules('kategori', 'Kategori','trim|required|xss_clean');
            //$this->form_validation->set_rules('posisi', 'Posisi','trim|required|xss_clean');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');

            $this->load->library('image_moo');
            $this->load->library('upload');

            $config['upload_path'] = 'asset/img/artikel/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            //$config['max_size'] = '2048'; //maksimum besar file 2M
            //$config['max_width']  = '1588'; //lebar maksimum 1588 px
            //$config['max_height']  = '1288'; //tinggi maksimu 768 px
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

                    $source          = 'asset/img/artikel/'. $gambar['file_name'];
                    $new_destination = 'asset/img/artikel/';

                    //$this->image_moo->load($source);
                    //@unlink($source);

                    $id_berita = $this->input->post('id', TRUE);

                    $data = array(
                        'photo'             => $gambar['file_name'],
                        'album_id'          => $this->input->post('album_id', TRUE),
                        'title'             => $this->input->post('title', TRUE),
                        'url'               => slug($this->input->post('title', TRUE)),
                        'meta_keyword'      => $this->input->post('title', TRUE),
                        'meta_description'  => $this->input->post('title', TRUE),
                        'author'            => $this->session->userdata('ADMIN_ID'),
                        'kategori'          => 'news', //$this->input->post('kategori', TRUE),
                        'posisi'            => 'headline', //$this->input->post('posisi', TRUE),
                        'isi_berita'        => $this->input->post('isi_berita', TRUE),
                        'active'            => 'active',
                        'last_modified'            => date('Y-m-d H:i:s')
                    );
                    $res_update = $this->admin_m->update_berita($id_berita, $data);
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Berita Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-berita');
                }else{
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Berita !!</div>");
                    redirect('admin/list-berita');
                }
            }else{
					         $id_berita = $this->input->post('id', TRUE);

                    $data = array(
                        'album_id'          => $this->input->post('album_id', TRUE),
                        'title'             => $this->input->post('title', TRUE),
                        'url'               => slug($this->input->post('title', TRUE)),
                        'meta_keyword'      => $this->input->post('title', TRUE),
                        'meta_description'  => $this->input->post('title', TRUE),
                        'kategori'          => 'news', //$this->input->post('kategori', TRUE),
                        'posisi'            => 'headline', //$this->input->post('posisi', TRUE),
                        'isi_berita'        => $this->input->post('isi_berita', TRUE),
                        'active'            => 'active',
                        'last_modified'            => date('Y-m-d H:i:s')
                    );
                    $res_update = $this->admin_m->update_berita($id_berita, $data);

                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Berita Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-berita');
            }
        }

		function hapus_berita($id_berita)
		{
			$where = array('id' => $id_berita);
			$this->admin_m->hapus_banner($where,'artikel');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id_berita." Berhasil dihapus !!</div>");
             redirect('admin/list-berita');
		}

    }
