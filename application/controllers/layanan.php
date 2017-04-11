<?php
    class Layanan extends CI_Controller
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
	    $config['base_url'] = base_url().'admin/list-training/page/';
            $config['total_rows'] = $this->admin_m->total_layanan();
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
            $this->data['layanan'] = $this->admin_m->detail_layanan($config['per_page'], $offset);

	    $this->data['training_active_treeview'] = "active";
            $this->data['training_active_list'] = "active";
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['title'] = "Training";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/layanan');
            $this->load->view('element/footer-admin');
        }

        public function add_layanan()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');

            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['training_active_treeview'] = "active";
            $this->data['training_active_add'] = "active";
            $this->data['title'] = "Administrator - Add Training";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-layanan');
            $this->load->view('element/footer-admin');
        }

        public function create_layanan()
        {
            $this->form_validation->set_rules('title_layanan', 'title_layanan','trim|required|xss_clean');
            //$this->form_validation->set_rules('deskripsi', 'deskripsi','trim|required|xss_clean');
            //$this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');

            //$this->load->library('image_moo');
            //$this->load->library('upload');

            //$config['upload_path'] = 'asset/img/layanan/'; //path folder
            //$config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            //$config['max_size'] = '2048'; //maksimum besar file 2M
            //$config['max_width']  = '1288'; //lebar maksimum 1288 px
            //$config['max_height']  = '1288'; //tinggi maksimu 768 px
            //$config['remove_spaces']  	= TRUE;
            //$config['encrypt_name']  	= TRUE;
            //$config['image_library'] = 'gd2';

            //if(!is_dir($config['upload_path'])){
            //    mkdir($config['upload_path'], 0755, TRUE);
            //}
            //$this->load->library('image_lib', $config);

            //$this->image_lib->resize();
            //$this->upload->initialize($config);

            //if($_FILES['userfile']['name'])
            //{
            //    if ($this->upload->do_upload('userfile'))
            //    {
            //        $gambar = $this->upload->data();

            //        $source          = 'asset/img/layanan/'. $gambar['file_name'];
            //        $new_destination = 'asset/img/layanan/';

            //        $this->image_moo->load($source);
            //        $this->image_moo->resize(481, 480, true);
            //        $this->image_moo->save($new_destination .slug($this->input->post('title_layanan', TRUE)). '-cover-' .$gambar['file_name']);

                    /* Delete original file to save space */
            //        @unlink($source);

                    $data = array(
                        //'photo'             => $gambar['file_name'],
                        'photo'             => '',
                        'title_layanan'     => $this->input->post('title_layanan', TRUE),
                        'url_layanan'       => slug($this->input->post('title_layanan', TRUE)),
                        'meta_keyword'      => slug($this->input->post('title_layanan', TRUE)),
                        'meta_description'  => slug($this->input->post('title_layanan', TRUE)),
                        'deskripsi'         => '',
                        //'deskripsi'         => $this->input->post('deskripsi', TRUE),
                        'create'            => date('Y-m-d H:i:s')
                    );

                    $res_update = $this->admin_m->add_layanan($data);

                    $this->session->set_flashdata("pesan", "<div class=\"callout callout-success\" id=\"alert\">Training Berhasil Di Tambahkan !!</div>");
                    redirect('admin/list-layanan');

          //      }else{

          //          $this->session->set_flashdata("pesan", "<div class=\"callout callout-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Layanan !!</div>");
          //          redirect('admin/add-layanan');
          //      }
          //  }else{
          //      $this->session->set_flashdata("pesan", "<div class=\"callout callout-danger\" id=\"alert\">Gambar Belum Di Upload!!</div>");
          //      redirect('admin/add-layanan');
          //  }
        }

        public function edit_layanan($id_layanan)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            if($id_layanan == NULL){ show_404();}

            $this->data['layanan'] = $this->admin_m->get_layanan($id_layanan);
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['training_active_treeview'] = "active";
            $this->data['title'] = "Administrator - Edit Layanan";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-layanan');
            $this->load->view('element/footer-admin');
        }

        public function update_layanan($id_layanan = false)
        {
            $this->form_validation->set_rules('title_layanan', 'title_layanan','trim|required|xss_clean');
            $this->form_validation->set_rules('deskripsi', 'deskripsi','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image','trim|required|xss_clean');

            $this->data['layanan'] = $this->admin_m->get_one_layanan($id_layanan);

            //$this->load->library('image_moo');
            //$this->load->library('upload');

            //$config['upload_path'] = 'asset/img/layanan/'; //path folder
            //$config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            //$config['max_size'] = '2048'; //maksimum besar file 2M
            //$config['max_width']  = '1288'; //lebar maksimum 1288 px
            //$config['max_height']  = '1288'; //tinggi maksimu 768 px
            //$config['remove_spaces']  	= TRUE;
            //$config['encrypt_name']  	= TRUE;
            //$config['image_library'] = 'gd2';

            //if(!is_dir($config['upload_path'])){
            //    mkdir($config['upload_path'], 0755, TRUE);
            //}
            //$this->load->library('image_lib', $config);

            //$this->image_lib->resize();
            //$this->upload->initialize($config);

            //if($_FILES['userfile']['name'])
            //{
            //    if ($this->upload->do_upload('userfile'))
            //    {
            //        $gambar = $this->upload->data();

            //        if ($gambar['file_name'])
            //        {
            //            $image = $gambar['file_name'];
            //            @unlink("asset/img/layanan/". slug($this->input->post('title_layanan', TRUE)) ."-cover-". $this->data['layanan']['photo']);

            //        }else
            //        {
            //            $image = $this->data['layanan']['photo'];
            //        }

            //        $source          = 'asset/img/layanan/'. $gambar['file_name'];
            //        $new_destination = 'asset/img/layanan/';

            //        $this->image_moo->load($source);
            //        $this->image_moo->resize(481, 480, true);
            //        $this->image_moo->save($new_destination .slug($this->input->post('title_layanan', TRUE)). '-cover-' .$gambar['file_name']);

                    /* Delete original file to save space */
            //        @unlink($source);

                    $res_update = $this->admin_m->update_layanan($id_layanan, $this->input->post(NULL, TRUE), "");//$gambar['file_name']);

            //        $old_album_name = "asset/img/layanan/". $this->data['layanan']['url_layanan'] ."";
            //        $new_album_name = "asset/img/layanan/". slug($this->input->post('title_layanan', TRUE)) ."";
            //        @rename($old_album_name, $new_album_name);

                    $this->session->set_flashdata("pesan", "<div class=\"callout callout-success\" id=\"alert\">Training Berhasil Di Update !!</div>");
                    redirect('admin/list-training');

            //    }else{

            //        $this->session->set_flashdata("pesan", "<div class=\"callout callout-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Layanan !!</div>");
            //        redirect('admin/edit-layanan');
            //    }
            //}else{

            //    $this->session->set_flashdata("pesan", "<div class=\"callout callout-danger\" id=\"alert\">Terjadi Kesalahan, Gambar Belum Di Upload !!</div>");
            //    redirect('admin/edit-layanan');
            //}
        }
    }
