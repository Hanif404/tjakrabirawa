<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class Download extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('admin_m');
        }
        
        function list_download()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	    $config['base_url'] = base_url().'admin/agenda/page/';
            $config['total_rows'] = $this->admin_m->total_download();
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
            $this->data['download'] = $this->admin_m->detail_download($config['per_page'], $offset);
            
            $this->data['agenda_active_treeview'] = "active";
            $this->data['agenda_active_list'] = "active";
            $this->data['title'] = "Administrator - List Agenda";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/download');
            $this->load->view('element/footer-admin');
        }
        
        public function add_download()
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['agenda_active_treeview'] = "active";
            $this->data['agenda_active_add'] = "active";
            $this->data['title'] = "Administrator - Add Download";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/add-download');
            $this->load->view('element/footer-admin');
        }
        
        public function create_download()
        {
            
           $config['upload_path'] = 'asset/file/download/'; //path folder
            $config['allowed_types'] = 'pdf|zip|zipx|rar|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_width']  = '0';
            $config['max_height']  = '0';
            $config['max_size'] = '8048';
            
         
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('userfile'))
                {
                    $file = $this->upload->data();
                    
                    $data = array(
                        'nama_file'       => $this->input->post('nama_file', TRUE),
                        'file'              => $file['file_name'],
                        'create'            => date('Y-m-d H:i:s')
                    );
                    
                    if($data['nama_file'] != NULL)
                    {
                        $res_update = $this->admin_m->add_download($data);
                        
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data Berhasil Ditambahkan !!</div>");
                        redirect('admin/download');
                        
                    }else{
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Data Belum Lengkap !!</div>");
                        redirect('admin/add-download');
                    }
                    
                    
                }else{
                    
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Data Gagal Ditambahkan!!</div>");
                    redirect('admin/add-download'); 
                }
        
            }
			
			
		function hapus_download($id_download)
		{
			$where = array('id_download' => $id_download);
			$this->admin_m->hapus_download($where,'download');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id_download." Berhasil dihapus !!</div>");
             redirect('admin/download');
		}
        
        public function edit_agenda($id_agenda)
        {
            if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
            $id_admin = $this->session->userdata('ADMIN_ID');
            if($id_agenda == NULL){ redirect('admin/agenda');}
            
            $this->data['agenda'] = $this->admin_m->get_agenda($id_agenda);
            $this->data['admin'] = $this->admin_m->account_admin($id_admin);
            $this->data['agenda_active_treeview'] = "active";
            $this->data['agenda_active_add'] = "active";
            $this->data['title'] = "Administrator - Add Agenda";
            $this->load->view('element/admin',$this->data);
            $this->load->view('pages/admin/edit-agenda');
            $this->load->view('element/footer-admin');
        }
        
        public function update_agenda()
        {
            $id_agenda = $this->input->post('id_agenda', TRUE);
            $this->form_validation->set_rules('start_date', 'Waktu Mulai','trim|required|xss_clean');
            $this->form_validation->set_rules('end_date', 'Waktu Akhir','trim|required|xss_clean');
            $this->form_validation->set_rules('nama_agenda', 'Nama Agenda','trim|required|xss_clean');
            $this->form_validation->set_rules('jadwal_kegiatan', 'Jadwal Kegiatan','trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'File','trim|required|xss_clean');
            
            $config['upload_path'] = 'asset/file/agenda/'; //path folder
            $config['allowed_types'] = 'pdf|zip'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_width']  = '0';
            $config['max_height']  = '0';
            $config['max_size'] = '8048'; //maksimum besar file 2M
            $config['remove_spaces']  	= TRUE;
            $config['encrypt_name']  	= TRUE;
            
            if(!is_dir($config['upload_path'])){
                mkdir($config['upload_path'], 0755, TRUE);
            }
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if($_FILES['userfile']['name'])
            {
                if ($this->upload->do_upload('userfile'))
                {
                    $file = $this->upload->data();
                    
                    $data = array(
                        'file'              => $file['file_name'],
                        'start_date'        => $this->input->post('start_date', TRUE),
                        'end_date'          => $this->input->post('end_date', TRUE),
                        'nama_agenda'       => $this->input->post('nama_agenda', TRUE),
                        'url_agenda'        => slug($this->input->post('nama_agenda', TRUE)),
                        'jadwal_kegiatan'   => $this->input->post('jadwal_kegiatan', TRUE),
                        'create'            => date('Y-m-d H:i:s')
                    );
                    
                    if($data['start_date'] != NULL && $data['end_date'] != NULL && $data['nama_agenda'] != NULL && $data['jadwal_kegiatan'] != NULL)
                    {
                        $res_update = $this->admin_m->update_agenda($id_agenda, $data);
                        
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data Berhasil Ditambahkan !!</div>");
                        redirect('admin/agenda');
                        
                    }else{
                        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Data Belum Lengkap !!</div>");
                        redirect('admin/edit-agenda');
                    }
                    
                    
                }else{
                    
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Data Gagal Ditambahkan!!</div>");
                    redirect('admin/edit-agenda'); 
                }
            }else{
                
                $data = array(
                    'start_date'        => $this->input->post('start_date', TRUE),
                    'end_date'          => $this->input->post('end_date', TRUE),
                    'nama_agenda'       => $this->input->post('nama_agenda', TRUE),
                    'url_agenda'        => slug($this->input->post('nama_agenda', TRUE)),
                    'jadwal_kegiatan'   => $this->input->post('jadwal_kegiatan', TRUE),
                    'create'            => date('Y-m-d H:i:s')
                );
                        
                if($data['start_date'] != NULL && $data['end_date'] != NULL && $data['nama_agenda'] != NULL && $data['jadwal_kegiatan'] != NULL)
                {
                    $res_update = $this->admin_m->update_agenda($id_agenda, $data);
                        
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data Berhasil Ditambahkan !!</div>");
                    redirect('admin/agenda');
                    
                }else{
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Data Belum Lengkap !!</div>");
                    redirect('admin/edit-agenda'); 
                }
            }
        }
    }
    
