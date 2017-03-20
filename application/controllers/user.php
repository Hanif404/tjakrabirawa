<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('admin_m');
	}

	public function index()
	{
		if($this->session->userdata('SESS_ADMIN') != TRUE){ redirect('admin/login-page'); }
		$id_admin = $this->session->userdata('ADMIN_ID');

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$config['base_url'] = base_url().'admin/list-user/page/';
		$config['total_rows'] = $this->user_m->total_user();
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
		$this->data['user'] = $this->user_m->getlist($config['per_page'], $offset);

		$this->data['user_active_treeview'] = "active";
		$this->data['user_active_list'] = "active";
		$this->data['title'] = "Administrator - List User";
		$this->load->view('element/admin',$this->data);
		$this->load->view('pages/admin/user');
		$this->load->view('element/footer-admin');
	}

	public function form_user($id = "")
	{
		$this->data['user_active_treeview'] = "active";
		$this->data['user_active_add'] = "active";
		if($id){
				$this->data['detail'] = $this->user_m->detail($id);
				$this->data['title'] = "Ubah Pengguna";
		}else{
				$this->data['title'] = "Tambah Pengguna";
		}
		$this->load->view('element/admin',$this->data);
		$this->load->view('pages/admin/form-user');
		$this->load->view('element/footer-admin');
	}

	public function action_user()
	{
		$this->load->library('upload');

		$id = $this->input->post('id_admin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$temp = $this->input->post('temp_foto');
		$submit = $this->input->post('submit');
		if ($submit)
		{
			$title_pesan = 'tambah';

			$config['upload_path'] = 'asset/img/user/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['max_width']  = '1588'; //lebar maksimum 1588 px
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

							if($id){
								$title_pesan = 'ubah';
								$data = $this->user_m->detail($id);
								if($data[0]['password'] != $password){
									$password = sha1($password);
								}
								$source = 'asset/img/user/'. $temp;
								@unlink($source);

								$data = array(
										'username'    => $username,
										'password'    => sha1($password),
										'email'       => $email,
										'foto'      	=> $gambar['file_name']
								);
								$this->user_m->update($id, $data);
							}else{
								$data = array(
										'username'    => $username,
										'password'    => sha1($password),
										'email'       => $email,
										'level'       => 'user',
										'foto'      	=> $gambar['file_name']
								);
								$this->user_m->create($data);
							}
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Pengguna Berhasil Di".$title_pesan." !!</div>");
							redirect('admin/list-user');
						}else{
								$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Terjadi Kesalahan, Gagal Menyimpan Pengguna !!</div>");
								redirect('admin/add-user');
						}
				}else{
						$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Gambar Belum Di Upload!!</div>");
						redirect('admin/add-user');
				}
		}else{
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Gagal submit!!</div>");
			redirect('admin/add-user');
		}
	}

	public function hapus_user($id){
		$data = $this->user_m->detail($id);
		$source = 'asset/img/user/'. $data[0]['foto'];
		@unlink($source);

		$this->user_m->remove($id);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data dengan ID ".$id." Berhasil dihapus !!</div>");
	 	redirect('admin/list-user');
	}
}
