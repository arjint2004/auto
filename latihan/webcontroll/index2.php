<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Your Page Title Here :)</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">Home Automation</h1>
			<h5>Version 1.1</h5>
			<hr />
		</div>
		<div class="one-third column">
			<h3>Tombol</h3>
			<? 
			print_r($_POST);
			switch($_POST['pio']){
				case"ON3":
				 echo shell_exec("../python mcp23017.py -b a -o 3 -s high");
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
		</div>


	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>