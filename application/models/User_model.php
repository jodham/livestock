<?php
class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
      // Load the second database
    }

    # Query from default db
    function getUserByEmail($email){
        $query = "SELECT * FROM `users` WHERE email='$email'";
        return $this->db->query($query)->row();
    }
    function getAuthUserByEmail($email){
        $query = "SELECT * FROM `auth` WHERE username='$email'";
        return $this->db->query($query)->row();
    }

    function get_all_users(){
        $query = "SELECT * FROM `users` ORDER BY fname ASC";
        return $this->db->query($query)->result();
    }
    function get_user_by_id($id){
        $query = $this->db->query("SELECT * FROM `users` WHERE id='$id'");
        return $query->row();
    }
    function get_all_logs(){
        $query = $this->db->query("SELECT * FROM `logs` ORDER BY time DESC");
        return $query->result();
    }
    function save_logs($user, $action){
        $data = array('user'=>$user,'action'=>$action);
        $this->db->insert('logs', $data); 
    }

}
?>

