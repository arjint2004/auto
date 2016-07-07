<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->auth->user_logged_in();
	 }

	 function index()
	 {
	// $id=138;
	 //for($i=0;$i<8;$i++){
		
		  // $this->db->select('*');
		  // $this->db->from('gpio');
		   // $query =$this->db->get();
		  // $dt=$query->result();
			//pr($dt);
			//foreach($dt as $cmd){
				//$json=json_decode($cmd->command);
				
				//pr($json);
			//}	
			
		//$cmd=array('on'=>'python mcp2301707.py -b b -o '.$i.' -s high','off'=>'python mcp23017007.py -b b -o '.$i.' -s low');
		//echo "<br />";
		// $sr=serialize($cmd);
		 //$q= "UPDATE gpio SET command='".$sr."' WHERE command='' AND is_i2c=1 AND id=".$id++."";
		// echo $q;
		 //$this->db->query($q);
		 //echo "<br />";
	// }
		 
		 $this->load->model('settingdata');
		 $data['group']=$this->settingdata->getGroup(1);
		 foreach($data['group'] as $datag){
			$point[$datag->id]=$this->settingdata->getPointByGroup($datag->id,1);
		 }
		 $data['point']=$point;
		 
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $data['main']= 'home_view';
		 $this->load->view('layout',$data);
	 }

	 function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('home', 'refresh');
	 }

}

?>