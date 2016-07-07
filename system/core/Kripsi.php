<?php
class Kripsi {
	var $mac='';
	function __construct(){

		if(!isset($_SESSION['macke'])){
			$_SESSION['macke']=$this->getmactenanan();
		}
		//$seri=$this->getmactenanan().'<br />';
		$this->mac=$_SESSION['macke'];
	}
	function keynita(){
		/*$filename =$_SERVER[DOCUMENT_ROOT].WEBROOT."cake".DS."libs".DS."controller".DS."components".DS."class".DS."11101985".DS."11101985";*/
		$filename ="system/core/11101985";
		/*if(!file_exists($filename)){
		$myFile=$filename;
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = 'nitaarjint';
		fwrite($fh, $stringData);
		fclose($fh);
		}*/
		
		// get contents of a file into a string
		
		//pr($filename);
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);

		if(!file_exists($filename)){
		$myFile=$filename;
		@chmod("".$myFile."", 0777);
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = 'nitaarjint';
		
		fwrite($fh, $stringData);
		fclose($fh);
		}
		
		
		// get contents of a file into a string
		$filename =$filename;
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		//echo $contents;
		fclose($handle);
		if($contents!=$this->key()){
			if(isset($_POST['send11101985511986'])){
				if($this->key($this->key())==$_POST['val11101985511986']){
				$myFile=$filename;
				@chmod("".$myFile."", 0777);
				$fh = fopen($myFile, 'w') or die("can't open file controller");
				$stringData = $this->key();
				fwrite($fh, $stringData);
				fclose($fh);
				//$this->redirect('users/login');
				}else{
					echo "<form action='' method='post' >
					Key anda salah, hub webmaster <div >arjint2004@gmail.com</div> <br />
					key : <input type='' name='val11101985511986' >
					<input type='submit' name='send11101985511986' value='send' >
					</form> ".$this->key()."
					";
					//$this->layout='';
					die();
				}
			}else{
				//pr($_SERVER);
				echo "<form action='' method='post' >
				
				key : <input type='' name='val11101985511986' >
				<input type='submit' name='send11101985511986' value='send' >
				</form> ".$this->key()."
				";
				//$this->layout='';
				die();
			}
			/*echo "<form action='' method='post' >
				
				key : <input type='' name='val11101985511986' >
				<input type='submit' name='send11101985511986' value='send' >
				</form> ".$this->key()."
				";*/
				echo "Your Veryfication has been successful. <a href=''>please go to this link</a>";
				//$this->layout='';
			die();
		}
	}
	
	function key($mynita=null) {
		if($mynita==null){
			$mc=$this->mac;
		}else{
			$mc=$mynita;
		}
		
		for($i2=0;$i2<7;$i2++){
			$mc=md5($mc);
		}
		return base64_encode($mc);
	}
	
	
	function getmactenanan(){
		$shell=shell_exec('cat /proc/cpuinfo');
		$out=explode("Serial",$shell);
		//pr($out);
		return @$out[1];
	}
}
?>