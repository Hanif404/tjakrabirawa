<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Contact extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('home_m');
            $this->load->library('email');
        }

        function index()
        {
            $this->data['banner'] = $this->home_m->get_banner();
			$this->data['kategori_berita'] = $this->home_m->get_berita_kategori();
            $this->data['kategori_pengumuman'] = $this->home_m->get_pengumuman_kategori();
            $this->data['kategori_artikel'] = $this->home_m->get_artikel_kategori();
			$this->data['banner_sidebar'] = $this->home_m->get_banner_sidebar();
			$this->data['galleri'] = $this->home_m->list_galleri();
			$this->data['publikasi'] = $this->home_m->list_publikasi();
			$this->data['pengumuman'] = $this->home_m->list_pengumuman();
			$this->data['menu_website'] = $this->home_m->get_menu();
			$this->data['menu_list'] = $this->home_m->getMenu(0,"");

			$this->data['title'] = "Hubungi Kami";
            $this->data['contact_menu'] = "contact";
            $this->load->view('element/v_header_two',$this->data);
            $this->load->view('pages/hubungi-kami');
            $this->load->view('element/v_footer_artikel');
        }

		function create_contact()
		{
			$this->form_validation->set_rules('subtitle', 'Subtitle','trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');
			$this->form_validation->set_rules('subject', 'Subject','trim|required|xss_clean');
			$this->form_validation->set_rules('pesan', 'Pesan','trim|required|xss_clean');

			if($this->form_validation->run($this))
			{
        $subtitle = $this->input->post('subtitle');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $pesan = $this->input->post('pesan');

				$data_arry = array(
          'subtitle' 	=> $this->input->post('subtitle'),
					'email' 		=> $this->input->post('email'),
					'subject' 		=> $this->input->post('subject'),
					'keterangan' 	=> $this->input->post('pesan'),
					'create' 		=> date("Y-m-d H:i:s")
				);

				$this->db->insert('message',$data_arry);
        $this->sendingEmail($email, $subtitle, $subject, $pesan);
        echo "1";
				//$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Terima Kasih <b>".$data_arry['nama_lengkap']."</b> Pesan Anda Berhasil Di Terima !!</div>");
				//redirect('#hub');

			}else{
        echo "0";
				//$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Pesan Gagal Di Terima, Harap Periksa Kembali!!</div>");
				//redirect('#hub');
			}
		}

   function sendingEmail($email, $subtitle, $subject, $pesan){
      // sending to email
			$this->email->clear();

			$config['protocol']    = 'smtp';
			//$config['smtp_host']    = 'ssl://smtp.mail.yahoo.com';
			$config['smtp_host']    = 'ssl://smtp.googlemail.com';
			$config['smtp_port']    = '465';
			$config['smtp_user']    = '';// diisi sesuai dengan alamat mesin pengirim email
			$config['smtp_pass']    = ''; // diisi sesuai dengan password alamat mesin pengirim email
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'text'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$this->email->initialize($config);
			$this->email->from($email, 'Pesan Tjakrabiwara Website');
			$this->email->to('hanif.kharismadini.04@gmail.com'); // diisi sesuai dengan alamat email tujuan

			$this->email->subject($subtitle .' : '. $subject);
			$this->email->message($pesan);
      if($this->email->send())
      {
          log_message('info',"Your email was sent.!");
      } else {
          log_message('error',$this->email->print_debugger());
      }
    }

    function create_training(){
      $this->form_validation->set_rules('name', 'Name','trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');

      if($this->form_validation->run($this))
			{
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $training = $this->input->post('training');
        if(!empty($training)){
          $selectTraining = count($training);
          $i = 1;
          $q = "Nama : ".$name.", Email : ".$email." Training : ";
          foreach($training as $selected){
            if($i==$selectTraining){
              $q .= $selected;
            }else{
              $q .= $selected .", ";
            }
            $i++;
          }
          $this->sendingEmail($email, "Training", "Request Training", $q);
        }
        echo "1";
      }else{
        echo "0";
			}
    }
    }
