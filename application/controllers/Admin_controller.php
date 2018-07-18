<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        
        $this->load->model('User_model');
    }
    
    public function index(){
        
        
        if(isset($_SESSION['id'])){
            // echo $_SESSION['id'];
            $this->load->view('admin/header');
            $this->load->view('admin/admin');
            $this->load->view('admin/footer');
        }else{
            redirect('login_controller/index');
        }
        
    }
    
    public function logout(){
        
        if($this->session->has_userdata('id')){
            //$this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            //unset($_SESSION['user_data']);
            echo $_SESSION['id'];
            redirect('admin_controller');
        }
        
        
    }
}