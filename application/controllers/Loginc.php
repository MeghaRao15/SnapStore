<?php defined('BASEPATH') or exit('No direct script access allowed');

class Loginc extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $data['pagename'] = "Log-in";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[6]');
        if ($this->form_validation->run()) {
            $uid = $this->Login_model->validate_user();
            if ($uid) {
                $this->load->library('session');
                $this->session->set_userdata('id', $uid[0]);
                return redirect('Welcome/dashboard');
            } else {
                echo "data not exists!";
            }
        } else {
            $this->load->view('login', $data);
        }
    }
    public function sign()
    {
        $data['pagename'] = "Sign-up";
        $this->load->view('signup', $data);
    }
    public function saveuser()
    {
        $data['pagename'] = "Sign-in";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[6]');
        $this->form_validation->set_rules('m_admin_name', 'Name', 'required');
        $this->form_validation->set_rules('m_admin_contact', 'Contact', 'required|max_length[10]');
        if ($this->form_validation->run()) {
            $this->email->from(set_value('email'), set_value('m_admin_name'));
            $this->email->to('megharao15@gmail.come');
            $this->email->subject('Reistration Greeting...');
            $this->email->set_newline('\n\n');
            $this->email->message("Thanku for registration");
            $this->Login_model->saveuser();
            if (!$this->email->send()) {
                show_error($this->email->print_debugger());
            } else {
                echo "Email has been sent!";
            }
        } else {
            $this->load->view('signup', $data);
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->load->view('login', 'refresh');
    }
}
