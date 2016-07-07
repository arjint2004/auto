			<script>
				$(document).ready(function(){
					//Submit Start
					$(".editdatadata").click(function(e){
						$('#ajaxside').load('<?=base_url()?>admin/pelajaran/editdatadata/'+$(this).attr('id'));
					});
					
					$("#kirimdataadd").click(function(){
						$.ajax({
							type: "POST",
							data: '',
							url: '<?=base_url()?>akademik/kirimdata/kirimdatautama',
							beforeSend: function() {
								$("#kirimdata").append("<img style='float: right; position: absolute; top: -5px; right: 3px;' id='wait' src='<?=$this->config->item('images').'loading.png';?>' />");
							},
							success: function(msg) {
								$("#wait").remove();
								$("#subjectlist").html(msg);	
							}
						});
						return false;
					});//Submit End
					$("a.gpioswitch").click(function(e){
						e.stopImmediatePropagation();
						var obj=$(this);
						$.ajax({
							type: "POST",
							data: '&value='+$(this).attr('value')+'&id_point='+$(this).attr('id_point')+'&id_gpio='+$(this).attr('id_gpio'),
							url: '<?=base_url()?>setting/setgpio',
							beforeSend: function() {
								$(obj).after("<img class='wait"+$(obj).attr('id_point')+"' style='float: none; margin: 0px; position: relative; top: 1px; left: -6px;' src='<?=$this->config->item('images').'loading.png';?>' />");
								$(obj).hide();
							},
							success: function(msg) {
								$(".wait"+$(obj).attr('id_point')+"").remove();
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
					$("#settingtab").click(function(){
						$.ajax({
							type: "POST",
							data: '',
							url: '<?=base_url()?>setting/index',
							beforeSend: function() {
								$("#settingtab").append("<img class='wait' src='<?=$this->config->item('images').'loading.png';?>' />");
							},
							success: function(msg) {
								$(".wait").remove();
								$("#subjectlist").html(msg);	
							}
						});
						return false;
					});//Submit End
					$("#monitor").click(function(){
						$.ajax({
							type: "POST",
							data: '',
							url: '<?=base_url()?>setting/monitor',
							beforeSend: function() {
								$("#monitor").append("<img class='wait' src='<?=$this->config->item('images').'loading.png';?>' />");
							},
							success: function(msg) {
								$(".wait").remove();
								$("#monitorlist").html(msg);	
							}
						});
						return false;
					});//Submit End
					$.ajax({
							type: "POST",
							data: 'ajax=1',
							url: '<?=base_url()?>setting/index',
							beforeSend: function() {
								$("#filterpelajarandata select#pelajaran").after("<img class='wait' src='<?=$this->config->item('images').'loading.png';?>' />");
							},
							success: function(msg) {
								$(".wait").remove();
								$("#subjectlist").html(msg);	
							}
						});
				});

				</script>
            <!-- **Content** -->
            <div class="content content-full-width">
                <!-- **Styled Elements** -->  
                <div class="styled-elements">
                    <!--<h2> Control Panel </h2>-->
                    <div class="tabs-container">
                        <ul class="tabs-frame">
                            <? if($this->session->userdata['logged_in']['id_group']==31){?><li id="settingtab"><a href="#">Setting</a></li><? } ?>
                            <li id="monitor"><a href="#">Monitor</a></li>
							<? 
							if(!empty($group)){
							foreach($group as $dtgroup){?>
                            <li><a href="#"><?=$dtgroup->nama?></a></li>
							<? } } ?>
                        </ul>
                        <? if($this->session->userdata['logged_in']['id_group']==31){?><div class="tabs-frame-content" id="subjectlist"></div><? } ?>
						<div class="tabs-frame-content" id="monitorlist">
							
						</div>
                        <? if(!empty($group)){
						foreach($group as $dtgroup){?>
                        <div class="tabs-frame-content">
                            <? if(!empty($point[$dtgroup->id])){foreach($point[$dtgroup->id] as $dtppoint){
							   if($dtppoint->nyala==0){$btn="light-grey";$value=0;}elseif($dtppoint->nyala==1){$btn="orange";$value=1;}
							?>
								<a href="" title="" id_point="<?=$dtppoint->id?>" value="<?=$value?>" class="gpioswitch button small <?=$btn?>" id_gpio="<?=$dtppoint->gpio_no?>"><?=$dtppoint->nama?></a>
							<? } } ?>
                        </div>
						<? }} ?>
                    </div>
                    
                    <div class="hr"> </div>
                    <div class="clear"> </div>
                </div> <!-- **Styled Elements - End** -->  
                
                
            </div> <!-- **Content - End** -->   	
            