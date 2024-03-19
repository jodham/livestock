<?php
function getUserRole() {
    $ci =& get_instance();
    $user = $ci->session->userdata('logged');
    
    if ($user && is_object($user)) { // Make sure user data is an object
        $role = $user->role; 
        return $role;
    }
    return null;
}

function getUserNames($id) {
    $ci = &get_instance();
     $query = "SELECT * FROM `users` WHERE id='$id'";
    $result = $ci->db->query($query)->row();

    if ($result) {
        return $result->fname . " " . $result->lname;
    } else {
        return "user not found";
    }
}
function getUserName($id) {
    $ci = &get_instance();
     $query = "SELECT * FROM `users` WHERE id='$id'";
    $result = $ci->db->query($query)->row();

    if ($result) {
        return $result->fname;
    } else {
        return "user not found";
    }
}
function getPhotoUrl($id) {
    $ci = &get_instance();
     $query = "SELECT * FROM `users` WHERE id='$id'";
    $result = $ci->db->query($query)->row();

    if ($result) {
        return $result->photo;
    } else {
        return "null";
    }
}
function duration($clock_in, $clock_out){
    $seconds =strtotime($clock_out) - strtotime($clock_in);
	
	$secs = $seconds % 60;
	$hrs = $seconds / 60;
	$mins = $hrs % 60;
	
	$hrs = $hrs / 60;

	$time = (int)$hrs . ":" . (int)$mins ;	
    return $time;
	
}
function readableDate($date){
    $format = date('d, M Y H:i a', strtotime($date));
    return $format;
}
function paginationStyleconfig() {
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = 'Prev';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    return $config;
}
function Urlredirect(){
    $ci=& get_instance();
    if(get_logged_user_id() == null){
        $ci->session->set_flashdata('error', "Signin required");
        redirect(base_url('welcome/signin'));
    }elseif(getChangePassState(get_logged_user_id()) == 1){
        $ci->session->set_flashdata('error', "Reset your password to continue");
        redirect(base_url('user/reset_password'));
    }
}

function getChangePassState($id){
    $ci=get_instance();
    $query="SELECT * FROM `users` WHERE id='$id'";
    $result = $ci->db->query($query)->row();
    if(empty($result)){
        return false;
    }else{
        return $result->change_pass;
    }
}

?>