							<script>
							$(document).ready(function(){
								$("#addpointb").click(function(e){
									e.stopImmediatePropagation();
									$.ajax({
										type: "POST",
										data: '',
										url: '<?=base_url()?>setting/addpoint',
										beforeSend: function() {
											$("#addpointb").append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loaderhover.gif';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											$("#addpoint").html(msg);	
										}
									});
									return false;
								});//Submit End
								$(".shutdown").click(function(e){
									e.stopImmediatePropagation();
									var obj=$(this);
									if(confirm('Are you sure..? system will be '+$(this).attr('aksi')+'.!')){
										$.ajax({
											type: "POST",
											data: 'shutdown='+$(this).attr('aksi'),
											url: '<?=base_url()?>setting/shutdown',
											beforeSend: function() {
												$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loaderhover.gif';?>' />");
											},
											success: function(msg) {
												$(".wait").remove();
												if(msg=='true'){
													alert('The computer will be shuting down');
												}else{
													alert('Shutdown Failed'); 
												}
												//$("#addpoint").html(msg);	
											}
										});
										return false;
									}
									return false;
								});//Submit End
								$("#timerservice").click(function(e){
									e.stopImmediatePropagation();
									$.ajax({
										type: "POST",
										data: '',
										url: '<?=base_url()?>setting/setservice',
										beforeSend: function() {
											$("#timerservice").append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loaderhover.gif';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											if(msg=='true'){
												alert('Service Running');
											}else{
												alert('Service Not Running'); 
											}
											//$("#addpoint").html(msg);	
										}
									});
									return false;
								});//Submit End
								$("#listpointb").click(function(){
									$.ajax({
										type: "POST",
										data: '',
										url: '<?=base_url()?>setting/pointlist',
										beforeSend: function() {
											$("#listpointb").append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loaderhover.gif';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											$("#contrntlist").html(msg);	
										}
									});
									return false;
								});//Submit End
								$("#listgroupb").click(function(){
									$.ajax({
										type: "POST",
										data: '',
										url: '<?=base_url()?>setting/grouplist',
										beforeSend: function() {
											$("#listgroupb").append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loaderhover.gif';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											$("#contrntlist").html(msg);	
										}
									});
									return false;
								});//Submit End
								
								$.ajax({
										type: "POST",
										data: '',
										url: '<?=base_url()?>setting/pointlist',
										beforeSend: function() {
											$("#listpointb").append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loaderhover.gif';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											$("#contrntlist").html(msg);	
										}
									});
							});

							</script>
							<div class="styled-elements">
							Token: <?=$tokene?><br />
							<a href="<?=base_url()?>setting/addgroup" title="Add New Group"  class="button small lightblue modal"> Add Group </a>
							<a href="" title="" id="listgroupb" class="button small lightblue"> Group List </a>
							
							<a href="<?=base_url()?>setting/addpoint" title="Add New Point" class="button small grey modal"> Add Point </a>
							<a href="" title="" id="listpointb" class="button small grey"> Point List </a>
							<a href="" title="" id="timerservice" class="button small grey"> Timer Service </a>
							<a href="" title=""  aksi="halt" class="shutdown button small grey"> Shut Down </a>
							<a href="" title=""  aksi="reboot" class="shutdown button small grey"> Reboot </a>
							<div id="addpoint"></div>
							<div class="hr"> </div>
							<div class="clear"> </div>
							<div id="contrntlist">
							
							</div>
							</div>