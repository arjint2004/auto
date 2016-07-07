<? 
			switch($_POST['pio']){
				
				case"ON4":
				 echo shell_exec("python mcp23017.py -b a -o 4 -s high");
				 die();
				break;
				
				case"OFF4":
				 echo shell_exec("python mcp23017.py -b a -o 4 -s low");
				 die();
				break;
				
				case"ON3":
				 echo shell_exec("python mcp23017.py -b a -o 3 -s high");
				 die();
				break;
				
				case"OFF3":
				 echo shell_exec("python mcp23017.py -b a -o 3 -s low");
				 die();
				break;
				
				case"ON2":
				 echo shell_exec("python mcp23017.py -b a -o 2 -s high");
				 die();
				break;
				
				case"OFF2":
				 echo shell_exec("python mcp23017.py -b a -o 2 -s low");
				 die();
				break;
				
				case"ON1":
				 echo shell_exec("python mcp23017.py -b a -o 1 -s high");
				 die();
				break;
				
				case"OFF1":
				 echo shell_exec("python mcp23017.py -b a -o 1 -s low");
				 die();
				break;
				
				
				case"ONall":
				 echo shell_exec("python mcp23017.py -b a -o 1 -s high");
				 echo shell_exec("python mcp23017.py -b a -o 2 -s high");
				 echo shell_exec("python mcp23017.py -b a -o 3 -s high");
				 echo shell_exec("python mcp23017.py -b a -o 4 -s high");
				 die();
				break;
				case"OFFall":
				 echo shell_exec("python mcp23017.py -b a -o 1 -s low");
				 echo shell_exec("python mcp23017.py -b a -o 2 -s low");
				 echo shell_exec("python mcp23017.py -b a -o 3 -s low");
				 echo shell_exec("python mcp23017.py -b a -o 4 -s low");
				 die();
				break;
			}
			
			?> 
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Asbin Project</title>
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
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
 <script>
		$(function(){	
			$('div.tombol input[type=submit]').click(function(){
				var obj=$(this);
				$.ajax({
						type: "POST",
						data: 'pio='+$(this).val(),
						url: 'http://192.168.0.155/latihan/webcontroll/',
						beforeSend: function() {
							$(obj).after("<img class='wait' style='margin:0;float:right;'  src='images/loading.png' />");
						},
						success: function(out) {
							$(".wait").remove();
							$("div#in"+$(obj).attr('tombol')+"").remove();
							$(obj).after('<div style="margin:0;float:right;" id="in'+$(obj).attr('tombol')+'">'+out+'</div>');
						}
				});
				return false;
			});
		});
 </script>
</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px"></h1>
			<h5></h5>
			<hr />
		</div>
		<div class="one-third column">
			<h3></h3>
			

			<div class="tombol" >
				<form action="" method="post" id="tombol">
				
				<input name="pio" value="ON4" tombol="4" type="submit" />
				<input name="pio" value="OFF4" tombol="4" type="submit" />
				<br />
				<br />		
				
				<input name="pio" value="ON3" tombol="3" type="submit" />
				<input name="pio" value="OFF3" tombol="3" type="submit" />
				<br />
				<br />
				
				<input name="pio" value="ON2" tombol="2" type="submit" />
				<input name="pio" value="OFF2" tombol="2" type="submit" />
				<br />
				<br />

				<input name="pio" value="ON1" tombol="1" type="submit" />
				<input name="pio" value="OFF1" tombol="1" type="submit" />
				<!--<br />
				<br />
				<input name="pio" value="ON7" type="submit" />
				<input name="pio" value="OFF7" type="submit" />-->
				<br />
				<br />
				<input name="pio" value="ONall" tombol="all" type="submit" />
				<input name="pio" value="OFFall" tombol="all" type="submit" />
				</form>
			</div>
		</div>


	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>