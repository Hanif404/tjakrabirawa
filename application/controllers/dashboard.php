<?php
    class Dashboard extends CI_Controller
    {

        function __construct(){
            parent::__construct();
            $this->load->model('home_m');
            $this->load->library('Ajax_pagination');
            $this->perPage = 2;
        }

        function index()
        {
          $this->data['blogData'] = $this->listblog();

          $this->data['trainingData'] = $this->home_m->main_layanan();
    			$this->data['slider'] = $this->home_m->get_slider();
    			$this->data['tentang'] = $this->home_m->get_tentang();
    			$this->data['service'] = $this->home_m->get_service();
            $this->load->view('pages/dashboard',$this->data);
        }


		function detailberita()
		{
      $id = $this->input->post('artikelid');
      $data['detailBlog'] = $this->home_m->detailberita($id);
      $this->load->view('pages/ajax-detailblog', $data, false);
		}

			function detailcsr()
		{
			$id=$this->uri->segment(3);
			$this->data['csrlist'] = $this->home_m->get_csr();
			$this->data['csr']=$this->home_m->detailcsr($id);
			 $this->load->view('element/v_header');
            $this->load->view('pages/detail-csr',$this->data);
			$this->load->view('element/v_footer_artikel');
		}

		 function downloadfile()
			{
				$this->load->helper('download');
				$file=$this->uri->segment(3);
			$this->load->helper('download');
$name = $file;
$data = file_get_contents('asset/file/download/'.$file);
force_download($name, $data);
			force_download($name,$data);


			}

      function listblog(){
        //total rows count
        $totalRec = count($this->home_m->get_news());

        //pagination configuration
        $config['target']      = '#blogList';
        $config['base_url']    = base_url().'dashboard/ajaxPaginationData';
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
        $config['base_url']    = base_url().'dashboard/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['blogData'] = $this->home_m->get_news(array('start'=>$offset,'limit'=>$this->perPage));

        //load the view
        $this->load->view('pages/ajax-blog', $data, false);
    }

    }
