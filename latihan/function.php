<? 

switch($_POST['pio']){
	case"ON3":
	 shell_exec("python mcp23017.py -b a -o 0 -s low");
	break;
	
	case"OFF3":
	
	 shell_exec("python mcp23017.py -b a -o 3 -s low");
	break;
	case"ON2":
	 shell_exec("python mcp23017.py -b a -o 2 -s high");
	break;
	
	case"OFF2":
	 shell_exec("python mcp23017.py -b a -o 2 -s low");
	break;
	
	case"ON1":
	 shell_exec("python mcp23017.py -b a -o 1 -s high");
	break;
	
	case"OFF1":
	 shell_exec("python mcp23017.py -b a -o 1 -s low");
	break;
	
	case"ON0":
	 shell_exec("python mcp23017.py -b a -o 0 -s high");
	break;
	
	case"OFF0":
	 shell_exec("python mcp23017.py -b a -o 0 -s low");
	break;
}
?> 
<style>
div.tombol {margin: 0px auto; width: 240px; text-align:center;}	
div.tombol input{
font-size: auto;
height: 20%;
padding: 20px;
width: 50%;
}	
</style>

<div class="tombol" >
	<form action="" method="post" >

	<input name="pio" value="ON3" type="submit" />
	<input name="pio" value="OFF3" type="submit" />
	<br />
	<br />
	
	<input name="pio" value="ON2" type="submit" />
	<input name="pio" value="OFF2" type="submit" />
	<br />
	<br />

	<input name="pio" value="ON1" type="submit" />
	<input name="pio" value="OFF1" type="submit" />
	<!--<br />
	<br />
	<input name="pio" value="ON7" type="submit" />
	<input name="pio" value="OFF7" type="submit" />-->
	<br />
	<br />
	<input name="pio" value="ON0" type="submit" />
	<input name="pio" value="OFF0" type="submit" />
	</form>
</div>