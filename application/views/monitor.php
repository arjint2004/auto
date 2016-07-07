							<script>
							$(document).ready(function(){
								$("a.gpioswitch").click(function(e){
									e.stopImmediatePropagation();
									var obj=$(this);
									$.ajax({
										type: "POST",
										data: '&value='+$(this).attr('value')+'&id_point='+$(this).attr('id_point')+'&id_gpio='+$(this).attr('id_gpio'),
										url: '<?=base_url()?>setting/setgpio',
										beforeSend: function() {
											$(obj).after("<img class='wait' style='float: none; margin: 0px; position: relative; top: 1px; left: -6px;' src='<?=$this->config->item('images').'loading.png';?>' />");
											$(obj).hide();
										},
										success: function(msg) {
											$(".wait").remove();
											$(obj).show();
											if(msg==1){
												$(obj).attr('class','gpioswitch button small orange');
												$(obj).attr('value',msg);
											}else if(msg==0){
												$(obj).attr('class','gpioswitch button small light-grey');
												$(obj).attr('value',msg);
											}
											$("#subjectlist").html(msg);
										}
									});
									return false;
								});//Submit End
							});
							</script>
							<h2 style="margin-bottom:15px;">Monitor All Point</h2>
							<div class="hr" style="margin-top:0;"> </div>
							<? //pr($point);?> 
							<table>
								<thead>
									<tr>
										<th style="width:15px;">No</th>
										<th>Group</th>
										<th>Point</th>
										<th>Condition</th>
									</tr>
								
								</thead>
								<tbody>	
									<? if(!empty($point)){
									$no=1;
									foreach($point as $dtpoint){?>
									<tr>
										<td><?=$no++?></td>
										<td class="left"><?=$dtpoint->group?></td>
										<td class="left"><?=$dtpoint->nama?></td>
										<td>
											<? 
											   if($dtpoint->nyala<=0){$btn="light-grey";$value=0;}elseif($dtpoint->nyala>=1){$btn="orange";$value=1;}
											?>
												<a href="" title="" id_point="<?=$dtpoint->id?>" value="<?=$value?>" class="gpioswitch button small <?=$btn?>" id_gpio="<?=$dtpoint->gpio_no?>"><?=$dtpoint->nama?></a>
										</td>
									</tr>
									<? } } ?>
								</tbody>
							</table>