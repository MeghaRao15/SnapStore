<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Image_model');
		if(!$this->session->userdata('id'))
		return redirect('Loginc');
    }
	public function index()
	{
		$data['pagename'] = "Log-in";
		$this->load->view('login', $data);
	}
	public function dashboard()
	{
		$data['pagename'] = "Dashboard";
		$data['img_list'] = $this->Image_model->get_list();
		$this->load->view('dashboard', $data);
	}
	public function save()
	{
		$reponse = $this->Image_model->save();
		if($reponse)
		{
			echo "success";
		}else{
			echo "fail";
		}
	}
	public function delete(){
		$respose = $this->Image_model->delteimg();
		if($respose){
			return redirect('Welcome/dashboard', 'refresh');
		}else{
			echo  "Data not deleted!";
		}

	}
	
}
