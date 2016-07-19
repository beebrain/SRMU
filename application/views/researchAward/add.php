
<?php 
$link_dataresearchAward = site_url() . 'researchAward/dataresearchAward/'.$this->uri->segment(3); ?>

<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add">เพิ่มข้อมูลรางวัลผลงานโครงการวิจัย</a></div>

		<?php echo form_open_multipart('researchAward/savenew_researchAward/'.$this->uri->segment(3)); ?>
	
				<div class="element">
							<label for="name" > โครงการวิจัย :
					
					<select class="err" name="research_id" style="text align:center; width: 100%">
					<?php
						if($queryResearch->num_rows()==0){	
						echo '<option value="">ไม่พบข้อมูลโครงการวิจัย</option>';			
						}else{
						echo '<option value="">--------  กรุณาเลือกโครงการวิจัย  ---------</option>';
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
						<label>ชื่อรางวัลผลงานโครงการวิจัย : 
						
						<input type="text" name="researchAward_name" class="text err" placeholder="กรุณากรอกข้อมูลชื่อรางวัลผลงานโครงการวิจัย "/>
						</label>
						<?php echo form_error('researchAward_name'); ?>
					</div>

					<div class="element">
						<label>ชื่อการประชุมทางวิชาการ : 
						
						<input type="text" name="researchAward_meeting" class="text err" placeholder="กรุณากรอกข้อมูลชื่อการประชุมทางวิชาการ "/>
						</label>
						<?php echo form_error('researchAward_meeting'); ?>
					</div>
					<div class="element">
						<label>สาขาที่ได้รับรางวัล : </label>
						<input type="text" name="researchAward_branch" class="text"/>
					</div>
					
					<div class="element">
						<label for="name">รายละเอียดรางวัลผลงานโครงการวิจัย :</label>
						

             		 <textarea name="researchAward_detail" class="ckeditor" ></textarea>
            			</div>
           			 <div class="element">
						<label>หน่วยงานที่มอบรางวัล : 
						<input type="text" name="researchAward_agencies" class="text err" placeholder="กรุณากรอกข้อมูลหน่วยงานที่มอบรางวัล"/>
						</label>
						<?php echo form_error('researchAward_agencies'); ?>
					</div>
				
					<div class="element">
						<label for="name">วันที่ได้รับรางวัล : <input type="text" placeholder="คลิกเพื่อเพิ่มข้อมูลวันที่ได้รับรางวัล " size="30" id="datepicker-th" name="researchAward_date" /></label>
					</div>

					<div class="element">
					
						<?php echo $this->session->flashdata('msg'); ?> 
						<label for="name">แนบไฟล์รายละเอียดรางวัลผลงานโครงการวิจัย :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
						<input type="file" name="researchAward_file" />
						
						 
					</div>
					
					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataresearchAward; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>



