							<script>
							$(document).ready(function(){
								$('input.aktifasig[type="checkbox"]').change(function() {
									var obj=$(this);
									$.ajax({
										type: "POST",
										data: "&ajax=1&val="+$(obj).val()+'&name='+$(obj).attr('name')+'&id_group='+$(obj).attr('id_group'),
										url: '<?=base_url()?>setting/setaktifg',
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
							});
							
							function updateg(obj){
								var value=$(obj).val();
								var idgroup=$(obj).attr('idgroup');
								var field=$(obj).attr('field');
								$(obj).parent().html(value);
								$.ajax({
										type: "POST",
										data: "id_group="+idgroup+"&"+field+"="+value,
										url: base_url+'setting/updategroup',
										beforeSend: function() {
											$(obj).parent().append("<img class='wait' style='position: relative; margin: 0px; float: right; left: 10px; top: 0px;' src='<?=$this->config->item('images').'loading.png';?>' />");
										},
										success: function(msg) {
												
										}
								});
							}
							function editfield(obj,id_group,field){
								var value=$(obj).html();
								var childval=$(obj).children('input[type["text"]]').attr('type');
								if(childval!='text'){
									$(obj).html('<input maxlength="100" field="'+field+'" size="1" id="'+value+''+id_group+'" idgroup="'+id_group+'" class="editintd"   onblur="updateg(this)" type="text" value="'+value+'" name="edit['+id_group+']" />');	
									$('#'+value+''+id_group+'').select();
								}
								$(obj).children('input[type["text"]]').focus();				

							}
							</script>
							
							<h2>Group List</h2>
							<table>
								<thead>
									<tr> 
										<th style="width:20px;"> No </th>
										<th> Name </th>
										<th> Active </th>
									</tr>                            
								</thead>
								<tbody>
								<? $no=1; foreach($group as $groupd){?>
									<tr> 
										<td> <?=$no++;?> </td>
										<td class="left"  onclick="editfield(this,'<?=$groupd->id?>','nama')"><?=$groupd->nama?></td>
										<td> <input class="aktifasig" id_group="<?=$groupd->id?>" type="checkbox" name="aktif" <?if($groupd->aktif==1){echo 'checked';}?> value="<?=$groupd->aktif?>" /> </td>
									</tr>     
								<? } ?>
								</tbody>
							</table>