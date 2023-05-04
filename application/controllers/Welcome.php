<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('staff_model');
	}

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function insert()
	{
		if($this->input->is_ajax_request()) 
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('phone','Phone','required');

			if($this->form_validation->run == FALSE)
			  {
			     $data = array('responce' => 'error' , 'message' =>validation_errors());
			  }
			  else
			  {
				$ajax_data =$this->input->post();

				   if($this->staff_model->insert($ajax_data)){
					$data = array('responce' => 'success' , 'message' =>'data Added');

				   }else{
					$data = array('responce' => 'error' , 'message' =>'data not Added');

				   }
				
			  }
		} else{
			echo "no";
		}

		echo json_encode($data);
	}



	public function fetch(){
		if($this->input->is_ajax_request()){
			$posts = $this ->staff_model->get_entries();
			echo json_encode($posts);
		}
	}
}
