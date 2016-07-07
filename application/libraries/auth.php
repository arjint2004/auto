<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth {
var $mac='NmE0ZjQ3YTZjY2MxNDE4NTU3MjZmOTllMTU1MGRkNTM=';
    function user_logged_in() {
        $CI = & get_instance();
        $CI->load->library('session');
		
        /*if ($this->readmac()) {
            
        } else {
           echo "<script>
		   alert('system dengan raspi anda tidak teregistrasi, hubungi developer');
		   window.location = '".base_url()."';
		   </script>";
        }*/
        if ($CI->session->userdata('logged_in')) {
            
        } else {
		   $CI->session->unset_userdata('logged_in');
		   @session_destroy();
		   //redirect('home', 'refresh');
           echo "<script>window.location = '".base_url()."';</script>";
        }
    }
	
    function readmac()
	{
		$mac=shell_exec('cat /sys/class/net/eth0/address');
		if(base64_encode(md5($mac))==$this->mac){
			return true;
		}else{
			return false;
		}
	}
}

