							<div id="addpintarea">
							<script>
								$(document).ready(function(){
									$("#addpointf").each(function(){
										$container = $(this).next("div.error-container");
										//Validate Starts
										$(this).validate({
											onfocusout: function(element) {	$(element).valid();	},
											errorContainer: $container,
											rules:{
											  nama:{required:true,notEqual:''},
											  id_group:{required:true,notEqual:'Select Group'},
											  gpio_no:{required:true,notEqual:'Select GPIO Pin'},
											  
											}
										});//Validate End

									});
									
									$("#cancelpoint").click(function(e){
										$.fancybox.close();
									});
									$("#addpointf").submit(function(e){
										$frm = $(this);
										$nama = $frm.find('*[name=nama]').val();
										$id_group = $frm.find('*[name=id_group]').val();
										$gpio_no = $frm.find('*[name=gpio_no]').val();
										
										if($frm.find('*[name=nama]').is('.valid') && $frm.find('*[name=id_group]').is('.valid') && $frm.find('*[name=gpio_no]').is('.valid')) {
											$.ajax({
												type: "POST",
												data: $(this).serialize()+'&addpoint=1',
												url: $(this).attr('action'),
												beforeSend: function() {
													$("#savepoint").after("<img class='wait' style='margin:0;float:right;'  src='<?=$this->config->item('images').'loading.png';?>' />");
												},
												success: function(msg) {
													$(".wait").remove();
													$.ajax({
														type: "POST",
														data: 'ajax=1',
														url: '<?=base_url()?>setting/index',
														beforeSend: function() {
															$("#savegroup").after("<img class='wait' src='<?=$this->config->item('images').'loading.png';?>' />");
														},
														success: function(msg) {
															$(".wait").remove();
															$("#subjectlist").html(msg);	
														}
													});
												}
											});
											return false;
										}
										
										return false;
									});//Submit End	
									
								});
							</script>	
						<form class="sendmail raspi" style="width:500px;" action="<?=base_url()?>setting/addpoint" id="addpointf" method="post">
                            <table>
								<tr>
									<td class="left">Name *</td>
									<td>:</td>
									<td class="left"><input name="nama" type="text" />  </td>
								</tr>
								<tr>
									<td class="left">Group *</td>
									<td>:</td>
									<td class="left">
										<select name="id_group" style="width:53%;">
											<option value="">Select Group</option>
											<? foreach($group_controll as $group_c){?>
											<option value="<?=$group_c->id?>"> <?=$group_c->nama?> </option>
											<? } ?>
										</select>									
									</td>
								</tr>
								<tr>
									<td class="left">Drive For *</td>
									<td>:</td>
									<td class="left">
										<select name="gpio_no" style="width:53%;">
											<option value="">Select RELAY</option>
											<? foreach($gpio as $dgpio){?>
											<option value="<?=$dgpio->id?>">RELAY <?=$dgpio->id?></option>
											<? } ?> 
										</select> 									
									</td>
								</tr>
								<tr>
									<td class="left">Active</td>
									<td>:</td>
									<td class="left">
										<input type="hidden" name="aktif" value="0" />
										<input type="checkbox" name="aktif" value="1" />									
									</td>
								</tr>
								<tr>
									<td colspan="4" class="left">
										<a class="button small light-grey" id="savepoint" title="" style="cursor:pointer;" onclick="$('#addpointf').submit()"> Save </a>
										<a class="button small light-grey" id="cancelpoint" title="" style="cursor:pointer;"> Cancel </a>									
									</td>
								</tr>
							</table>
                            
                        </form>
                        <div class="error-container" style="display:none;"> Please fill the above required fields! </div>
						</div>