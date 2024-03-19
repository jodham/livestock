<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pig extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // $this->load->helper('common');
        // $this->load->library('database','session');
        $this->load->helper('text');
        $this->load->database();
    }


function add_pig(){
    Urlredirect();
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['tag'] = '';
    $data['breedId'] = '';
    $data['ftag']  = '';
    $data['mtag'] = '';
    $data['dob'] = '';
    $data['gender'] = '';
    $data['penNo'] = '';
    $data['fateId'] = '';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $pigtag = $this->input->post('tag');
        $breed = $this->input->post('breed');
        $ftag = $this->input->post('ftag');
        $mtag = $this->input->post('mtag');
        $dob = $this->input->post('dob');
        $gender = $this->input->post('gender');
        $pen = $this->input->post('pen');
        $fate  = $this->input->post('fate' );

        $data['tag'] = $pigtag;
        $data['breedId'] = $breed;
        $data['ftag']  = $ftag;
        $data['mtag'] = $mtag;
        $data['dob'] = $dob;
        $data['gender'] = $gender;
        $data['penNo'] = $pen;
        $data['fateId'] = $fate;
        $availablepig = $this->Pig_model->getPigByTag($pigtag);
        if(!empty($availablepig)){
            $this->session->set_flashdata('error', 'pig tag already in use');
            redirect(base_url("pig/add_pig", $data));
            return;
        }
        if($dob > date("Y-m-d H:i")){
            $this->session->set_flashdata('error', 'Birth date must be in the past');
            redirect(base_url("pig/add_pig", $data));
            return;
        }
        $data = array(
            'tag' => $pigtag,
            'breed' => $breed,
            'father_tag' => $ftag,
            'mother_tag' => $mtag,
            'dob' => $dob,
            'gender' => $gender,
            'penNumber' => $pen,
            'fate' => $fate,
            'added_by' => get_logged_user_id(),
            'modified_by' => get_logged_user_id()
        );
        $this->db->insert('pig', $data);
        $this->User_model->save_logs(getUserNames(get_logged_user_id()), 'Added new pig'." ".$tag);	
        $this->session->set_flashdata('success', 'Successfully added a new pig');
        redirect(base_url("pig/pigs"));

    }
    $data['malePigs'] = $this->Pig_model->getMalePigs();
    $data['femalePigs'] = $this->Pig_model->getFemalePigs();
    $data['breeds'] = $this->Pig_model->getBreeds();
    $data['pens'] = $this->Pig_model->getPens();
    $data['fates'] = $this->Pig_model->getFates();
    $data['content']=$this->load->view('pigs/add_pig', $data, true);
    $this->load->view('index/base', $data);
}
function breeds(){
    Urlredirect();
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['breeds'] = $this->Pig_model->getBreeds();
    $data['content']=$this->load->view('pigs/breeds', $data, true);
    $this->load->view('index/base', $data);
}
function add_breed(){
    Urlredirect();
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['breed'] = '';
    $data['description'] = '';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $breed = $this->input->post('breed');
        $description = $this->input->post('description');
        $breeds = $this->Pig_model->getBreedByName($breed);
        $data['breed'] = $breed;
        $data['description'] = $description;
        if(!empty($breeds)){
            $this->session->set_flashdata('error', 'Breed'." ".$breed." ". "already exists");
            redirect(base_url("add_breed", $data));
        }
        $data = array(
            'name' =>$breed,
            'description' => $description
        );
        $this->db->insert('breed', $data);
        $this->User_model->save_logs(getUserNames(get_logged_user_id()), 'Added new breed'." ".$breed);	
        $this->session->set_flashdata('success', 'Successfully added a new breed');
        redirect(base_url("pig/breeds"));
    }
    $data['content']=$this->load->view('pigs/add_breed', $data, true);
    $this->load->view('index/base', $data);
}

function pigs(){
    Urlredirect();
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['pigs'] = $this->Pig_model->getPigs();
    $data['content']=$this->load->view('pigs/pigs', $data, true);
    $this->load->view('index/base', $data);
}
function pen(){
    Urlredirect();
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['pens'] = $this->Pig_model->getPens();
    $data['content']=$this->load->view('pigs/pen', $data, true);
    $this->load->view('index/base', $data);
}
function add_pen(){
    Urlredirect();
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['penNo'] = '';
    $data['description'] = '';
    $data['age'] = '';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $penNo = $this->input->post('penNo');
        $description = $this->input->post('description');
        $age = $this->input->post('age');
        $pens = $this->Pig_model->getPenByName($penNo);
        $data['penNO'] = $penNo;
        $data['description'] = $description;
        $data['age'] = $age;
        if(!empty($pens)){
            $this->session->set_flashdata('error', 'Pen'." ".$penNo." ". "already exists");
            redirect(base_url("pig/add_pen", $data));
        }
        $data = array(
            'pen_No' =>$penNo,
            'description' => $description,
            'age_allowed' => $age,
            'added_by' => get_logged_user_id()
        );
        $this->db->insert('pen', $data);
        $this->User_model->save_logs(getUserNames(get_logged_user_id()), 'Added new pen'." ".$penNo);	
        $this->session->set_flashdata('success', 'Successfully added a new pen');
        redirect(base_url("pig/pen"));
    }
    $data['content']=$this->load->view('pigs/add_pen', $data, true);
    $this->load->view('index/base', $data);
}
function fate(){
    Urlredirect();
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['fates'] = $this->Pig_model->getFates();
    $data['content']=$this->load->view('pigs/fate', $data, true);
    $this->load->view('index/base', $data);
}
function add_fate(){
    Urlredirect();
    $data = array(
        'title' => "",
        'content'=> '',
    );
    $data['fate'] = '';
    $data['description'] = '';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $fate = $this->input->post('fate');
        $description = $this->input->post('description');
        $breeds = $this->Pig_model->getFateByName($fate);
        $data['fate'] = $fate;
        $data['description'] = $description;
        if(!empty($breeds)){
            $this->session->set_flashdata('error', 'Fate'." ".$fate." ". "already exists");
            redirect(base_url("pig/add_fate", $data));
        }
        $data = array(
            'fate' =>$fate,
            'description' => $description
        );
        $this->db->insert('fate', $data);
        $this->User_model->save_logs(getUserNames(get_logged_user_id()), 'Added new fate'." ".$fate);	
        $this->session->set_flashdata('success', 'Successfully added a new fate');
        redirect(base_url("pig/fate"));
    }
    $data['content']=$this->load->view('pigs/add_fate', $data, true);
    $this->load->view('index/base', $data);
}

  
}