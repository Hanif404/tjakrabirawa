<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Admin_m extends CI_Model{

        // ============================================ Admin Login Function ============================================ //

        public function cek_admin_account($email = '', $password = '')
        {
            $query = $this->db->get_where('admin', array('email'=>$email, 'password'=>$password));
			return $query;
        }

        function account_admin($id_admin = '')
        {
            $this->db->select('*');
			$this->db->from('admin');
			$this->db->where('id_admin', $id_admin);

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
        }

        // ============================================ Agenda Function ============================================ //

        function total_agenda()
        {
            return $this->db->count_all_results('agenda');
        }

        function detail_agenda($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('agenda');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('create', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function add_agenda($data)
        {
            $query = $this->db->insert('agenda',$data);
            return $query;
        }

        function get_agenda($id_agenda)
        {
            $this->db->select('*');
            $this->db->from('agenda');
            $this->db->where('id_agenda', $id_agenda);

            $res = $this->db->get();

            if ($res->num_rows() > 0) return $res->row_array();
            return false;
        }

        function update_agenda($id_agenda, $data)
        {
            $this->db->where('id_agenda',$id_agenda);
            $update = $this->db->update('agenda', $data);
            return $update;
        }

			function hapus_agenda($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}


        // ============================================ Agenda Function ============================================ //


		// ============================================ Download Function ========================================== //
		 function total_download()
        {
            return $this->db->count_all_results('download');
        }

        function detail_download($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('download');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('create', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function add_download($data)
        {
            $query = $this->db->insert('download',$data);
            return $query;
        }

        function get_download($id_download)
        {
            $this->db->select('*');
            $this->db->from('download');
            $this->db->where('id_download', $id_download);

            $res = $this->db->get();

            if ($res->num_rows() > 0) return $res->row_array();
            return false;
        }

        function update_download($id_download, $data)
        {
            $this->db->where('id_download',$id_download);
            $update = $this->db->update('download', $data);
            return $update;
        }

			function hapus_download($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
		//==================================== end download =============================================//

        function total_banner()
        {
            return $this->db->count_all_results('banner');
        }

        function detail_banner($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('banner');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_banner', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function add_banner($data)
        {
            $query = $this->db->insert('banner',$data);
            return $query;
        }

        function get_banner($id_banner)
        {
            $this->db->select('*');
            $this->db->from('banner');
            $this->db->where('id_banner', $id_banner);

            $res = $this->db->get();

            if ($res->num_rows() > 0) return $res->row_array();
            return false;
        }

        function update_banner($id_banner, $data)
        {
            $this->db->where('id_banner',$id_banner);
            $update = $this->db->update('banner', $data);
            return $update;
        }

			function hapus_banner($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}

        // ============================================ Berita Function ============================================ //

        function total_berita()
        {
            return $this->db->count_all_results('artikel');
        }

        function detail()
		{
			$this->db->select('id, isi_berita', false);
			$this->db->from('artikel');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
		}

        function detail_berita($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('artikel at');
      $this->db->join('admin ad', 'ad.id_admin = at.author', 'left');
      $this->db->where('kategori', 'news');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function detail_service($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('artikel at');
      //$this->db->join('admin ad', 'ad.id_admin = at.author', 'left');
      $this->db->where('kategori', 'service');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function detail_work($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('artikel at');
      $this->db->join('admin ad', 'ad.id_admin = at.author', 'left');
      $this->db->where('kategori', 'work');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function add_berita($data)
        {
            $query = $this->db->insert('artikel',$data);
            return $query;
        }

        function get_berita($id)
        {
            $this->db->select('*');
            $this->db->from('artikel');
            $this->db->where('id', $id);

            $res = $this->db->get();

            if ($res->num_rows() > 0) return $res->row_array();
            return false;
        }

        function update_berita($id_berita, $data)
        {
            $this->db->where('id',$id_berita);
            $update = $this->db->update('artikel', $data);
            return $update;
        }

        // ============================================ Album Function ============================================ //

        function total_album()
        {
            return $this->db->count_all_results('album');
        }

        function detail_album($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('album');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_album', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function add_album($data)
        {
            $query = $this->db->insert('album',$data);
            return $query;
        }

        function get_album_detail($id_album)
        {
            $this->db->select('*');
            $this->db->from('album');
            $this->db->where('id_album', $id_album);

            $res = $this->db->get();

            if ($res->num_rows() > 0) return $res->row_array();
            return false;
        }

        function get_one_album($id_album = false)
		{
			$this->db->select('id_album, judul_album, url_album, kategori, photo, deskripsi');
			$this->db->from('album');
			$this->db->where('id_album', $id_album);
			$this->db->limit(1, 0);

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
		}

        function update_album($id_album = '', $input = '', $image = '')
		{
			$update = $this->db->update('album', array(
				'judul_album'   => $input['judul_album'],
				'url_album'     => slug($input['judul_album'], 'dash', true),
				'kategori'      => $input['kategori'],
				'photo'         => $image,
				'deskripsi'      => $input['deskripsi'],
				'modified'      => date('Y-m-d H:i:s'),
			), 'id_album = '. $id_album);

			return $update;
		}

			function hapus_album($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}

        // ============================================ Galleri Function ============================================ //

        function total_galleri()
        {
            return $this->db->count_all_results('galleri');
        }

        function get_album()
        {
            $this->db->select('id_album,judul_album');
			$this->db->from('album');
			$this->db->order_by('id_album', 'desc');

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function detail_galleri($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('a.id_galleri, a.album_id, a.jdl_gallery, a.keterangan, a.gbr_gallery, a.url_galleri, b.id_album, b.judul_album, b.kategori, b.url_album');
			$this->db->from('galleri a');
            $this->db->join('album b','b.id_album=a.album_id','LEFT');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('a.id_galleri', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

        function get_slug_album($album_id = false)
		{
			$this->db->select('url_album');
			$this->db->from('album');
			$this->db->where('id_album', $album_id);
			$this->db->limit(1, 0);

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
		}

        function add_galleri($data)
        {
            $query = $this->db->insert('galleri',$data);
            return $query;
        }

        function get_galleri_detail($id_galleri)
        {
            $this->db->select('*');
            $this->db->from('galleri');
            $this->db->where('id_galleri', $id_galleri);

            $res = $this->db->get();

            if ($res->num_rows() > 0) return $res->row_array();
            return false;
        }

        function get_one_gallery($id_galleri = false)
		{
			$this->db->select('id_galleri, album_id, jdl_gallery, keterangan, gbr_gallery, url_galleri');
			$this->db->from('galleri');
			$this->db->where('id_galleri', $id_galleri);
			$this->db->limit(1, 0);

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
		}

        function update_gallery($id_galleri = '', $input = '', $image = '')
		{
			$update = $this->db->update('galleri', array(
				'jdl_gallery'   => $input['jdl_gallery'],
				'url_galleri'   => slug($input['jdl_gallery'], 'dash', true),
				'keterangan'    => $input['keterangan'],
				'gbr_gallery'   => $image,
				'modified'      => date('Y-m-d H:i:s'),
			), 'id_galleri = '. $id_galleri);

			return $update;
		}

			function hapus_galleri($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
	// ============================================ Menu Website Function ============================================ //

        function total_menu()
        {
            return $this->db->count_all_results('menu_website');
        }

		function detail_menu_website($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('menu_website');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_menu', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function get_detail_menu($id_menu)
        {
            $this->db->select('*');
            $this->db->from('menu_website');
            $this->db->where('id_menu', $id_menu);

            $res = $this->db->get();

            if ($res->num_rows() > 0) return $res->row_array();
            return false;
        }

		function add_menu_website($data_arry)
        {
            $query = $this->db->insert('menu_website',$data_arry);
            return $query;
        }

		function update_menu_website($id_menu = '', $data_arry ='')
        {
            $this->db->where('id_menu',$id_menu);
            $update = $this->db->update('menu_website', $data_arry);
            return $update;
        }

		function hapus_menu($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
	// ============================================ Static Pages Website Function ============================================ //

		function total_pages()
        {
            return $this->db->count_all_results('page_static');
        }

		function get_menu()
        {
            $this->db->select('id_menu, isi_menu');
			$this->db->from('menu_website');
			$this->db->order_by('id_menu', 'desc');

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function get_class_menu()
        {
            $this->db->select('id_menu, menu, isi_menu');
			$this->db->from('menu_website');
			$this->db->order_by('id_menu', 'asc');

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function detail_pages($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

			$this->db->select('a.id_pages, a.title_pages, a.url_pages, a.isi_pages, a.menu_id, a.active_page, b.menu, b.isi_menu, b.id_menu');
			$this->db->from('page_static a');
			$this->db->join('menu_website b','b.id_menu=a.menu_id', 'LEFT');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('a.id_pages', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function get_pages($id_pages)
        {
	    $this->db->select('id_pages, title_pages, url_pages, isi_pages, menu_id, active_page');
	    $this->db->from('page_static');
	    $this->db->where('id_pages', $id_pages);
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->row_array();
	    return false;
        }

		function get_one_gambar($id_pages = false)
		{
			$this->db->select('id_pages, title_pages, url_pages, isi_pages, menu_id, gambar');
			$this->db->from('page_static');
			$this->db->where('id_pages', $id_pages);
			$this->db->limit(1, 0);

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
		}

		function add_pages($data_arry)
        {
            $query = $this->db->insert('page_static',$data_arry);
            return $query;
        }

		function edit_pages($id_pages = '', $input = '', $image = '')
		{
			$update = $this->db->update('page_static', array(
				'active_page'   => $input['active_page'],
				'url_pages'     => slug($input['title_pages'], 'dash', true),
				'title_pages'   => $input['title_pages'],
				'gambar'        => $image,
				'menu_id'       => $input['menu_id'],
				'isi_pages'     => $input['isi_pages'],
			), 'id_pages = '. $id_pages);

			return $update;
		}


		function hapus_static_page($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
	// ============================================ Layanan Function ============================================ //

		function total_layanan()
        {
            return $this->db->count_all_results('layanan');
        }

		function detail_layanan($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

			$this->db->select('id_layanan, title_layanan, url_layanan, meta_keyword, meta_description, deskripsi, photo');
			$this->db->from('layanan');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_layanan', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function add_layanan($data)
        {
            $query = $this->db->insert('layanan',$data);
            return $query;
        }

		function get_one_layanan($id_layanan = false)
		{
			$this->db->select('id_layanan, title_layanan, url_layanan, photo');
			$this->db->from('layanan');
			$this->db->where('id_layanan', $id_layanan);
			$this->db->limit(1, 0);

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
		}


		function update_layanan($id_layanan = '', $input = '', $image = '')
		{
			$update = $this->db->update('layanan', array(
				'title_layanan'       => $input['title_layanan'],
				'url_layanan'         => slug($input['title_layanan'], 'dash', true),
				'meta_keyword'        => slug($input['title_layanan'], 'dash', true),
				'meta_description'    => slug($input['title_layanan'], 'dash', true),
				//'photo'               => $image,
				//'deskripsi'           => $input['deskripsi'],
			), 'id_layanan = '. $id_layanan);

			return $update;
		}

		function get_layanan($id_layanan)
        {
			$this->db->select('id_layanan, title_layanan, deskripsi, photo');
			$this->db->from('layanan');
			$this->db->where('id_layanan', $id_layanan);
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
        }

	// ============================================ Regulasi Function ============================================ //

		function total_regulasi()
        {
            return $this->db->count_all_results('regulasi');
        }

		function detail_regulasi($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

			$this->db->select('id_regulasi, title_regulasi, url_regulasi, meta_keyword, meta_description, deskripsi, photo');
			$this->db->from('regulasi');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_regulasi', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function add_regulasi($data)
        {
            $query = $this->db->insert('regulasi',$data);
            return $query;
        }

		function get_one_regulasi($id_regulasi = false)
		{
			$this->db->select('id_regulasi, title_regulasi, url_regulasi, photo');
			$this->db->from('regulasi');
			$this->db->where('id_regulasi', $id_regulasi);
			$this->db->limit(1, 0);

			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
		}


		function update_regulasi($id_regulasi = '', $input = '', $image = '')
		{
			$update = $this->db->update('regulasi', array(
				'title_regulasi'       => $input['title_regulasi'],
				'url_regulasi'         => slug($input['title_regulasi'], 'dash', true),
				'meta_keyword'        => slug($input['title_regulasi'], 'dash', true),
				'meta_description'    => slug($input['title_regulasi'], 'dash', true),
				'photo'               => $image,
				'kategori'             => $input['kategori'],
				'deskripsi'           => $input['deskripsi'],
			), 'id_regulasi = '. $id_regulasi);

			return $update;
		}

		function get_regulasi($id_regulasi)
        {
			$this->db->select('id_regulasi, title_regulasi, deskripsi, photo');
			$this->db->from('regulasi');
			$this->db->where('id_regulasi', $id_regulasi);
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
        }

			function hapus_regulasi($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}

	// ======================================== Request Berita Function =============================== //

		function request_berita($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('artikel');
			$this->db->where('active', 'not_active');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function total_request_berita()
        {
		 $this->db->where('active', 'not_active');
            return $this->db->count_all_results('artikel');
        }

		function update_status_berita($id, $data)
        {
            $this->db->where('id',$id);
            $update = $this->db->update('artikel', $data);
            return $update;
        }

		function total_message()
        {
            return $this->db->count_all_results('message');
        }

		function all_message($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;

            $this->db->select('*');
			$this->db->from('message');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

			function hapus_message($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
    }
