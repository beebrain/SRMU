
<?php 
$link_datapresentation = site_url() . 'presentation/datapresentation/'.$this->uri->segment(3); ?>

<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add">เพิ่มข้อมูลผลงานนำเสนอในการประชุมวิชาการ</a></div>

		<?php echo form_open_multipart('presentation/savenew_presentation/'.$this->uri->segment(3)); ?>
	
				<div class="element">
							<label for="name" > โครงการวิจัย :
					
					<select class="err" name="research_id" style="text align:center; width: 100%">
					<?php
						if($queryResearch->num_rows()==0){	
						echo '<option value="">ไม่พบข้อมูลโครงการวิจัย</option>';			
						}else{
						echo '<option value="">--------  กรุณาเลือกข้อมูลโครงการวิจัย  ---------</option>';
						foreach($queryResearch->result() as $row){
						echo '<option value='.$row->research_id.'>'.$row->research_name_th.'</option>';
						}
						}
						?>
					</select>
						</label>
						<?php echo form_error('research_id'); ?>
					</div>

			<div class="element">
						<label>ชื่อผลงานนำเสนอ : 
						
						<input type="text" name="presentation_name" placeholder="กรุณากรอกข้อมูลชื่อผลงานนำเสนอ " class="text err"/>
						</label>
						<?php echo form_error('presentation_name'); ?>
					</div>

					<div class="element">
						<label>ชื่อการประชุมทางวิชาการ : 
						
						<input type="text" name="presentation_meeting" placeholder="กรุณากรอกข้อมูลชื่อการประชุมทางวิชาการ "  class="text err"/>
						</label>
						<?php echo form_error('presentation_meeting'); ?>
					</div>
					
					<div class="element">	
						<label for="comments">ประเภทการนำเสนอ :<br><br>
						&nbsp;&nbsp;<input type="radio" name="presentation_type" value="1" checked="checked" /> ภาคบรรยาย (Oral) 
						&nbsp;&nbsp;<input type="radio" name="presentation_type" value="2" /> ภาคโปสเตอร์ (Poster)
						&nbsp;&nbsp;<input type="radio" name="presentation_type" value="3"/> ภาคบรรยายและภาคโปสเตอร์ 
					</label>
					</div>
						<div class="element">	
						<label for="comments">ระดับการการนำเสนอ :
						&nbsp;&nbsp;<input type="radio" name="presentation_kind" value="1" checked="checked" /> ระดับชาติ 
						&nbsp;&nbsp;<input type="radio" name="presentation_kind" value="2" /> ระดับนานาชาติ

					</label>
					</div>
					<div class="element">
						<label>สถานที่นำเสนอ : 
						<input type="text" name="location_name" placeholder="กรุณากรอกข้อมูลสถานที่นำเสนอ " class="text err"/>
					</label>
							<?php echo form_error('location_name'); ?>
					</div>
					<div class="element">
						<label>ประเทศที่นำเสนอ:
						<input type="text" name="country_name"   placeholder="กรุณากรอกข้อมูลประเทศที่นำเสนอ"  class="text err"/>
					 </label>
					 		<?php echo form_error('country_name'); ?>
					</div>
					
           			
					<div class="element">
						<label for="name">วันที่ได้รับรางวัล : <input type="text" placeholder="คลิกเพื่อเพิ่มข้อมูลวันที่ได้รับรางวัล " size="30" id="datepicker-th" name="presentation_date" /></label>
					</div>

					<div class="element">
					
						<?php echo $this->session->flashdata('msg'); ?> 
						<label for="name">แนบไฟล์รายละเอียดผลงานนำเสนอ :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
						<input type="file" name="presentation_file" />
						
						 
					</div>
					
					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_datapresentation; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>



