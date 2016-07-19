<?php 
$link_datapartent= site_url() . 'partent/datapartent/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลผลงานทรัยพ์สินทางปัญญา</a> </div>
	


		<?php
			print form_open_multipart("partent/update_partent/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
				<div class="element">
					<label for="name" > โครงการวิจัย :	
					<select class="err" name="research_id" style="text align:center; width: 100%">
					<?php
						if($queryResearch->num_rows()==0){	
						echo '<option value="">ไม่พบข้อมูลโครงการวิจัย</option>';			
						}else{
						foreach($queryResearch->result() as $row){
							echo '<option value='.$row->research_id.'>'.$row->research_name_th.'</option>';
							if ($row->research_id==$rs['research_id'])
							{		
								echo '<option value='.".$row->research_id.". ' selected="selected" >'.$row->research_name_th;
							}
							
							}
							}
						?>
						</select>
						</label>
						<?php echo form_error('research_id'); ?>
					</div>
		
					<div class="element">
						<label>ชื่อผลงานนำเสนอ   : </label>
						<input type="text" name="partent_name" class="text" value="<?php print $rs['partent_name'];?>"/>
						<?php echo form_error('partent_name'); ?>
					</div>
					
					<div class="element">
						<label>เลขทะเบียน : </label>
						<input type="text" name="partent_no" class="text" value="<?php print $rs['partent_no'];?>"/>
						<?php echo form_error('partent_no'); ?>
					</div>
					
					<div class="element">	
						<label for="comments">ประเภทการจดทะเบียน: 
						&nbsp;&nbsp;<input type="radio" name="partent_type" value="1" <?php if ($rs['partent_type']==1) echo "checked='checked'";?> />สิทธิบัตร   
						&nbsp;&nbsp;<input type="radio" name="partent_type" value="2"<?php if ($rs['partent_type']==2)  echo "checked='checked'";?> /> อนุสิทธิบัตร 
						&nbsp;&nbsp;<input type="radio" name="partent_type" value="3"<?php if ($rs['partent_type']==3)  echo "checked='checked'";?> />ลิขสิทธิ์
					</label>
					</div>
					
					<div class="element">
						<label>หน่วยงานที่ดำเนินการขอความคุ้มครองทรัพย์สินทางปัญญา : 
						
						<input type="text" name="partent_agencies" class="text" value="<?php print $rs['partent_agencies'];?>"/>
						</label>
						<?php echo form_error('partent_agencies'); ?>
					</div>
					
			
           			
				
					<div class="element">
						<label for="name">วันที่จดทะเบียน : <input type="text" placeholder="วันที่ประกาศ" size="20" id="datepicker-th" name="partent_date" value="<?php print $rs['partent_date'];?>" /></label>
					</div>
					
					<?php 
					if ($rs['partent_file']){
						print '<div class="element">';
						print '<label for="name">ไฟล์รายละเอียดผลงานทรัยพ์สินทางปัญญา  : '.$rs['partent_file'].'</label>';
						print '</div>'	;

						}
					?>

   					<div class="element">
   					<?php echo $this->session->flashdata('msg'); ?> 
   					<label for="name">แก้ไขไฟล์ผลงานทรัยพ์สินทางปัญญา :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
					<input type="file" name="file_partent" />
					</div>
					
					
					</br>
					<button  id="ok" type="submit" name="bsave">บันทึกข้อมูล</button>
					<a id="cancel" class="button" href="<?php echo $link_datapartent?>">ยกเลิก</a>
					</div>

			
				<?php print form_close();?>

	</div>
		
</div>



