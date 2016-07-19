<?php 
$link_datapresentation= site_url() . 'presentation/datapresentation/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลผลงานนำเสนอในการประชุมวิชาการ</a> </div>
	


		<?php
			print form_open_multipart("presentation/update_presentation/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
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
						<input type="text" name="presentation_name" class="text" value="<?php print $rs['presentation_name'];?>"/>
						<?php echo form_error('presentation_name'); ?>
					</div>
					
					<div class="element">
						<label>ชื่อการประชุมทางวิชาการ : </label>
						<input type="text" name="presentation_meeting" class="text" value="<?php print $rs['presentation_meeting'];?>"/>
						<?php echo form_error('presentation_meeting'); ?>
					</div>
					
					<div class="element">	
						<label for="comments">ประเภทการนำเสนอ :<br><br>
						&nbsp;&nbsp;<input type="radio" name="presentation_type" value="1" <?php if ($rs['presentation_type']==1) echo "checked='checked'";?> /> ภาคบรรยาย (Oral) 
						&nbsp;&nbsp;<input type="radio" name="presentation_type" value="2"<?php if ($rs['presentation_type']==2)  echo "checked='checked'";?> /> ภาคโปสเตอร์ (Poster)
						&nbsp;&nbsp;<input type="radio" name="presentation_type" value="3"<?php if ($rs['presentation_type']==3)  echo "checked='checked'";?> /> ภาคบรรยายและภาคโปสเตอร์ 
					</label>
					</div>
						<div class="element">	
						<label for="comments">ระดับการการนำเสนอ :
						&nbsp;&nbsp;<input type="radio" name="presentation_kind" value="1" <?php if ($rs['presentation_kind']==1) echo "checked='checked'";?> /> ระดับชาติ 
						&nbsp;&nbsp;<input type="radio" name="presentation_kind" value="2" <?php if ($rs['presentation_kind']==2) echo "checked='checked'";?>/> ระดับนานาชาติ

					</label>
					</div>
					
					<div class="element">
						<label>สถานที่นำเสนอ : </label>
						<input type="text" name="location_name" class="text" value="<?php print $rs['location_name'];?>" />
					</div>
					
					<div class="element">
						<label>ประเทศที่นำเสนอ: </label>
						<input type="text" name="country_name" class="text"value="<?php print $rs['country_name'];?>" />
					</div>
           			
				
					<div class="element">
						<label for="name">วันที่ได้รับรางวัล : <input type="text" placeholder="วันที่ประกาศ" size="20" id="datepicker-th" name="presentation_date" value="<?php print $rs['presentation_date'];?>" /></label>
					</div>
					
					<?php 
					if ($rs['presentation_file']){
						print '<div class="element">';
						print '<label for="name">ไฟล์รายละเอียดผลงานนำเสนอ  : '.$rs['presentation_file'].'</label>';
						print '</div>'	;

						}
					?>

   					<div class="element">
   					<?php echo $this->session->flashdata('msg'); ?> 
   					<label for="name">แก้ไขไฟล์รายละเอียดผลงานนำเสนอ :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
					<input type="file" name="file_presentation" />
					</div>
					
					
					<br>
					<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button>
					<a id="cancel" class="button" href="<?php echo $link_datapresentation?>">ยกเลิก</a>
					</div>

			
				<?php print form_close();?>

	</div>
		
</div>



