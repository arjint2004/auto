							<script>
							$(document).ready(function(){
								$('input.aktifasi[type="checkbox"]').change(function() {
									var obj=$(this);
									$.ajax({
										type: "POST",
										data: "&ajax=1&val="+$(obj).val()+'&name='+$(obj).attr('name')+'&id_point='+$(obj).attr('id_point'),
										url: '<?=base_url()?>setting/setaktif',
										beforeSend: function() {
											$(obj).hide();
											$(obj).after("<img id='wait'  src='<?=$this->config->item('images');?>loading.png' />");
										},
										success: function(msg) {
											$("#wait").remove();
											$(obj).show();
										}
									});
								});
								$("#addpointb").click(function(){
									$.ajax({
										type: "POST",
										data: '',
										url: '<?=base_url()?>setting/addpoint',
										beforeSend: function() {
											$("#addpointb").append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											$("#addpoint").html(msg);	
										}
									});
									return false;
								});//Submit End
								$("#addgroupb").click(function(){
									$.ajax({
										type: "POST",
										data: '',
										url: '<?=base_url()?>setting/addgroup',
										beforeSend: function() {
											$("#addgroupb").append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											$("#addpoint").html(msg);	
										}
									});
									return false;
								});//Submit End
								$("a.dell").click(function(){
									var obj=$(this);
									if(confirm('Apakah anda yakin akan menghapus ?')){
									$.ajax({
										type: "POST",
										data: 'id_point='+$(obj).attr('id_point')+'&gpio_no='+$(obj).attr('gpio_no'),
										url: '<?=base_url()?>setting/dellpoint',
										beforeSend: function() {
											$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											$("#addpoint").html(msg);	
											$.ajax({
												type: "POST",
												data: '',
												url: '<?=base_url()?>setting/pointlist',
												beforeSend: function() {
													$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
												},
												success: function(msg) {
													$(".wait").remove();
													$("#contrntlist").html(msg);	
												}
											});
										}
									});
									
									return false;
									}
								});//Submit End
								$("a.timer").click(function(){
									var obj=$(this);
									$.ajax({
										type: "POST",
										data: 'id_point='+$(obj).attr('id_point'),
										url: '<?=base_url()?>setting/timerlist',
										beforeSend: function() {
											$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
										},
										success: function(msg) {
											$(".wait").remove();
											$("#timerlist").remove();
											$("#contrntlist h2").before(msg);	
										}
									});
									return false;
								});//Submit End
							});
							
							
							function update(obj){
								var value=$(obj).val();
								var idpoint=$(obj).attr('idpoint');
								var field=$(obj).attr('field');
								$(obj).parent().html(value);
								$.ajax({
										type: "POST",
										data: "id_point="+idpoint+"&"+field+"="+value,
										url: base_url+'setting/updatepoint',
										beforeSend: function() {
											$(obj).parent().append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
										},
										success: function(msg) {
												
										}
								});
							}
							function updateselect(obj){
								var value=$(obj).val();
								var idpoint=$(obj).attr('id_point');
								var field=$(obj).attr('field');
								$.ajax({
										type: "POST",
										data: "id_point="+idpoint+"&"+field+"="+value+"&gpio_no_sebelum="+$('input#gpio_no_sebelum[type["hidden"]]').val(),
										url: base_url+'setting/updatepoint',
										beforeSend: function() {
											$(obj).parent().append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
										},
										success: function(msg) {
											$(obj).parent().html($(obj).find(":selected").text());	
										}
								});
							}
							function editfield(obj,id_point,field){
								var value=$(obj).html();
								var childval=$(obj).children('input[type["text"]]').attr('type');
								if(childval!='text'){
									$(obj).html('<input maxlength="100" field="'+field+'" size="1" id="'+value+''+id_point+'" idpoint="'+id_point+'" class="editintd"   onblur="update(this)" type="text" value="'+value+'" name="edit['+id_point+']" />');	
									$('#'+value+''+id_point+'').select();
								}
								$(obj).children('input[type["text"]]').focus();				

							}
							function blurgroup(){
								$("select#id_group").parent().html($("select#id_group").find(":selected").text());
								$("select#gpio_no").parent().html($("select#gpio_no").find(":selected").text());
							}
							function editfieldgroup(obj,id_point,field){
								var value=$(obj).attr('id_group');
								var childval=$(obj).children().attr('name');
								if(childval!='id_group'){
									$.ajax({
											type: "POST",
											data: "id_point="+id_point+"&"+field+"="+value+"&field=id_group",
											url: base_url+'setting/selectgroup',
											beforeSend: function() {
												$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
											},
											success: function(msg) {
												$(obj).html(msg);
												$("select#id_group").focus();
											}
									});	
								}else{
									
								}
							}
							function togglrtr(obj,id_tr,id_point){
								$('table tr#'+id_tr+id_point).toggle('slow', function(){
									 var $link = $('table tr#'+id_tr+id_point);
									 if($('table tr#'+id_tr+id_point).is(":visible")){
										$.ajax({
												type: "POST",
												data: "id_point="+id_point,
												url: base_url+'setting/timerlist',
												beforeSend: function() {
													$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
												},
												success: function(msg) {
													$('img.wait').remove();
													$('table tr#'+id_tr+id_point+' td').html(msg);
												}
										});
										/*$.ajax({
											type: "POST",
											data: 'id_point='+id_point,
											url: '<?=base_url()?>setting/addtimer',
											beforeSend: function() {
												$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
											},
											success: function(msg) {
												$(".wait").remove();
												$('table tr#'+id_tr+id_point+' td div#addtimer').html(msg);
											}
										});*/
									 }
								});
															
							
								//$('table tr#'+id_tr+id_point).toggle();
									
							}
							function editrelay(obj,id_point,field){
								var value=$(obj).attr('gpio_no');
								var childval=$(obj).children().attr('name');
								if(childval!='gpio_no'){
									$.ajax({
											type: "POST",
											data: "id_point="+id_point+"&"+field+"="+value+"&field=gpio_no",
											url: base_url+'setting/selectrelay',
											beforeSend: function() {
												$(obj).append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
											},
											success: function(msg) {
												$(obj).html(msg);
												$("select#gpio_no").focus();
											}
									});	
								}else{
									
								}
							}
							
							</script>
							<? //pr($point);?>
							<h2>Point List</h2>
							<table>
								<thead>
									<tr> 
										<th style="width:20px;"> No </th>
										<th style="width:20px;"> ID_Point </th>
										<th> Name </th>
										<th> Group </th>
										<th> Relay </th>
										<th> Active </th>
										<th> timer </th>
										<th> Action </th>
									</tr>                            
								</thead>
								<tbody>
								<? 
									$no=1;
									if(!empty($point)){
										foreach($point as $dpoint){
										/*if($dpoint->date_on=='0000-00-00'){
											$timer=$dpoint->type;
											//$timer=$dpoint->type.'<br />'.substr($dpoint->time_on,0,5).' - '.substr($dpoint->time_off,0,5);
										}else{
											$timer=$dpoint->type;
											//$timer=$dpoint->type.'<br />'.$dpoint->date_on.' '.substr($dpoint->time_on,0,5).' - '.$dpoint->date_off.' '.substr($dpoint->time_off,0,5);
										}*/
								?>
									<tr> 
										<td> <?=$no++?> </td>
										<td> <?=$dpoint->id?> </td>
										<td class="left"  onclick="editfield(this,'<?=$dpoint->id?>','nama')"><?=$dpoint->nama?></td>
										<td id_group="<?=$dpoint->id_group?>" onclick="editfieldgroup(this,'<?=$dpoint->id?>','id_group')"> <?=$dpoint->group?> </td>
										<td  gpio_no="<?=$dpoint->relay?>" onclick="editrelay(this,'<?=$dpoint->id?>','gpio_no')"> Relay <?=$dpoint->relay?> </td>
										<td> <input class="aktifasi" id_point="<?=$dpoint->id?>" type="checkbox" name="aktif" <?if($dpoint->aktif==1){echo 'checked';}?> value="<?=$dpoint->aktif?>" /> </td>
										<!--<td  style="cursor:pointer;" onclick="togglrtr(this,'trhide',<?=$dpoint->id?>);"> 
										<a id="timer<?=$dpoint->id?>" id_point="<?=$dpoint->id?>" class="timer"><?=$timer?></a>
										</td>-->
										<td  style="cursor:pointer;"> 
										<a id="timer<?=$dpoint->id?>" id_point="<?=$dpoint->id?>" class="timer">Manage Timer</a>
										</td>
										<td> 
										<a class="dell" id_point="<?=$dpoint->id?>" gpio_no="<?=$dpoint->gpio_no?>">Del</a>
										</td>
									</tr>   
									<tr style="display:none;" id="trhide<?=$dpoint->id?>">
										<td colspan="7"></td>
									</tr>
								<? }} ?>
								</tbody>
							</table>