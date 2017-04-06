<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['index\.html'] = "dashboard/home";
$route['default_controller'] = "dashboard";
$route['search/(:any)'] = 'dashboard/search_result/$1';
$route['post-search'] = 'dashboard/post_search';
$route['404_override'] = '';

$route['hubungi-kami\.html'] = "contact";
$route['create-message'] = "contact/create_contact";
$route['create-training'] = "contact/create_training";

$route['e-Perkebunan\.html'] = "dashboard/e_perkebunan";

// ==================================== Admin Route =========================== //

$route['admin/login-page'] = 'admin';
$route['admin/cek-login'] = 'admin/cek_login';
$route['admin/logout'] = 'admin/logout';

$route['admin/edit-status-berita/(:num)'] = 'admin/edit_status_berita/$1';
$route['admin/update-status-berita/(:num)'] = 'admin/update_status_berita/$1';

$route['admin/message'] = 'admin/message';
$route['admin/message/page/(:num)'] = 'admin/message/$1';
$route['admin/hapus-message/(:num)'] = 'admin/hapus_message/$1';

// ==================================== Admin Route =========================== //

$route['blog'] = 'blog';
$route['blog/readmore/(:num)'] = 'blog/detailblog/$1';

// =============== Admin Agenda Route ============ //

$route['admin/agenda'] = 'agenda/list_agenda';
$route['admin/agenda/page/(:num)'] = 'agenda/list_agenda/$1';
$route['admin/add-agenda'] = 'agenda/add_agenda';
$route['admin-create-agenda'] = 'agenda/create_agenda';
$route['admin/edit-agenda/(:num)'] = 'agenda/edit_agenda/$1';
$route['admin-update-agenda'] = 'agenda/update_agenda';
$route['admin/hapus-agenda/(:num)'] = 'agenda/hapus_agenda/$1';

// =============== Admin Banner Route ============ //
$route['admin/list-banner'] = 'banner/list_banner';
$route['admin/list-banner/page/(:num)'] = 'banner/list_banner/$1';
$route['admin/add-banner'] = 'banner/add_banner';
$route['admin/create-banner'] = 'banner/create_banner';
$route['admin/edit-banner/(:num)'] = 'banner/edit_banner/$1';
$route['admin/update-banner'] = 'banner/update_banner';
$route['admin/hapus-banner/(:num)'] = 'banner/hapus_banner/$1';

// =============== Admin Berita Route ============ //
$route['admin/list-berita'] = 'berita/list_berita';
$route['admin/list-berita/page/(:num)'] = 'berita/list_berita/$1';
$route['admin/add-berita'] = 'berita/add_berita';
$route['admin/create-berita'] = 'berita/create_berita';
$route['admin/edit-berita/(:num)'] = 'berita/edit_berita/$1';
$route['admin/update-berita'] = 'berita/update_berita';
$route['admin/hapus-berita/(:num)'] = 'berita/hapus_berita/$1';

// =============== Admin Work Route ============ //
$route['admin/list-work'] = 'work/list_work';
$route['admin/list-work/page/(:num)'] = 'work/list_work/$1';
$route['admin/add-work'] = 'work/add_work';
$route['admin/create-work'] = 'work/create_work';
$route['admin/edit-work/(:num)'] = 'work/edit_work/$1';
$route['admin/update-work'] = 'work/update_work';
$route['admin/hapus-work/(:num)'] = 'work/hapus_work/$1';

// =============== Admin User Management ============ //
$route['admin/list-user'] = 'user';
$route['admin/list-user/page/(:num)'] = 'user/$1';
$route['admin/add-user'] = 'user/form_user';
$route['admin/edit-user/(:num)'] = 'user/form_user/$1';
$route['admin/modif-user'] = 'user/action_user';
$route['admin/hapus-user/(:num)'] = 'user/hapus_user/$1';

// =============== Admin Add Album ============ //
$route['admin/add-album'] = 'album/add_album';
$route['admin/list-album'] = 'album/list_album';
$route['admin/list-album/page/(:num)'] = 'album/list_album/$1';
$route['admin/create-album'] = 'album/create_album';
$route['admin/edit-album/(:num)'] = 'album/edit_album/$1';
$route['admin/update-album/(:num)'] = 'album/update_album/$1';
$route['admin/hapus-album/(:num)'] = 'album/hapus_album/$1';

// =============== Admin Add Galleri ============ //
$route['admin/add-galleri'] = 'galleri/add_galleri';
$route['admin/list-galleri'] = 'galleri/list_galleri';
$route['admin/list-galleri/page/(:num)'] = 'galleri/list_galleri/$1';
$route['admin/create-galleri'] = 'galleri/create_galleri';
$route['admin/edit-galleri/(:num)'] = 'galleri/edit_galleri/$1';
$route['admin/update-galleri/(:num)'] = 'galleri/update_galleri/$1';
$route['admin/hapus-galleri/(:num)'] = 'galleri/hapus_galleri/$1';

// =============== Admin Download Route ============ //
$route['admin/list-download'] = 'download/list_download';
$route['admin/download'] = 'download/list_download';
$route['admin/list-download/page/(:num)'] = 'download/list_download/$1';
$route['admin/add-download'] = 'download/add_download';
$route['admin-create-download'] = 'download/create_download';
$route['admin/hapus-download/(:num)'] = 'download/hapus_download/$1';


// =============== Admin Static Web Pages ============ //
$route['admin/list-menu-website'] = 'website/list_menu';
$route['admin/list-menu-website/page/(:num)'] = 'website/list_menu/$1';
$route['admin/add-menu-website'] = 'website/add_menu';
$route['admin/create-menu-website'] = 'website/create';
$route['admin/edit-menu-website/(:num)/([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'website/edit_menu/$1/$2';
$route['admin/update-menu-website/(:num)/([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'website/update/$1/$2';
$route['admin/hapus-menu/(:num)'] = 'website/hapus_menu/$1';
$route['admin/list-static-page'] = 'website/list_page';
$route['admin/list-static-page/page/(:num)'] = 'website/list_page/$1';
$route['admin/add-static-page'] = 'website/add_page';
$route['admin/create-static-page'] = 'website/create_page';
$route['admin/edit-static-page/(:num)/([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'website/edit_page/$1/$2';
$route['admin/update-static-page/(:num)/([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'website/update_page/$1/$2';
$route['admin/hapus-static-page/(:num)'] = 'website/hapus_static/$1';

// ==================================== Admin Layanan Route =============================== //

$route['admin/list-layanan'] = 'layanan';
$route['admin/list-layanan/page/(:num)'] = 'layanan/$1';

$route['admin/add-layanan'] = 'layanan/add_layanan';
$route['admin/create-layanan'] = 'layanan/create_layanan';

$route['admin/edit-layanan/(:num)'] = 'layanan/edit_layanan/$1';
$route['admin/update-layanan/(:num)'] = 'layanan/update_layanan/$1';


// ==================================== Admin Regulasi Route =============================== //

$route['admin/list-regulasi'] = 'regulasi';
$route['admin/list-regulasi/page/(:num)'] = 'regulasi/$1';

$route['admin/add-regulasi'] = 'regulasi/add_regulasi';
$route['admin/create-regulasi'] = 'regulasi/create_regulasi';

$route['admin/edit-regulasi/(:num)'] = 'regulasi/edit_regulasi/$1';
$route['admin/update-regulasi/(:num)'] = 'regulasi/update_regulasi/$1';
$route['admin/hapus-regulasi/(:num)'] = 'regulasi/hapus_regulasi/$1';

// ==================================== End Admin Route =========================== //

// ==================================== Home Static Page Route =============================== //

$route['pages/(:num)/([A-Za-z0-9][A-Za-z0-9_-]{2,254})\.html'] = 'dashboard/static_page/$1/$2';
$route['peta-situs'] = 'dashboard/peta_situs';

//===================================== Agenda route ================================ //
$route['agenda'] = 'dashboard/agenda';

//===================================== Hubungi route ================================ //
$route['hubungi'] = 'dashboard/hubungi';

//===================================== Hubungi route ================================ //
$route['download'] = 'dashboard/download';

// ==================================== Galleri Route =============================== //

$route['galleri'] = 'dashboard/galleri';
$route['galleri/page/'] = 'dashboard/galleri/$1';
$route['galleri/detail/(:num)/([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'dashboard/detail_galleri/$1/$2';

// ==================================== Berita Route =============================== //

$route['berita'] = 'dashboard/list_berita';
$route['berita/page/(:num)'] = 'dashboard/list_berita/$1';

// ==================================== work Route =============================== //

$route['work'] = 'dashboard/list_work';
$route['work/page/(:num)'] = 'dashboard/list_work/$1';

// ==================================== Artikel Route =============================== //
$route['artikel'] = 'dashboard/list_artikel';
$route['artikel/page/(:num)'] = 'dashboard/list_artikel/$1';

// ==================================== publikasi Route =============================== //
$route['publikasi'] = 'dashboard/list_publikasi';
$route['publikasi/page/(:num)'] = 'dashboard/list_publikasi/$1';

// ==================================== pengumuman Route =============================== //
$route['pengumuman'] = 'dashboard/list_pengumuman';
$route['pengumuman/page/(:num)'] = 'dashboard/list_pengumuman/$1';

$route['([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'dashboard/detail/$1';

// ============== Static Page Route ================= //

$route['visi-dan-misi'] = 'dashboard/visi_misi';

// ==================================== Layanan Route =============================== //

$route['layanan'] = 'dashboard/layanan';
$route['layanan/page/'] = 'dashboard/layanan/$1';
$route['layanan/detail/(:num)/([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'dashboard/detail_layanan/$1/$2';

// ==================================== Layanan Route =============================== //

$route['regulasi'] = 'dashboard/regulasi';
$route['regulasi/page/'] = 'dashboard/regulasi/$1';
$route['regulasi/detail/(:num)/([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'dashboard/detail_regulasi/$1/$2';

$route['regulasi/kategori/undang-undang\.html'] = 'dashboard/regulasi_undang_undang';
$route['regulasi/kategori/peraturan-pemerintah\.html'] = 'dashboard/regulasi_peraturan_pemerintah';
$route['regulasi/kategori/keputusan-presiden\.html'] = 'dashboard/regulasi_keputusan_presiden';
$route['regulasi/kategori/peraturan-mentri\.html'] = 'dashboard/regulasi_peraturan_mentri';
$route['regulasi/kategori/keputusan-mentri\.html'] = 'dashboard/regulasi_keputusan_mentri';
$route['regulasi/kategori/keputusan-dirjen\.html'] = 'dashboard/regulasi_keputusan_dirjen';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
