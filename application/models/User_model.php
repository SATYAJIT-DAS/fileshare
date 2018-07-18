<?php

class User_Model extends CI_Model{

    function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    //insert employee details to employee table
    public function insertUser($data){
        
        return $this->db->insert('user',$data);
      
    }
    public function get_users()
     {
          return $this->db->get("user");
     }
    public function loginUser($username, $password){
        //$this->db->where(array('username' = >$username, 'password' => $password));
        // var_dump($password);die();
        $query = $this->db->get_where('user', array('name' => $username, 'password' => $password));   
        
        if($query->num_rows() == 1){
            
            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0] = $row->id;
                $userArr[1] = $row->name;
                $userArr[2] = $row->user_type;
                
            }
           $userData = array(
                'id' => $userArr[0],
                'name' => $userArr[1],
                'user_type' => $userArr[2],
                'logged_in'=> TRUE
            );
            $this->session->set_userdata($userData);
            
            return $query->result();
        }

        else{
            return false;
        }
    }
    
    
   
    
}

?>