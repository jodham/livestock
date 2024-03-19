<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function get_current_time()
    {
        $current_time = date('Y-m-d H:i');
        $current_time_plus_1_hours = date('Y-m-d H:i', strtotime($current_time . ' +1 hours'));
        return $current_time_plus_1_hours;
    }
	
	public function index()
	{
		Urlredirect();
		$data = array(
            'title' => "",
            'content'=> '',
        );
        $data['content']=$this->load->view('admin/dashboard', $data, true);
        $this->load->view('index/base', $data);
	}
	public function signin(){
		$data = array(
            'title' => "Signin",
            'navigation'=> '',
            'content'=> '',
            'copyright'=> '',
        );
		// if(!empty(get_logged_user_id())){
		// 	redirect(base_url('Admin/dashboard'),'refresh');
		// }
		$data['email'] = '';
		$data['password'] ='';
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$username = $this->input->post('email');
			$password = $this->input->post('password');

			$data['email']= $username;
			$data['password'] =$password;
			// if (strpos($email, "@") === false) {
			// 	$this->session->set_flashdata('error', "Invalid email address");
			// 	redirect(base_url('welcome/signin'),'refresh');
			// 	return;
			// } 		
			
			$user = $this->User_model->getAuthUserByEmail($username);
			$userdetails = $this->User_model->getUserByEmail($username);
			if(empty($user)){
				$this->session->set_flashdata('error', "account does not exist");
				$data['content']=$this->load->view('users/signin', $data, true);
				$this->load->view('index/base', $data);
				return;	
			}
			if($user->active == "0"){

				$this->session->set_flashdata('error', "Account deactivated, contact admin");
				$data['content']=$this->load->view('users/signin', $data, true);
				$this->load->view('index/base', $data);
				return;
			}

			//check password
			if(md5($password) != $user->password){
				$this->session->set_flashdata('error', "Incorrect Password");
				$data['content']=$this->load->view('users/signin', $data, true);
				$this->load->view('index/base', $data);
				return;
			}
			$this->session->set_userdata('logged', $userdetails);		

			$this->User_model->save_logs(getUserNames(get_logged_user_id()), 'user logged in');
			redirect(base_url()."welcome/index");
		
			// if($user->change_pass ==1){
			// 	redirect(base_url().'user/reset_password','refresh');
			// }
			// if($user->role == 0){
			// 	redirect(base_url("admin/attendance"));
			// }else{
			// 	redirect(base_url()."admin/admin_dashboard",'refresh');
			// }
		}
        $data['content']=$this->load->view('users/signin', $data, true);
        $this->load->view('index/base', $data);
	}
	public function logout() {
		Urlredirect();
		$this->User_model->save_logs(getUserNames(get_logged_user_id()), 'user logged out');	
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
		redirect(base_url('welcome/signin'));
		
	}
}
