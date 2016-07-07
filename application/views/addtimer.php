						<script>
								$(document).ready(function(){
									$("select#type").change(function(){
										var obj=$(this);
										$.ajax({
											type: "POST",
											data: $('form#addtimer').serialize()+'&save=no',
											url: '<?=base_url()?>setting/addtimer',
											beforeSend: function() {
												$(obj).after("<img class='wait' style='float: none; right: 0px; top: 2px;;' src='<?=$this->config->item('images').'loading.png';?>' />");
											},
											success: function(msg) {
											$(".wait").remove();
											$("#fancybox-content div").html(msg);	
											}
										});
										return false;
									});
									$("#addtimer").each(function(){
										$container = $(this).next("div.error-container");
										//Validate Starts
										$(this).validate({
											onfocusout: function(element) {	$(element).valid();	},
											errorContainer: $container,
											rules:{
											  <? if(@$_POST['type']=='schedulled'){?>
											  date_on:{required:true,notEqual:''},
											  date_off:{required:true,notEqual:''},
											  <? } ?>
											  time_on:{required:true,notEqual:''},
											  time_off:{required:true,notEqual:''}
											}
										});//Validate End

									});
									
									$("#canceladdtimer").click(function(e){
										$.fancybox.close();
									});
									$(".edittimer").click(function(e){
												var obj=$(this);
												$.ajax({
													type: "POST",
													data: 'id_timer='+$(obj).attr('id_timer')+'&id_point='+$(obj).attr('id_point'),
													url: '<?=base_url()?>setting/edittimer',
													beforeSend: function() {
														$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
													},
													success: function(msg) {
														$(".wait").remove();
														$("div#addeditarea").html(msg);
														
													}
												});
												return false;
									});
									
									$("a.deletetimer").click(function(e){
										if(confirm('Timer will be deleted, Are you sure ?')){
											var obj=$(this);
												$.ajax({
													type: "POST",
													data: 'id_timer='+$(obj).attr('id_timer'),
													url: '<?=base_url()?>setting/deletetimet',
													beforeSend: function() {
														$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
													},
													success: function(msg) {
														$(".wait").remove();
														if(msg==1){
															$(obj).parent('td').parent('tr').remove();
														}
													}
												});
												return false;
										}
										
									});
									
									$("#addtimer").submit(function(e){
										$frm = $(this);
											  <? if(@$_POST['type']=='schedulled'){?>
										$date_on = $frm.find('*[name=date_on]').val();
										$date_off = $frm.find('*[name=date_off]').val();
											  <? } ?>
										$time_on = $frm.find('*[name=time_on]').val();
										$time_off = $frm.find('*[name=time_off]').val();
										if(<? if(@$_POST['type']=='schedulled'){?>$frm.find('*[name=date_on]').is('.valid') && $frm.find('*[name=date_off]').is('.valid') &&<? } ?> $frm.find('*[name=time_on]').is('.valid') && $frm.find('*[name=time_off]').is('.valid')) {
											$.ajax({
												type: "POST",
												data: $(this).serialize()+'&save=yes',
												url: $(this).attr('action'),
												beforeSend: function() {
													$("#savegroup").after("<img class='wait' style='margin:0;float:right;'  src='<?=$this->config->item('images').'loading.png';?>' />");
												},
												success: function(msg) {
													$(".wait").remove();
													$.fancybox.close();
													$.ajax({
														type: "POST",
														data: 'ajax=1&id_point=<?=$point[0]->id?>',
														url: '<?=base_url()?>setting/timerlist',
														beforeSend: function() {
															$("#savegroup").after("<img class='wait' src='<?=$this->config->item('images').'loading.png';?>' />");
														},
														success: function(msg) {
															$(".wait").remove();
															$("#timerlist").html(msg);	
														}
													});
												}
											});
											return false;
										}
										return false;
									});	
									
								});	
						
							</script>
							<script >

							$('#date_on,#date_off').datepicker();
							$('#time_on,#time_off').timepicker();
							</script>
						<div id="addgruparea" style="width:450px;">
							<div id="addeditarea">
							
								<!--<div class="hr"> </div>
								<div class="clear"> </div>-->
								<?
								if(isset($point[0]->type) && !isset($_POST['type'])){
									$_POST['type']=$point[0]->type;
								}
								
								if(isset($point[0]->every_timer) && !isset($_POST['every_timer'])){
									$_POST['every_timer']=$point[0]->every_timer;
								}
								?>
							<form class="sendmail raspi" action="<?=base_url('setting/addtimer')?>" method="post" id="addtimer">
								<table>
									<tr>
										<td class="left" style="width:170px;" class="left">Type *</td>
										<td style="width:1%;">:</td>
										<td class="left">
											<select id="type" name="type" style="width:150px;">
												<option <? if(@$_POST['type']=='byday'){echo "selected";}?> value="byday">By Day</option>
												<option <? if(@$_POST['type']=='schedulled'){echo "selected";}?> value="schedulled">Custom</option>
											</select> 
										</td>
									</tr>
									<? if(@$_POST['type']=='byday'){
										$every_timer=@json_decode($point[0]->every_timer);
									?>
									<tr>
										<td class="left">Schedule *</td>
										<td>:</td>
										<td class="left">
											<select id="every_timer" name="every_timer[]" multiple style="width:150px;">
												<option <? if(@in_array('Sunday',$every_timer)){echo "selected";}?> value="Sunday">Sunday</option>
												<option <? if(@in_array('Monday',$every_timer)){echo "selected";}?> value="Monday">Monday</option>
												<option <? if(@in_array('Tuesday',$every_timer)){echo "selected";}?> value="Tuesday">Tuesday</option>
												<option <? if(@in_array('Wednesday',$every_timer)){echo "selected";}?> value="Wednesday">Wednesday</option>
												<option <? if(@in_array('Thursday',$every_timer)){echo "selected";}?> value="Thursday">Thursday</option>
												<option <? if(@in_array('Friday',$every_timer)){echo "selected";}?> value="Friday">Friday</option>
												<option <? if(@in_array('Saturday',$every_timer)){echo "selected";}?> value="Saturday">Saturday</option>
											</select> 
										</td>
									</tr>
									<? }else{ ?>
									 <input name="every_timer[]" type="hidden" id="every_timer" value="schedulled" />    
									<? } ?>
									<? if(@$_POST['type']=='schedulled'){?>
									<tr>
										<td class="left">Date Start ON *</td>
										<td>:</td>
										<td> <input name="date_on" type="text" id="date_on" style="width:100px;" value=""/></td>
									</tr>
									<? } ?>
									<tr>
										<td class="left">Time Start ON *</td>
										<td>:</td>
										<td><input name="time_on" type="text" id="time_on" style="width:100px;" value="" /></td>
									</tr>
									<? if(@$_POST['type']=='schedulled'){?>
									<tr>
										<td class="left">Date Start OFF *</td>
										<td>:</td>
										<td> <input name="date_off" type="text" id="date_off" style="width:100px;" value="" /></td>
									</tr>
									<? } ?>
									<tr>
										<td class="left">The length of time lights up *</td>
										<td>:</td>
										<td>
											<input name="time_off" type="text" id="time_off" style="width:100px;" value="" />   
											<input name="id_point" type="hidden"  value="<?=$point[0]->id?>" /> 
										</td>
									</tr>
									<tr>
										<td colspan="3">
											<a class="button small light-grey" id="savegroup" title="" style="cursor:pointer;" onclick="$('#addtimer').submit()"> Save </a>
											<a class="button small light-grey" id="canceladdtimer" title="" style="cursor:pointer;"> Cancel </a>
										</td>
									</tr>
								</table>
							</form>
							<div class="error-container" style="display:none;"> Please fill the above required fields! </div>
							</div>

						</div>

