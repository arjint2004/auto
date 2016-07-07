<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title> Arjint Home Automation </title>

<!-- **Favicon** -->
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

<!-- **CSS - stylesheets** -->
<link id="default-css" href="<?=$this->config->item('css').'reset.css';?>" rel="stylesheet" type="text/css" media="all" />
<link id="default-css" href="<?=$this->config->item('css').'style.css';?>" rel="stylesheet" type="text/css" media="all" />
<link id="skin-css" href="<?=$this->config->item('skin').'';?>/blue.css" rel="stylesheet" type="text/css" media="all" />
<link id="responsive-css" href="<?=$this->config->item('css').'';?>responsive.css" rel="stylesheet" type="text/css" media="all" />

<!-- mobile setting -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie8-and-down.css" />
<![endif]-->


<!-- **Google Fonts** -->
<style>
@font-face {
  font-family: 'Droid Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Droid Sans'), local('DroidSans'), url(<?=$this->config->item('fonts').'';?>s-BiyweUPV0v-yRb-cjciBsxEYwM7FgeyaSgU71cLG0.woff) format('woff');
}
@font-face {
  font-family: 'Droid Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Droid Sans Bold'), local('DroidSans-Bold'), url(<?=$this->config->item('fonts').'';?>EFpQQyG9GqCrobXxL-KRMQFhaRv2pGgT5Kf0An0s4MM.woff) format('woff');
}
</style>


<!-- **jQuery** -->
<script type="text/javascript" src="<?=$this->config->item('js').'';?>/jquery.min.js"></script>

		<!--loading jQuery and other library-->
		<link rel="stylesheet" media="all" type="text/css" href="<?=$this->config->item('css').'';?>jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="<?=$this->config->item('css').'';?>jquery-ui-timepicker-addon.css" />
		<script type="text/javascript" src="<?=$this->config->item('js').'';?>jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?=$this->config->item('js').'';?>jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?=$this->config->item('js').'';?>jquery-ui-sliderAccess.js"></script>
		
<script type="text/javascript" src="<?=$this->config->item('js').'';?>/jquery.tabs.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('js').'';?>/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('js').'';?>/tinynav.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('js').'';?>/ultimate-custom.js"></script>


<script type="text/javascript" src="<?=$this->config->item('js').'';?>/jquery.tweet.js" charset="utf-8"></script>
<script type="text/javascript">
var base_url='<?=base_url()?>';
jQuery(function($){
	$(".tweets").tweet({
	  join_text: "auto",
	  username: "iamdesigning",
	  count: 3,
	  loading_text: "loading tweets..."
	});
  });
</script>
<script type="text/javascript" src="<?=$this->config->item('js').'';?>/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('js').'';?>/sendmail.js"></script>
<script>
function startTime(){
	var today=new Date();
	var h=today.getHours();
	var m=today.getMinutes();
	var s=today.getSeconds();
	// add a zero in front of numbers<10
	m=checkTime(m);
	s=checkTime(s);
	document.getElementById('txt').innerHTML=h+":"+m+":"+s;
	t=setTimeout(function(){startTime()},500);
}

function checkTime(i){
	if (i<10)
	  {
	  i="0" + i;
	  }
	return i;
}

$(document).ready(function(){
	startTime();
});
</script>
<script type="text/javascript" src="<?=$this->config->item('js')?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
            <script type="text/javascript" src="<?=$this->config->item('js')?>fancybox/jquery.fancybox-1.3.4.js"></script>
            <link rel="stylesheet" type="text/css" href="<?=$this->config->item('js')?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
            <script>
            $(function(){
                $(document).ajaxStop(function() { 
                    $("a.prev_image").fancybox({
                        'opacity'		: true,
                        'overlayShow'	: false,
                        'transitionIn'	: 'elastic',
                        'transitionOut'	: 'none'
                    });
     
                     $("a[rel=group_image]").fancybox({
                        'transitionIn'   : 'none',
                        'transitionOut'  : 'none',
                        'titlePosition'  : 'over',
                        'titleFormat'    : function(title, currentArray, currentIndex, currentOpts) {
                         return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                         }
                     });
                     
                     $("a.album_image").fancybox({
                        'transitionIn'   : 'none',
                        'transitionOut'  : 'none',
                        'titlePosition'  : 'over',
                        'titleFormat'    : function(title, currentArray, currentIndex, currentOpts) {
                         return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                       }
                     });
                     
                     $(".modal_dialog").fancybox();
                     $(".modal").fancybox({
                        'showCloseButton'  : true,
                        'autoScale'  : true,
                        'height'  : 768,
                        'onComplete'  : function() {
						 var offset=$('.modal').offset();
						 $('#fancybox-wrap').css('top',offset.top+'px !important');
                        
                       }
                     });
                });
            });
            </script>
</head>

<body>


<!-- **Wrapper** -->
<div id="wrapper">

    
	<?php if(isset($this->session->userdata['logged_in'])){ ?>
    <!-- **Top-Menu** -->
    <div id="top-menu">
        <div class="container">
        
            <ul class="menu">
                <li class="home">  <span class="hoverL"> <span class="hoverR"> </span> </span> <a href="index.html" title=""> Home </a></li> 
				<li> <a title=""> <?php echo @$username; ?> </a> </li>
				<li> <a href="home/logout" title=""> Logout </a> </li>
            </ul> 
                 
        </div>          	
    </div><!-- **Top-Menu - End** -->
	<?php } ?>
    <!-- ** Main** -->
    <div id="main">
    
        <!-- **Container** -->
        <div class="container">
		
			<div id="expand-toggle">
				 <div class="expand" style="background:none;" id="txt"></div>
            </div>
        <?php
			if(isset($main)) {
				$this->load->view($main);     
			}
		?>
        </div><!-- **Container - End** -->
    </div><!-- **Main - End**-->
</div><!-- **Wrapper - End** -->
		

</body>
</html>
