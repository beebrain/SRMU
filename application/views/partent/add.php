
<?php 
$link_datapartent = site_url() . 'partent/datapartent/'.$this->uri->segment(3); ?>

<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add">เพิ่มข้อมูลผลงานทรัยพ์สินทางปัญญา</a></div>

		<?php echo form_open_multipart('partent/savenew_partent/'.$this->uri->segment(3)); ?>
	
				<div class="element">
							<label for="name" > โครงการวิจัย : 
					
					<select class="err" name="research_id" style="text align:center; width: 100%">
					<?php
						if($queryResearch->num_rows()==0){	
						echo '<option value="">ไม่พบข้อมูลโครงการวิจัย</option>';			
						}else{
						echo '<option value="">--------  กรุณาข้อมูลเลือกโครงการวิจัย  ---------</option>';
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
						<label>ชื่อในการจดทะเบียน : <br>
						
						<input type="text" name="partent_name" placeholder="กรุณากรอกข้อมูลชื่อในการจดทะเบียน " class="text err"/>
						</label>
						<?php echo form_error('partent_name'); ?>
					</div>

					<div class="element">
						<label>เลขที่ทะเบียน : 
						
						<input type="text" name="partent_no" placeholder="กรุณากรอกข้อมูลเลขที่ทะเบียน "size="30" class="err"/>
						</label>
						<?php echo form_error('partent_meeting'); ?>
					</div>
					
					<div class="element">	
						<label for="comments">ประเภทการจดทะเบียน : 
						&nbsp;&nbsp;<input type="radio" name="partent_type" value="1" checked="checked" /> สิทธิบัตร  
						&nbsp;&nbsp;<input type="radio" name="partent_type" value="2" /> อนุสิทธิบัตร 
						&nbsp;&nbsp;<input type="radio" name="partent_type" value="3"/> ลิขสิทธิ์
					</label>
					</div>
				
					<div class="element">
						<label>หน่วยงานที่ดำเนินการขอความคุ้มครองทรัพย์สินทางปัญญา : 
						
						<input type="text" placeholder="กรุณากรอกข้อมูลหน่วยงานที่ดำเนินการขอความคุ้มครองทรัพย์สินทางปัญญา " name="partent_agencies" class="text err"/>
						</label>
						<?php echo form_error('partent_agencies'); ?>
					</div>
           			
					<div class="element">
						<label for="name">วันที่จดทะเบียน : <input type="text" placeholder="คลิกเพื่อเพิ่มข้อมูลวันที่จดทะเบียน " size="30" id="datepicker-th" name="partent_date" /></label>
					</div>

					<div class="element">
					
						<?php echo $this->session->flashdata('msg'); ?> 
						<label for="name">แนบไฟล์ผลงานทรัยพ์สินทางปัญญา :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
						<input type="file" name="partent_file" />
						
						 
					</div>
					
					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button>
						<a id="cancel" class="button" href="<?php echo $link_datapartent; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>



