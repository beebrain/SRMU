<?php 
$link_dataresearcherAward= site_url() . 'researcherAward/dataResearcherAward/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลรางวัลผลงานผู้วิจัย </a></div>
	


		<?php
			print form_open_multipart("researcherAward/update_ResearcherAward/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
					<div class="element">
						<label>ชื่อรางวัลที่ได้รับ  : </label>
						<input type="text" name="researcherAward_name_value" class="text" value="<?php print $rs['researcherAward_name'];?>"/>
						<?php echo form_error('researcherAward_name_value'); ?>
					</div>
					
					<div class="element">
						<label>ชื่อการประชุมทางวิชาการ : </label>
						<input type="text" name="researcherAward_meeting_value" class="text" value="<?php print $rs['researcherAward_meeting'];?>"/>
						<?php echo form_error('researcherAward_meeting_value'); ?>
					</div>
					<div class="element">
						<label>สาขาที่ได้รับรางวัล : </label>
						<input type="text" name="researcherAward_branch_value" class="text" value="<?php print $rs['researcherAward_branch'];?>" />
					</div>
					
					<div class="element">
						<label for="name">รายละเอียดรางวัล :</label>
						

             		 <textarea name="researcherAward_detail_value" class="ckeditor" ><?php print $rs['researcherAward_detail'];?></textarea>
            			</div>
           			 <div class="element">
						<label>หน่วยงานที่มอบรางวัล : </label>
						<input type="text" name="researcherAward_agencies_value" class="text" value="<?php print $rs['researcherAward_agencies'];?>"/>
						<?php echo form_error('researcherAward_agencies_value'); ?>
					</div>
				
					<div class="element">
						<label for="name">วันที่ได้รับรางวัล : <input type="text" placeholder="วันที่ประกาศ" size="20" id="datepicker-th" name="researcherAward_date_value" value="<?php print $rs['researcherAward_date'];?>" /></label>
					</div>
					
					<?php 
					if ($rs['researcherAward_file']){
						print '<div class="element">';
						print '<label for="name">ไฟล์รายละเอียดข่าวสารประชาสัมพันธ์  : '.$rs['researcherAward_file'].'</label>';
						print '</div>'	;

						}
					?>

   					<div class="element">
   					<?php echo $this->session->flashdata('msg'); ?> 
   					<label for="name">แก้ไขไฟล์รายละเอียดข่าวสารประชาสัมพันธ์ :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
					<input type="file" name="file_researcherAward" />
					</div>
					
					
					</br>
					<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataresearcherAward?>">ยกเลิก</a>
					</div>

			
				<?php print form_close();?>

	</div>
		
</div>



