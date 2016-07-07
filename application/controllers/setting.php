<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	   
	   $this->auth->user_logged_in();
	   $this->load->model('settingdata');
	 }


	 function index()
	 {
		 $filename ="system/core/11101985";
		 $handle = fopen($filename, "r");
		 $contents = fread($handle, filesize($filename));
		
		 $data['tokene']=md5($contents); 
		 $data['controll']=$this->settingdata->getDataControll();
		 $data['main']= 'setting';
		 $this->load->view('layoutblank',$data);
	 }
	 function addpoint()
	 {
		 
		 $data['group_controll']=$this->settingdata->getGroup();
		 $data['gpio']=$this->settingdata->getGpio();
		 if(isset($_POST['addpoint'])){
			unset($_POST['addpoint']);
			$_POST['every_timer']='["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]';
			$_POST['time_on']='00:00:00';
			$_POST['time_off']='00:00:00';
			if($this->db->insert('controll',$_POST)){
				$this->db->where('id',$_POST['gpio_no']);
				$this->db->update('gpio',array('used'=>1));
			}
		 }
		 $data['main']= 'addpoint';
		 $this->load->view('layoutblank',$data);
	 }
	 function updategroup()
	 {
		if(isset($_POST['id_group'])){
			$this->db->where('id',$_POST['id_group']);
			unset($_POST['id_group']);
			$this->db->update('group_controll',$_POST);
			if(isset($_POST['id_group'])){
				$this->db->where('id',$_POST['id_group']);
				$this->db->update('gpio',array('nama'=>$_POST['nama']));
			}
			
		}
	 }
	 function updatepoint()
	 {
		if(isset($_POST['id_point'])){
			$this->db->where('id',$_POST['id_point']);
			$gpio_no_sebelum=$_POST['gpio_no_sebelum'];
			unset($_POST['id_point']);
			unset($_POST['gpio_no_sebelum']);
			$this->db->update('controll',$_POST);
			if(isset($_POST['gpio_no'])){
				$this->db->where('id',$gpio_no_sebelum);
				$this->db->update('gpio',array('used'=>0));
				
				$this->db->where('id',$_POST['gpio_no']);
				$this->db->update('gpio',array('used'=>1));
			}
			
		}
	 }
	 
	 function setaktifg()
	 {
		if($_POST['val']==1){$aktif=0;}elseif($_POST['val']==0){$aktif=1;}
		$this->db->where('id',$_POST['id_group']);
		$this->db->update('group_controll',array('aktif'=>$aktif));
		echo $aktif;
	 }
	 function setaktif()
	 {
		if($_POST['val']==1){$aktif=0;}elseif($_POST['val']==0){$aktif=1;}
		$this->db->where('id',$_POST['id_point']);
		$this->db->update('controll',array('aktif'=>$aktif));
		echo $aktif;
	 }
	 function pointlist()
	 {
		 
		 $data['point']=$this->settingdata->getPoint();
		 $data['main']= 'pointlist';
		 $this->load->view('layoutblank',$data);
	 }
	 function grouplist()
	 {
		 
		 $data['group']=$this->settingdata->getGroup();
		 $data['main']= 'grouplist';
		 $this->load->view('layoutblank',$data);
	 }
	 function selectrelay()
	 {
		$gpio_controll=$this->settingdata->getGpio(0);
		$groupselect ='<select onblur="blurgroup();" id_point="'.$_POST['id_point'].'" field="'.$_POST['field'].'" name="gpio_no" id="gpio_no" onchange="updateselect(this);"  style="width:53%;">';
			//$groupselect .='<option value="">No Relay</option>';
			$groupselect .='<option selected value="'.$_POST['gpio_no'].'">Relay '.$_POST['gpio_no'].'</option>';
			foreach($gpio_controll as $gpio_c){
			//if($_POST['gpio_no']==$gpio_c->id){ $sel='selected';}else{$sel='';}
			$groupselect .='<option  value="'.$gpio_c->id.'">Relay '.$gpio_c->id.'</option>';
			} 
		$groupselect .='</select>
		<input type="hidden" id="gpio_no_sebelum" name="gpio_no_sebelum" value="'.$_POST['gpio_no'].'"/>
		';
		
		echo $groupselect;
	 }
	 function selectgroup()
	 {
		
		$group_controll=$this->settingdata->getGroup();
		$groupselect ='<select onblur="blurgroup();" id_point="'.$_POST['id_point'].'" field="'.$_POST['field'].'" name="id_group" id="id_group" onchange="updateselect(this);"  style="width:53%;">';
			//$groupselect .='<option value="">Select Group</option>';
			foreach($group_controll as $group_c){
			if($_POST['id_group']==$group_c->id){ $sel='selected';}else{$sel='';}
			$groupselect .='<option '.$sel.' value="'.$group_c->id.'">'.$group_c->nama.'</option>';
			} 
		$groupselect .='</select>
		';
		
		echo $groupselect;
	 }
	 function addgroup()
	 {
		 
		 if(isset($_POST['nama'])){
			$this->db->insert('group_controll',$_POST);
		 }
		 
		 $data['main']= 'addgroup';
		 $this->load->view('layoutblank',$data);
	 }
	 function dellpoint()
	 {
		if(isset($_POST['id_point'])){
				$this->db->where('id',$_POST['gpio_no']);
				$this->db->update('gpio',array('used'=>0));
				
				$this->db->delete('controll', array('id' => $_POST['id_point']));
		}
	 }
	 function deletetimet()
	 {
		if(isset($_POST['id_timer'])){
			if($this->db->delete('jadwal', array('id' => $_POST['id_timer']))){
				echo 1;
			}else{
				echo 0;
			}
		}
	 }
	 function edittimer($id_controll=0,$id_timer=0)
	 {
		if(isset($_POST['save']) && $_POST['save']=='yes'){
			if(isset($_POST['date_on']) || isset($_POST['date_off'])){ 
				$expldon=explode("/",$_POST['date_on']);
				$expldoff=explode("/",$_POST['date_off']);
				$_POST['date_on']=$expldon[2].'-'.$expldon[0].'-'.$expldon[1];
				$_POST['date_off']=$expldoff[2].'-'.$expldoff[0].'-'.$expldoff[1];
			}else{
				$_POST['date_on']='';
				$_POST['date_off']='';
			}
			//$this->db->where('id',$_POST['id_point']);
			$update=array('date_on'=>@$_POST['date_on'],'date_off'=>@$_POST['date_off'],'time_on'=>$_POST['time_on'].':00','time_off'=>$_POST['time_off'].':00','every_timer'=>json_encode($_POST['every_timer']),'type'=>$_POST['type']);
			//print_r($update);
			//$this->db->update('controll',$update);
			
			//pr($_POST);
			$update['id_controll']=$_POST['id_point'];
			
			$this->db->where('id',$_POST['id_timer']);
			$this->db->update('jadwal',$update);
			echo $this->db->last_query();
		}
		$data['point']=$this->settingdata->getTimerById($id_timer);
		$data['id_controll']=$id_controll;
		//pr($data['timer']);

		$data['main']= 'edittimer';
		$this->load->view('layoutblank',$data);
	 }
	 function addtimer($id_point=0)
	 {
		if(isset($_POST['id_point'])){
			$id_point=$_POST['id_point'];
		}
		if(isset($_POST['save']) && $_POST['save']=='yes'){
			if(isset($_POST['date_on']) || isset($_POST['date_off'])){ 
				$expldon=explode("/",$_POST['date_on']);
				$expldoff=explode("/",$_POST['date_off']);
				$_POST['date_on']=$expldon[2].'-'.$expldon[0].'-'.$expldon[1];
				$_POST['date_off']=$expldoff[2].'-'.$expldoff[0].'-'.$expldoff[1];
			}else{
				$_POST['date_on']='';
				$_POST['date_off']='';
			}
			//$this->db->where('id',$_POST['id_point']);
			$update=array('date_on'=>@$_POST['date_on'],'date_off'=>@$_POST['date_off'],'time_on'=>$_POST['time_on'].':00','time_off'=>$_POST['time_off'].':00','every_timer'=>json_encode($_POST['every_timer']),'type'=>$_POST['type']);
			//print_r($update);
			//$this->db->update('controll',$update);
			
			//pr($_POST);
			$update['id_controll']=$_POST['id_point'];
			$this->db->insert('jadwal',$update);
		}
		$data['timer']=$this->settingdata->getTimerByIdPoint($id_point);
		//pr($data['timer']);
		$point=$this->settingdata->getPointById($id_point);
		$data['point']= $point;
		$data['main']= 'addtimer';
		$this->load->view('layoutblank',$data);
	 }
	 function timerlist()
	 {
		$data['timer']=$this->settingdata->getTimerByIdPoint($_POST['id_point']);
		//pr($data['timer']);
		$point=$this->settingdata->getPointById($_POST['id_point']);
		$data['point']= $point;
		$data['main']= 'timerlist';
		$this->load->view('layoutblank',$data);
	 }
	 function setgpio()
	 {
		 if ($this->session->userdata('logged_in')) {
		 if(isset($_POST['value'])){
			if($_POST['value']==1){ $setval=0; }elseif($_POST['value']==0){$setval=1;}
			$point=$this->settingdata->getPointById($_POST['id_point']);
			
			$command=json_decode($point[0]->command);
			//print_r($point);
			if($point[0]->nyala==0){$cmd=$command->on;}elseif($point[0]->nyala==1){$cmd=$command->off;}
			if($point[0]->is_i2c!=1){
				shell_exec('gpio mode '.$point[0]->chip_addr.' out');
			}
			shell_exec('sudo '.$cmd.'');
			
					$this->db->where('id',$_POST['id_point']);
					$this->db->update('controll',array('nyala'=>$setval));	
			//echo $cmd;
			echo $setval;

		 }
		}
		 
	 }
	 function setservice()
	 {
		$shell=shell_exec('pgrep python | xargs ps');
		
		if (strpos($shell,'jadwal.py')) {
			echo 'true';
		}


	 }
	 function shutdown()
	 {
		if($_POST['shutdown']=='halt'){
			$shell=shell_exec('sudo halt');
		}elseif($_POST['shutdown']=='reboot'){
			$shell=shell_exec('sudo reboot');
		}
		
		/*if (strpos($shell,'jadwal.py')) {
			echo 'true';
		}*/
		echo 'true';

	 }
	 function reboot()
	 {
		$shell=shell_exec('reboot');
	 }
	 function halt()
	 {
		$shell=shell_exec('halt');
	 }
	 function monitor()
	 {
		$this->load->model('settingdata');
		 //$data['group']=$this->settingdata->getGroup(1);
		 //foreach($data['group'] as $datag){
			$point=$this->settingdata->getPointmonitor();
		 //}
		 $data['point']=$point;
		$data['main']= 'monitor';
		$this->load->view('layoutblank',$data);
	 }
	 
	 function oauth($token1='')
	 {
	 
		$filename ="system/core/11101985";
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		if($token1==md5($contents)){
			$_SESSION['tokene']=$contents;
			return $contents;
		}else{
			return 'invalid token';
		}
		
		
	 }
	 
	 function api($token1='',$id_point=0,$value=0)
	 {
		//echo $token1."<br />";
		//echo $id_point."<br />";
		//echo $value."<br />";
		if($value==0){$value=1;}elseif($value==1){$value=0;}
		$token=$this->oauth($token1);
		if(md5($token)==$token1){
			if(isset($value)){
				if($value==1){ $setval=0; }elseif($value==0){$setval=1;}
				$point=$this->settingdata->getPointById($id_point);
				
				$command=json_decode($point[0]->command);
				//print_r($point);
				if($value==0){$cmd=$command->on;}elseif($value==1){$cmd=$command->off;}
				if($point[0]->is_i2c!=1){
					shell_exec('gpio mode '.$point[0]->chip_addr.' out');
				}
				$output=shell_exec('sudo '.$cmd.'');
				echo $output;
						$this->db->where('id',$id_point);
						$this->db->update('controll',array('nyala'=>$setval));	
				//echo $cmd;
				echo $setval;

			 }
		 }else{
			echo 'Ivalid token. Request rejected!';
		 }
	 }
}

?>