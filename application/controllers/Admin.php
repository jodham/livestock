<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // $this->load->helper('common');
        // $this->load->library('database','session');
        $this->load->helper('text');
        $this->load->database();
    }


function add_pig(){
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['content']=$this->load->view('pigs/add_pig', $data, true);
    $this->load->view('index/base', $data);
}



  
}