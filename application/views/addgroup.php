						<div id="addgruparea">
						<script>
								$(document).ready(function(){
									$("#addgroupf").each(function(){
										$container = $(this).next("div.error-container");
										//Validate Starts
										$(this).validate({
											onfocusout: function(element) {	$(element).valid();	},
											errorContainer: $container,
											rules:{
											  nama:{required:true,notEqual:''},
											}
										});//Validate End

									});
									
									$("#cancelgroup").click(function(e){
										$.fancybox.close();
									});
									$("#addgroupf").submit(function(e){
										$frm = $(this);
										$name = $frm.find('*[name=nama]').val();
										if($frm.find('*[name=nama]').is('.valid')) {
											$.ajax({
												type: "POST",
												data: $(this).serialize(),
												url: $(this).attr('action'),
												beforeSend: function() {
													$("#savegroup").after("<img class='wait' style='margin:0;float:right;'  src='<?=$this->config->item('images').'loading.png';?>' />");
												},
												success: function(msg) {
													$(".wait").remove();
													$.ajax({
														type: "POST",
														data: 'ajax=1',
														url: '<?=base_url()?>setting/grouplist',
														beforeSend: function() {
															$("#savegroup").after("<img class='wait' src='<?=$this->config->item('images').'loading.png';?>' />");
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
										
										return false;
									});//Submit End	
									
								});
							</script>	
						<form  style="width:400px;" class="sendmail raspi" action="<?=base_url('setting/addgroup')?>" method="post" id="addgroupf">
						<table>
							<tr>
								<td class="left" style="width:100px;">Group Name *</td>
								<td>:</td>
								<td class="left"><input type="text" name="nama" style="width:150px;"></td>
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
								<td colspan="3" class="left"><a class="button small light-grey" id="savegroup" title="" style="cursor:pointer;" onclick="$('#addgroupf').submit()"> Save </a>
								<a class="button small light-grey" id="cancelgroup" title="" style="cursor:pointer;"> Cancel </a></td>
							</tr>
						</table>
                            <p>
                            	<label>  </label>
                                                               
                            </p>
                             
                            <p>
								<label>   </label>
							</p>
								
								
                            
                        </form>
                        <div class="error-container" style="display:none;"> Please fill the above required fields! </div>
						</div>