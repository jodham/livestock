<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // $this->load->helper('common');
        $this->load->library('session', 'email');
        $this->load->helper('text');
        $this->load->database();
        
    }
    public function get_current_time()
    {
        $current_time = date('Y-m-d H:i');
        $current_time_plus_1_hours = date('Y-m-d H:i', strtotime($current_time . ' +1 hours'));
        return $current_time_plus_1_hours;
    }
    public function generate_password($length = 10) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = "";
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, strlen($chars)-1)];
        }
        if (!preg_match("#[a-z]+#", $password)) {
            $password .= strtolower($chars[rand(0, 25)]);
        }
        if (!preg_match("#[A-Z]+#", $password)) {
            $password .= strtoupper($chars[rand(0, 25)]);
        }
        if (!preg_match("#[0-9]+#", $password)) {
            $password .= $chars[rand(52, 61)];
        }
        if (!preg_match("#[\W]+#", $password)) {
            $password .= $chars[rand(62, strlen($chars)-1)];
        }
        return $password;
    }
    function send_email($recipient, $message){
	    $headers = "FROM :"."noreplyjuelga@tz.com\r\n";
	    $subject = "Account  Information from JUELGA";
	    mail($recipient, $subject, $message, $headers);
	}
    function create_user(){
        Urlredirect();
        $data = array(
            'title' => "create user",
            'content'=> '',
        );
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $email = $this->input->post('email');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
          
            $phone = $this->input->post('phone');
            $gender = $this->input->post('gender');
            $id_no = $this->input->post('id_no');
            $photo = $_FILES["image"]["name"];
    
            $user = $this->User_model->getUserByEmail($email);
            if($user){
                $data['email'] = $email;
                $data['fname'] = $fname;
                $data['lname'] = $lname;
               
                $data['phone'] = $phone;
                $data['gender'] = $gender;
                $data['id_no'] = $id_no;
                $data['photo'] = $photo;
                $this->session->set_flashdata('error',"This email is already in use.");
                redirect(base_url("user/create_user", $data));
                return;
            }
    
            $phone = (substr($phone, 0, 1) == "+") ? str_replace("+", "", $phone) : $phone;
            $phone = (substr($phone, 0, 1) == "0") ? preg_replace("/^0/", "254", $phone) : $phone;
            $phone = (substr($phone, 0, 1) == "7") ? "254{$phone}" : $phone; 
    
            $password = md5($this->generate_password());
            if(!empty($photo)){
                $photo_name = preg_replace("/\\s+/", "_", $photo);
                $unique_photo_name = uniqid() . '_'. $photo_name;
                // Define the base directory path
                $base_path = FCPATH . 'static/assets/profile_uploads/';
                $config['upload_path'] = $base_path;
                // $config['upload_path'] = 'C:\xampp\htdocs\livestock\static\assets\profile_uploads';
                $config['remove_spaces'] = True;
                $config['file_name'] = $unique_photo_name;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 10000; // 10MB
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $photo_url = base_url().'static/assets/profile_uploads/'. $unique_photo_name; 
                }else{
                    $data['email'] = $email;
                    $data['fname'] = $fname;
                    $data['lname'] = $lname;
                 
                    $data['phone'] = $phone;
                    $data['gender'] = $gender;
                    $data['id_no'] = $id_no;
                    $data['photo'] = $photo;
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    $data['content'] = $this->load->view('users/add_user', $data, true);
                    $this->load->view('index/base', $data); 
                    return;
                }
            }else{
              $photo_url = '';
            }
    
            $data = array(
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email, 
                'phone' => $phone,
                'gender' => $gender,
                'id_number' => $id_no,
                'photo' =>  $photo_url,
                
            );
            $this->db->insert('users', $data);
            $user = array(
                'username'=>$email,
                'password'=>$password,
                'role'=>0
            );
            $this->db->insert('auth', $user);
            $this->User_model->save_logs("user", "Added new user". $fname." ".$lname);
            #sendmail to user
            $message = "Account created"."\r\n\r\n"."juelga.com"."\r\n\r\n"."Username :"." ".$email."\r\n\r\n"."Password :"." ".$password;
            $recipient = $email;
            $this->send_email($recipient, $message);

            redirect(base_url("user/users"));
        }
    
        $data['content']=$this->load->view('users/add_user', $data, true);
        $this->load->view('index/base', $data);
    }
    function edit_user(){
        Urlredirect();
        $data = array(
            'title' => "create user",
            'content'=> '',
        );
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $email = $this->input->post('email');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $other = $this->input->post('other');
            $phone = $this->input->post('phone');
            $gender = $this->input->post('gender');
            $id_no = $this->input->post('id_no');
            $photo = $_FILES["image"]["name"];
    
            $user = $this->User_model->getUserByEmail($email);
            if($user){
                $data['email'] = $email;
                $data['fname'] = $fname;
                $data['lname'] = $lname;
                $data['other'] = $other;
                $data['phone'] = $phone;
                $data['gender'] = $gender;
                $data['id_no'] = $id_no;
                $data['photo'] = $photo;
                $this->session->set_flashdata('error',"This email is already in use.");
                redirect(base_url("admin/create_user", $data));
                return;
            }
    
            $phone = (substr($phone, 0, 1) == "+") ? str_replace("+", "", $phone) : $phone;
            $phone = (substr($phone, 0, 1) == "0") ? preg_replace("/^0/", "254", $phone) : $phone;
            $phone = (substr($phone, 0, 1) == "7") ? "254{$phone}" : $phone; 
    
            $password = md5($this->generate_password());
            if(!empty($photo)){
                $photo_name = preg_replace("/\\s+/", "_", $photo);
                $unique_photo_name = uniqid() . '_'. $photo_name;
                // Define the base directory path
                $base_path = FCPATH . 'static/assets/profile_uploads/';
                $config['upload_path'] = $base_path;
                // $config['upload_path'] = 'C:\xampp\htdocs\livestock\static\assets\profile_uploads';
                $config['remove_spaces'] = True;
                $config['file_name'] = $unique_photo_name;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 10000; // 10MB
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $photo_url = base_url().'static/assets/profile_uploads/'. $unique_photo_name; 
                }else{
                    $data['email'] = $email;
                    $data['fname'] = $fname;
                    $data['lname'] = $lname;
                    $data['other'] = $other;
                    $data['phone'] = $phone;
                    $data['gender'] = $gender;
                    $data['id_no'] = $id_no;
                    $data['photo'] = $photo;
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    $data['content'] = $this->load->view('pigs/add_pig', $data, true);
                    $this->load->view('index/base', $data); 
                    return;
                }
            }else{
              $photo_url = '';
            }
    
            $data = array(
                'fname' => $fname,
                'lname' => $lname,
                'other' => $other,
                'email' => $email, 
                'phone' => $phone,
                'gender' => $gender,
                'id_number' => $id_no,
                'photo' =>  $photo_url,
                
            );
            $this->db->insert('users', $data);
            $user = array(
                'username'=>$email,
                'password'=>$password,
                'role'=>0
            );
            $this->db->insert('auth', $user);
            $this->User_model->save_logs($get_logged_user_id(), "Added new user". $fname." ".$lname);
            #sendmail to user
            $message = "Account created"."\r\n\r\n"."juelga.com"."\r\n\r\n"."Username :"." ".$email."\r\n\r\n"."Password :"." ".$password;
            $recipient = $email;
            $this->send_email($recipient, $message);

            redirect(base_url("user/users"));
        }
    
        $data['content']=$this->load->view('pigs/add_pig', $data, true);
        $this->load->view('index/base', $data);
    }

    function users(){
        Urlredirect();
        $data = array(
            'title' => "users",
            'navigation'=> $this->load->view('index/navbar', '', true),
            'content'=> '',
            'copyright'=> ''
        );
        $data['users'] = $this->User_model->get_all_users();
        $data['content']=$this->load->view('users/users', $data, true);
        $this->load->view('index/base', $data);
    }


    function  reset_password(){
      
        $data=array(
            'title' => 'reset',
            'navigation'=> $this->load->view('index/navbar', '', true),
            'slider' => '',
            'content' => '',
            'footer' => $this->load->view('index/footer', '', true)
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            $user = $this->User_model->get_user_by_id(get_logged_user_id());

            if(md5($current_password) != $user->password){
                $data['current_password'] = $current_password;
                $data['new_password'] = $new_password;
                $data['confirm_password'] = $confirm_password;

                $this->session->set_flashdata('error', "Current password is incorrect");
                $data['content'] = $this->load->view('users/reset_password', $data, true);
                $this->load->view('index/base', $data);
                return;
            }
            if($new_password != $confirm_password){
                $data['current_password'] = $current_password;
                $data['new_password'] = $new_password;
                $data['confirm_password'] = '';
                $this->session->set_flashdata('error', "New passwords do not match");
                $data['content'] = $this->load->view('users/reset_password', $data, true);
                $this->load->view('index/base', $data);
                return;
            }
            $hash_pass = md5($new_password);
            $data = array(
                'password' => $hash_pass,
                'date_modified' => $this->get_current_time(),
                'change_pass' => 0
            );

            $this->db->where('id', get_logged_user_id());
            $this->db->update('users', $data);
            // $message = "You successfully changed your password on"."\r\n\r\n"."biotime.zetech.ac.ke"."\r\n\r\n"."at :"." ".$this->get_current_time();
            // $recipient = $user->email;
            // $this->send_email($recipient, $message);

            $log_data=array(
               'user'=>get_logged_user_names(),
                "action"=>"user changed password",
                'time'=>$this->get_current_time()
            );
            $this->db->insert('logs', $log_data);

            $this->session->set_flashdata('success', "Password reset success");
            redirect(base_url('user/profile/'. get_logged_user_id()));
        }
        $data['current_password']='';
        $data['new_password']='';
        $data['confirm_password']='';
        $data['content']=$this->load->view('users/reset_password', $data, true);
        $this->load->view('index/base', $data);
            
      
    }
    function forgot_password(){
        $data=array(
			'title' => 'forgot pass',
			'navigation'=> $this->load->view('index/navbar', '', true),
			'slider' => '',
			'content' => '',
			'footer' => $this->load->view('index/footer', '', true)
		);
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$email = $this->input->post('email');
            $data['email'] = $email;

			$domain = explode('@', $email);
			if($domain[1] !== 'zetech.ac.ke'){
				$this->session->set_flashdata('error', "Invalid email! must be a valid zetech email");
				$data['content'] = $this->load->view('users/forgot_password', $data, true);
				$this->load->view("index/base", $data);
				return;
			}
            $user = $this->User_model->get_user_by_email($email);
           
            if(!$user){
                $this->session->set_flashdata('error', "No user with that email!");
                $data['content'] = $this->load->view('users/forgot_password', $data, true);
				$this->load->view("index/base", $data);
				return;
            }

			$password = $this->generate_password();
			$hash_pass = md5($password);
			$update_data = array(
				'password'=>$hash_pass,
				'change_pass'=>1,
                'date_modified'=>$this->get_current_time()
			);		
			$this->db->where('email', $email);
            $this->db->update('users', $update_data);
            $message = "Password reset"."\r\n\r\n"."biotime.zetech.ac.ke"."\r\n\r\n"."Username :"." ".$email."\r\n\r\n"."Password :"." ".$password;
            $recipient = $email;
            $this->send_email($recipient, $message);

            // $log_data=array(
            //    'user'=>get_logged_user_names(),
            //     "action"=>"user forgot password",
            //     'time'=>$this->get_current_time()
            // );
            // $this->db->insert('logs', $log_data);

            $this->session->set_flashdata('success', "password reset check your email");

            redirect(base_url('welcome/index'));
		

		}
		$data['email']='';
		$data['content'] = $this->load->view('users/forgot_password', $data, true);
		$this->load->view('index/base', $data);
    }
    function profile($id){
        Urlredirect();
        $data = array(
            'title' => "profile",
            'navigation'=> $this->load->view('index/navbar', '', true),
            'content'=> '',
            'copyright'=> $this->load->view('index/footer', '', true),
        );
        $data['userdetails'] = $this->User_model->get_user_by_id($id);
        $data['content']=$this->load->view('users/profile', $data, true);
        $this->load->view('index/base', $data);
    }
    function logs(){
        Urlredirect();
        $data = array(
            'title' => "logs",
            'navigation'=> $this->load->view('index/navbar', '', true),
            'content'=> '',
            'copyright'=> $this->load->view('index/footer', '', true),
        );
        $data['logs'] = $this->User_model->get_all_logs();
        $data['content']=$this->load->view('admin/logs', $data, true);
        $this->load->view('index/base', $data);
    }
    function delete_user($id) {
        $user = $this->User_model->get_user_by_id($id);
    
        if (!$user) {
            $this->session->set_flashdata('error', "User does not exist");
            redirect(base_url('user/users'));
            return;
        }
        $logs = array(
            'user' =>get_logged_user_id(),
            'action'=>"deleted user"." ". getUserNames($id),
            'time'=>$this->get_current_time()
        );
        $this->db->insert('logs', $logs);
        // Delete the user from the database
        $this->db->where('id', $id);
        $this->db->delete('users');
        
       
        // Check if the delete operation was successful
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', "User deleted successfully");
            redirect(base_url('user/users'));
            return;
        } else {
            $this->session->set_flashdata('error', "Deletion failed! try again");
            redirect(base_url('user/users'));
            return;
        }
    }
    

}