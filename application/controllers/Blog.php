<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->model('blog_model',TRUE);
            // $this->load->helper('form');
           // $this->load->helper('url');
       }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->model('blog_model');
        $this->load->library("pagination");


		//load migration library to create database table and fields.
		$this->load->library('migration');
		$data['type'] = 'current';

		if ( ! $this->migration->current())
		{
			show_error($this->migration->error_string());
		}else{
			//echo " Data created - Yay! ";
		}




		$config = array();
        $config["base_url"] = base_url() . "blog/index/";
        $config["total_rows"] = $this->blog_model->record_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["result"] = $this->blog_model->myFunc($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();	
		$this->load->view('welcome_message',$data);
		
	}

	public function add()
	{
		$this->load->view('add_post');
	}
	public function insertpost()
	{
		$this->load->model('blog_model');
		$data['title']=$this->input->post('title');
		$data['description']=$this->input->post('description');
		$data['blogimage'] = $_FILES['blogimage']['name'];
		$result=$this->blog_model->insertblog($data);
		if($result==true)
		{
			redirect(base_url().'welcome','refresh');
		}
	}
	public function edit()
	{
		$this->load->model('blog_model');
		$blog_id=$this->uri->segment(3);
		$data['result']=$this->blog_model->bloginfo($blog_id);
		$this->load->view('edit_post',$data);
	}


	public function updateblog()
	{
		$this->load->model('blog_model');
		$data['title']=$this->input->post('title');
		$data['blog_id']=$this->input->post('blog_id');
		$data['description']=$this->input->post('description');
		$data['blogimage'] = $_FILES['blogimage']['name'];
		$result=$this->blog_model->updateblog($data);
		if($result==true)
		{
			redirect(base_url().'welcome','refresh');	
		}
	}

	function delete()
	{
		$this->load->model('blog_model');
		$blog_id=$this->uri->segment(3);
		$datamsg = $this->blog_model->delete($blog_id);

		$this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "blog/index/";
        $config["total_rows"] = $this->blog_model->record_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["result"] = $this->blog_model->myFunc($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();


		if($datamsg == "Incorrect Id" || empty($blog_id))
		{
			$data['message'] = $datamsg;
			redirect(base_url().'welcome','refresh');
			//redirect($_SERVER['HTTP_REFERER']);
			// $this->load->view('welcome_message',$data);
		}
		else
		{
			$data['message'] = $datamsg;
			redirect(base_url().'welcome','refresh');
			//redirect($_SERVER['HTTP_REFERER']);
			// $this->load->view('welcome_message',$data);
		}


	}


}
