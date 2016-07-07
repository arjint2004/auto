<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('settingdata','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'id_group' => $row->id_group,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
	 /*$pointd=$this->settingdata->getPoint();
	 foreach($pointd as $point){
			$command=json_decode($point->command);
			//print_r($point);
			if($point->nyala==0){$cmd=$command->off;}elseif($point->nyala==1){$cmd=$command->on;}
			if($point->is_i2c!=1){
				shell_exec('gpio mode '.$point->chip_addr.' out');
			}
			
			shell_exec(''.$cmd.'');
	 }*/
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>