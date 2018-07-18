<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');   
    }
    
    public function index()
	{
		$this->load->view('header');
        $this->load->view('login_view');
        $this->load->view('footer');
	}
    
    
    public function login(){
        
        $this->form_validation->set_rules('txt_username','Username', 'trim|required');
        $this->form_validation->set_rules('txt_password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
            $this->load->view('header');
            $this->load->view('login_view');
            $this->load->view('footer');
        }else{
            
            $username = $this->input->post('txt_username');
            $password = md5($this->input->post('txt_password'));
            
            if($this->User_model->loginUser($username, $password)){
                
                $userInfo = $this->User_model->loginUser($username, $password);
            
                
                    
                
                
                $this->session->set_flashdata('login_msg', '<div class="alert alert-success text-center">Successfully logged in</div>');
                //$this->load->view('header');
                //$this->load->view('tasks_view');
                //$this->load->view('footer');
                redirect('admin_controller/index');
                
            }else{
                $this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
                $this->load->view('header');
                $this->load->view('login_view');
                $this->load->view('footer');
                
            }
        }
    }
    
    function logout(){
		// Logout Code  Here
		$userdata = $this->session->userdata('user_data');	
		
		if(!empty($userdata)){
			$this->User_model->update_log();
			$this->session->unset_userdata('user_data');
		}
		//Redirect to Default Page
		redirect('login_controller/index');
	}
}