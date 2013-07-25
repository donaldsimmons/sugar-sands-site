<?php

    class Logout extends CI_Controller {
        
        public function __construct() {
            
            #when the class is called run the parent's constructor function to inherit from parent
            #class
            parent::__construct();
            
            #loads the session library so the class can destroy the user's current session
            $this->load->library('session');
            
        }//end __Construct Function
        
        public function signout() {
            
           #loads the url helper
            $this->load->helper('url');
            
            #destroys the user's current session
            $this->session->sess_destroy();
            
            #redirects the user back to the "signed out" home page
            redirect(base_url('index.php')); 
            
        }//end Signout Function
        
    }

?>