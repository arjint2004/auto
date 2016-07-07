						<script>
								$(document).ready(function(){
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
									
									$("div.close,#cancelgroup").click(function(e){
										$("#timerlist").remove();
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
								});
									
						
							</script>

						<div id="timerlist">
						<div class="close"> </div>
						<a class="button small grey modal" title="Add timer for '<?=$point[0]->nama?>' " style="position: relative; float: left; margin: 0px 15px 0px 0px; top: -3px;" href="<?=base_url()?>setting/addtimer/<?=$point[0]->id?>"> New Timer </a><h2>timer List <i><?=$point[0]->nama?></i></h2>
							<table>
								<thead>
									<tr> 
										<th style="width:20px;"> No </th>
										<th> Type </th>
										<th> Light Up </th>
										<th> Light Off </th>
										<th> Active </th>
										<th> Action </th>
									</tr>                            
								</thead>
								<tbody>
								<? 
									$no=1;
									if(!empty($timer)){
										foreach($timer as $dtimer){
										
								?>
									<tr  id="trhide<?=$dtimer->id?>">
										<td><?=$no++?></td>
										<td><?=$dtimer->type?></td>
										<td id_timer="<?=$dtimer->id?>"><?=$dtimer->date_on?> <?=$dtimer->time_on?></td>
										<td id_timer="<?=$dtimer->id?>"><?=$dtimer->date_off?> <?=$dtimer->time_off?></td>
										<td><?=$dtimer->timer_service?></td>
										<td ><a style="cursor:pointer;" class="modal" title="Edit timer for '<?=$point[0]->nama?>'" href="<?=base_url()?>setting/edittimer/<?=$dtimer->id_controll?>/<?=$dtimer->id?>" >Edit</a> | <a style="cursor:pointer;" id_timer="<?=$dtimer->id?>" class="deletetimer">Delete</a></td>
									</tr>
								<? }} ?>
								</tbody>
							</table>
						<div class="hr"> </div>
							</div>