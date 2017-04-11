<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Home_m extends CI_Model {

	function get_menu()
	{
	    $this->db->select('id_menu, menu, parent_id, isi_menu, menu_order');
	    $this->db->from('menu_website');
	    $this->db->order_by('id_menu', 'asc');
	    $result = $this->db->get();

	    if ($result->num_rows() > 0) return $result->result_array();
	    return false;
	}

	function getMenu($parent,$hasil)
	{
	    $w = $this->db->query("SELECT * from menu_website where parent_id='".$parent."' order by menu_order");
        foreach($w->result() as $h)
        {
            $cek_parent=$this->db->query("SELECT * from menu_website WHERE parent_id=".$h->id_menu."");
			if(($cek_parent->num_rows())>0)
			{
                $hasil .= '<li><a href="#">'.$h->isi_menu.'</a>';
            }
			else
			{
                $hasil.='<li><a href="'.base_url().'pages/'.$h->id_menu.'/'.$h->menu.'">'.$h->isi_menu.'</a></li>';
            }
                $hasil .='<ul class="sub-menu">';
                $hasil = $this->getMenu($h->id_menu,$hasil);
                $hasil .='</ul>';
                $hasil .= "</li></li>";
         }
         return str_replace('<ul></ul>','',$hasil);
	}

	//===================== ambil data home =================== //
			function get_slider()
        {
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'slider','active'=>'active'));
            $this->db->limit(5, 0);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }


		function get_tentang()
        {
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'tentang','active'=>'active'));
            $this->db->limit(1, 0);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

		function get_news($params = array())
        {
          $strquery = "select atk.id, atk.title,  atk.url, atk.meta_keyword, atk.meta_description, atk.isi_berita, atk.kategori , atk.album_id, atk.posisi, atk.active, atk.author, atk.photo, atk.create, atk.last_modified, ad.id_admin, ad.username, ad.password, ad.email, ad.level, ad.foto, ad.last_login, time_format(timediff(now(),atk.last_modified),'%H') AS hour_post, time_format(timediff(now(),atk.last_modified),'%i') AS min_post ";
          $strquery .= "from artikel atk ";
          $strquery .= "left join admin ad on ad.id_admin = atk.author ";
          $strquery .= "where kategori = 'news' and active = 'active' ";
          $strquery .= "order by id desc ";

           if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
              $strquery .= "limit  ".$params['start'].",".$params['limit'];
           }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
              $strquery .= "limit  ".$params['limit'];
           }

	    $res = $this->db->query($strquery);

	    return ($res->num_rows() > 0)?$res->result_array():FALSE;
        }

		function get_csr()
        {
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'csr','active'=>'active'));
            $this->db->limit(4, 0);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

        function get_service()
            {
                $this->db->select('id, title, photo, isi_berita');
    	    $this->db->from('artikel');
    	    $this->db->where(array('kategori'=> 'service','active'=>'active'));
                $this->db->limit(4, 0);
    	    $this->db->order_by('id', 'desc');
    	    $res = $this->db->get();

    	    if ($res->num_rows() > 0) return $res->result_array();
    	    return false;
            }


		// ============================================ //
	public function read($id_menu)
	{
        $this->db->where('id_menu',$id_menu);
        $sql_menu=$this->db->get('menu_website');
        if($sql_menu->num_rows()==1)
		{
            return $sql_menu->row_array();
        }
    }

	// =========================== Home Model ======================== //

	function get_identity()
	{
	    $this->db->select('id, title, meta_keyword, meta_description, url');
	    $this->db->from('artikel');
	    $this->db->limit(1,0);

	    $this->db->order_by('id', 'desc');

	    $result = $this->db->get();

	    if ($result->num_rows() > 0) return $result->row_array();
	    return false;
	}

	function get_headline()
	{
		$this->db->select('url, title, isi_berita, active, kategori, meta_keyword, meta_description, photo, DATE_FORMAT(artikel.create, "%Y-%m-%d") AS date_only, YEAR(artikel.create) AS year, DATE_FORMAT(artikel.create, "%m") AS month', false);
		$this->db->from('artikel');
		$this->db->where(array('posisi'=>'headline','active'=>'active'));
		$this->db->limit(6,0);
		$this->db->order_by('id', 'desc');

		$result = $this->db->get();

		if ($result->num_rows() > 0) return $result->result_array();
		return false;
	}

        function get_headline_kategori()
	{
		$this->db->select('url, title, isi_berita, kategori, meta_keyword, photo, DATE_FORMAT(artikel.create, "%Y-%m-%d") AS tanggal_posting, YEAR(artikel.create) AS year, DATE_FORMAT(artikel.create, "%m") AS month', false);
		$this->db->from('artikel');
		$this->db->where(array('posisi'=>'headline','active'=>'active'));
		$this->db->limit(5, 0);
		$this->db->order_by('id', 'desc');

		$result = $this->db->get();

		if ($result->num_rows() > 0) return $result->result_array();
		return false;
	}

        function get_berita_kategori()
	{
		$this->db->select('url, title, isi_berita, kategori, meta_keyword, photo, DATE_FORMAT(artikel.create, "%Y-%m-%d") AS tanggal_posting, YEAR(artikel.create) AS year, DATE_FORMAT(artikel.create, "%m") AS month', false);
		$this->db->from('artikel');
		$this->db->where(array('kategori'=>'berita','active'=>'active'));
		$this->db->limit(5, 0);
		$this->db->order_by('id', 'desc');

		$result = $this->db->get();

		if ($result->num_rows() > 0) return $result->result_array();
		return false;
	}

        function get_pengumuman_kategori()
	{
		$this->db->select('url, title, isi_berita, kategori, meta_keyword, photo, DATE_FORMAT(artikel.create, "%Y-%m-%d") AS tanggal_posting, YEAR(artikel.create) AS year, DATE_FORMAT(artikel.create, "%m") AS month', false);
		$this->db->from('artikel');
		$this->db->where(array('kategori'=>'pengumuman','active'=>'active'));
		$this->db->limit(5, 0);
		$this->db->order_by('id', 'desc');

		$result = $this->db->get();

		if ($result->num_rows() > 0) return $result->result_array();
		return false;
	}

        function get_artikel_kategori()
	{
		$this->db->select('url, title, isi_berita, kategori, meta_keyword, photo, DATE_FORMAT(artikel.create, "%Y-%m-%d") AS tanggal_posting, YEAR(artikel.create) AS year, DATE_FORMAT(artikel.create, "%m") AS month', false);
		$this->db->from('artikel');
		$this->db->where(array('kategori'=>'artikel','active'=>'active'));
		$this->db->limit(5, 0);
		$this->db->order_by('id', 'desc');

		$result = $this->db->get();

		if ($result->num_rows() > 0) return $result->result_array();
		return false;
	}

        function detail($slug = '')
	{
		$this->db->select('id, url, title, meta_keyword, active, isi_berita, meta_description, kategori, posisi, author, photo, DATE_FORMAT(artikel.create, "%d/%m/%Y") AS tanggal_posting, YEAR(artikel.create) AS year, DATE_FORMAT(artikel.create, "%m") AS month, DATE_FORMAT(artikel.create, "%d") AS day', false);
		$this->db->from('artikel');
		$this->db->where(array(
			'url' => $slug,
			'active'=>'active'
		));

		$res = $this->db->get();

		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}

		//========== agenda detail ============ //

	function detailberita($id)
{
	 $this->db->select('*');
   $this->db->from('artikel at');
   $this->db->join('admin ad', 'ad.id_admin = at.author', 'left');
	    $this->db->where(array('id'=> $id));
$res = $this->db->get();

			return ($res->num_rows() > 0)?$res->result_array():FALSE;
}


	function detailcsr($id)
{
	 $this->db->select('*');
	    $this->db->from('artikel');
	    $this->db->where(array('id'=> $id));
$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
}
	// ================================= Banner Model =============================== //

        function get_banner()
        {
            $this->db->select('*');
	    $this->db->from('banner');
	    $this->db->order_by('id_banner', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

        function get_banner_sidebar()
        {
            $this->db->select('*');
	    $this->db->from('banner');
            $this->db->limit(4, 0);
	    $this->db->order_by('id_banner', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	// ============================================== Album Gallery Model ================================== //

        function detail_album()
        {
            $this->db->select('a.id_galleri, a.album_id, a.jdl_gallery, a.keterangan, a.gbr_gallery, a.url_galleri, b.id_album, b.judul_album, b.kategori, b.url_album');
	    $this->db->from('galleri a');
            $this->db->join('album b','b.id_album=a.album_id','LEFT');
            $this->db->limit(5, 0);
	    $this->db->order_by('a.id_galleri', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

        function total_galleri()
        {
            return $this->db->count_all_results('galleri');
        }

	function list_galleri()
        {
            $this->db->select('a.id_galleri, a.album_id, a.jdl_gallery, a.keterangan, a.gbr_gallery, a.url_galleri, b.id_album, b.judul_album, b.kategori, b.url_album');
	    $this->db->from('galleri a');
            $this->db->join('album b','b.id_album=a.album_id','LEFT');
            $this->db->limit(10, 0);
	    $this->db->order_by('a.id_galleri', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

        function galleri($per_page, $offset)
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

        function galleri_detail($album_id = '', $url_galleri = '')
        {
            $this->db->select('a.id_galleri, a.album_id, a.jdl_gallery, a.keterangan, a.gbr_gallery, a.url_galleri, b.id_album, b.judul_album, b.kategori, b.url_album');
	    $this->db->from('galleri a');
            $this->db->join('album b','b.id_album=a.album_id','LEFT');
            $this->db->where(array('a.album_id'=> $album_id, 'a.url_galleri' => $url_galleri));
	    $this->db->order_by('a.id_galleri', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	function galleri_berita($album_id = '')
        {
            $this->db->select('a.id_album, a.judul_album, a.kategori, a.url_album, b.title, b.meta_keyword, b.meta_description, b.isi_berita, b.album_id, b.active, b.create, b.author');
	    $this->db->from('album a');
            $this->db->join('artikel b','b.album_id=a.id_album','LEFT');
            $this->db->where(array('b.album_id'=> $album_id,'b.active'=>'active'));
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->row_array();
	    return false;
        }

		function get_static_page($id_menu = false)
		{
			$this->db->select('a.id_pages, a.title_pages, a.url_pages, a.isi_pages, a.gambar, a.menu_id, b.id_menu, b.menu, b.isi_menu');
			$this->db->from('page_static a');
            $this->db->join('menu_website b','b.id_menu=a.menu_id','LEFT');
            $this->db->where('a.menu_id', $id_menu);
			$this->db->order_by('a.id_pages', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->row_array();
			return false;
		}

	// =============================================== Berita Model ============================== //

	function get_berita($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'berita','active'=>'active'));
            $this->db->limit($per_page, $offset);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	function total_berita()
        {
	    $this->db->where('kategori', 'berita');
            return $this->db->count_all_results('artikel');
        }

	// =============================================== Artikel Model ============================== //

	function total_artikel()
        {
	    $this->db->where('kategori', 'artikel');
            return $this->db->count_all_results('artikel');
        }

	function get_artikel($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'artikel','active'=>'active'));
            $this->db->limit($per_page, $offset);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	// =============================================== publikasi Model ============================== //

	function total_publikasi()
        {
	    $this->db->where('kategori', 'publikasi');
            return $this->db->count_all_results('artikel');
        }

	function get_publikasi($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'publikasi','active'=>'active'));
            $this->db->limit($per_page, $offset);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	function list_publikasi()
        {
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'publikasi','active'=>'active'));
            $this->db->limit(5, 0);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	function main_publikasi()
        {
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'publikasi','active'=>'active'));
            $this->db->limit(2, 0);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	// =============================================== pengumuman Model ============================== //

	function total_pengumuman()
        {
	    $this->db->where('kategori', 'pengumuman');
            return $this->db->count_all_results('artikel');
        }

	function get_pengumuman($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'pengumuman','active'=>'active'));
            $this->db->limit($per_page, $offset);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	function list_pengumuman()
        {
            $this->db->select('id, title, url, photo, kategori, create, isi_berita');
	    $this->db->from('artikel');
	    $this->db->where(array('kategori'=> 'pengumuman','active'=>'active'));
            $this->db->limit(5, 0);
	    $this->db->order_by('id', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
        }

	// =============================================== Layanan Model ============================== //

	function total_layanan()
        {
            return $this->db->count_all_results('layanan');
        }

	function main_layanan()
	{
	    $this->db->select('id_layanan, title_layanan, url_layanan, meta_keyword, meta_description, deskripsi, photo');
	    $this->db->from('layanan');
            $this->db->limit(6, 0);
	    $this->db->order_by('id_layanan', 'desc');
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false;
	}

  function lis_agenda()
        {
            $this->db->select('*');
			$this->db->from('agenda');
			$this->db->limit(2, 0);
			$this->db->order_by('id_agenda', 'desc');
			$res = $this->db->get();
			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		 function lis_agenda_detail()
        {
            $this->db->select('*');
			$this->db->from('agenda');
			$this->db->limit(15, 0);
			$this->db->order_by('id_agenda', 'desc');
			$res = $this->db->get();
			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

			 function lis_download()
        {
            $this->db->select('*');
			$this->db->from('download');
			$this->db->limit(15, 0);
			$this->db->order_by('id_download', 'desc');
			$res = $this->db->get();
			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

	function layanan($per_page, $offset)
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

	function layanan_detail($id_layanan = '', $url_layanan = '')
        {
            $this->db->select('id_layanan, title_layanan, url_layanan, meta_keyword, meta_description, deskripsi, photo');
	    $this->db->from('layanan');
            $this->db->where(array('id_layanan'=> $id_layanan, 'url_layanan' => $url_layanan));
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->row_array();
	    return false;
        }

	// =============================================== Regulasi Model ============================== //

	function total_regulasi()
        {
            return $this->db->count_all_results('regulasi');
        }

		function get_regulasi_undang_undang($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id_regulasi, title_regulasi, url_regulasi, photo, meta_keyword, meta_description, deskripsi, create, kategori');
			$this->db->from('regulasi');
			$this->db->where('kategori', 'undang-undang');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_regulasi', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function get_regulasi_peraturan_pemerintah($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id_regulasi, title_regulasi, url_regulasi, photo, meta_keyword, meta_description, deskripsi, create, kategori');
			$this->db->from('regulasi');
			$this->db->where('kategori', 'peraturan-pemerintah');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_regulasi', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function get_regulasi_keputusan_presiden($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id_regulasi, title_regulasi, url_regulasi, photo, meta_keyword, meta_description, deskripsi, create, kategori');
			$this->db->from('regulasi');
			$this->db->where('kategori', 'keputusan-presiden');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_regulasi', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function get_regulasi_peraturan_mentri($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id_regulasi, title_regulasi, url_regulasi, photo, meta_keyword, meta_description, deskripsi, create, kategori');
			$this->db->from('regulasi');
			$this->db->where('kategori', 'peraturan-mentri');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_regulasi', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

		function get_regulasi_keputusan_mentri($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id_regulasi, title_regulasi, url_regulasi, photo, meta_keyword, meta_description, deskripsi, create, kategori');
			$this->db->from('regulasi');
			$this->db->where('kategori', 'keputusan-mentri');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_regulasi', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
		}

		function get_regulasi_keputusan_dirjen($per_page, $offset)
        {
            if ($offset != 0) $offset = ($offset-1) * $per_page;
            $this->db->select('id_regulasi, title_regulasi, url_regulasi, photo, meta_keyword, meta_description, deskripsi, create, kategori');
			$this->db->from('regulasi');
			$this->db->where('kategori', 'keputusan-dirjen');
            $this->db->limit($per_page, $offset);
			$this->db->order_by('id_regulasi', 'desc');
			$res = $this->db->get();

			if ($res->num_rows() > 0) return $res->result_array();
			return false;
        }

	function regulasi_detail($id_regulasi = '', $url_regulasi = '')
        {
            $this->db->select('id_regulasi, title_regulasi, url_regulasi, meta_keyword, meta_description, deskripsi, photo');
	    $this->db->from('regulasi');
            $this->db->where(array('id_regulasi'=> $id_regulasi, 'url_regulasi' => $url_regulasi));
	    $res = $this->db->get();

	    if ($res->num_rows() > 0) return $res->row_array();
	    return false;
        }

	function total_row_search($keyword = false)
	{
	    $searchTerms = explode('+', $keyword);

	    $this->db->where('active', 'active');
	    foreach($searchTerms as $term)
	    {
		$this->db->like('isi_berita', urldecode($term), 'both');
		$this->db->or_like('title', urldecode($term), 'both');
		$this->db->or_like('meta_keyword', urldecode($term));
	    }
	    return $this->db->count_all_results('artikel');
	}

	function search_result($search_query = '', $offset = 0)
	{
		$searchTerms = explode('+', $search_query);

		$this->db->select('meta_keyword, title, isi_berita, photo, url, create');
		$this->db->from('artikel');
		$this->db->where(array('active'=>'active'));

		foreach($searchTerms as $term)
		{
			//echo $term.'<br>';
			$this->db->like('isi_berita', urldecode($term), 'both');
			$this->db->or_like('title', urldecode($term), 'both');
			$this->db->or_like('meta_keyword', urldecode($term));
		} //die;
		$this->db->order_by('id', 'desc');
		$this->db->limit(4, $offset);

		$res = $this->db->get();

		if ($res->num_rows() > 0) return $res->result_array();
		return false;

	    /**
	    foreach($searchTerms as $term)
	    {
		$res = $this->db->query('SELECT artikel.meta_keyword, artikel.title, artikel.isi_berita, artikel.photo FROM artikel WHERE `title` LIKE "%'.urldecode($keyword).'%" OR `isi_berita` LIKE "%'.urldecode($term).'%" order by case when title LIKE "%'.urldecode($term).'%" then 1 when isi_berita LIKE "%'.urldecode($term).'%" then 2 else 3 end LIMIT 10 OFFSET '.$offset.'');
	    }

	    if ($res->num_rows() > 0) return $res->result_array();
	    return false; */
	}
}

/* End of file home_m.php */
/* Location: ./application/modules/home/models/home_m.php */
