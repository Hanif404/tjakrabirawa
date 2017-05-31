<?php
class Blog extends CI_Controller{

  function __construct(){
      parent::__construct();
      $this->load->model('home_m');
      $this->load->library('Ajax_pagination');
      $this->perPage = 2;
  }

  function index(){
    $this->data['blogData'] = $this->listblog();
    $this->data['active'] = 'active';
    $this->load->view('pages/blog/home',$this->data);
  }

  function listblog(){
    //total rows count
    $totalRec = count($this->home_m->get_news());

    //pagination configuration
    $config['target']      = '#blogList';
    $config['base_url']    = base_url().'blog/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);

    return $this->home_m->get_news(array('limit'=>$this->perPage));
  }

  function ajaxPaginationData(){
    $page = $this->input->post('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    //total rows count
    $totalRec = count($this->home_m->get_news());

    //pagination configuration
    $config['target']      = '#blogList';
    $config['base_url']    = base_url().'blog/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);

    //get the posts data
    $data['blogData'] = $this->home_m->get_news(array('start'=>$offset,'limit'=>$this->perPage));

    //load the view
    $this->load->view('pages/ajax-blog', $data, false);
  }

  function detailblog($id){
    $this->data['detailBlog'] = $this->home_m->detailberita($id);
    $this->load->view('pages/blog/detail',$this->data);
  }
}
?>
