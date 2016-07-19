<?php 
$link_dataresearcherAward = site_url() . 'researcherAward/dataResearcherAward/'.$this->uri->segment(3); ?>

<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add">เพิ่มข้อมูลรางวัลผลงานผู้วิจัย</a></div>
	


		<?php echo form_open_multipart('researcherAward/savenew_ResearcherAward/'.$this->uri->segment(3)); ?>
	
					<div class="element">
						<label>ชื่อรางวัลที่ได้รับ  : </label>
						<input type="text" name="researcherAward_name_value" class="text err" placeholder="กรุณากรอกข้อมูลชื่อรางวัลที่ได้รับ "/>
						<?php echo form_error('researcherAward_name_value'); ?>
					</div>
					
					<div class="element">
						<label>ชื่อการประชุมทางวิชาการ : </label>
						<input type="text" name="researcherAward_meeting_value" class="text err" placeholder="กรุณากรอกข้อมูลชื่อการประชุมทางวิชาการ "/>
						<?php echo form_error('researcherAward_meeting_value'); ?>
					</div>
					<div class="element">
						<label>สาขาที่ได้รับรางวัล : </label>
						<input type="text" name="researcherAward_branch_value" class="text"/>
					</div>
					
					<div class="element">
						<label for="name">รายละเอียดรางวัลผลงานผู้วิจัย :</label>
						

             		 <textarea name="researcherAward_detail_value" class="ckeditor" ></textarea>
            			</div>
           			 <div class="element">
						<label>หน่วยงานที่มอบรางวัล : </label>
						<input type="text" name="researcherAward_agencies_value" class="text err" placeholder="กรุณากรอกข้อมูลหน่วยงานที่มอบรางวัล "/>
						<?php echo form_error('researcherAward_agencies_value'); ?>
					</div>
				
					<div class="element">
						<label for="name">วันที่ได้รับรางวัล : <input type="text"  placeholder="คลิกเพื่อเพิ่มข้อมูลวันที่ได้รับรางวัล  " size="30"  id="datepicker-th" name="researcherAward_date_value" /></label>
					</div>

					<div class="element">
					
						<?php echo $this->session->flashdata('msg'); ?> 
						<label for="name">แนบไฟล์รายละเอียดรางวัลผลงานผู้วิจัย :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
						<input type="file" name="researcherAward_file" />
						
						 
					</div>
					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataresearcherAward; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>



