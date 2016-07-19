<?php 
$link_dataresearchAward= site_url() . 'researchAward/dataresearchAward/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลรางวัลผลงานโครงการวิจัย </a></div>
	


		<?php
			print form_open_multipart("researchAward/update_researchAward/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
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
						<label>ชื่อรางวัลที่ได้รับ  : </label>
						<input type="text" name="researchAward_name" class="text" value="<?php print $rs['researchAward_name'];?>"/>
						<?php echo form_error('researchAward_name'); ?>
					</div>
					
					<div class="element">
						<label>ชื่อการประชุมทางวิชาการ : </label>
						<input type="text" name="researchAward_meeting" class="text" value="<?php print $rs['researchAward_meeting'];?>"/>
						<?php echo form_error('researchAward_meeting'); ?>
					</div>
					<div class="element">
						<label>สาขาที่ได้รับรางวัล : </label>
						<input type="text" name="researchAward_branch" class="text" value="<?php print $rs['researchAward_branch'];?>" />
					</div>
					
					<div class="element">
						<label for="name">รายละเอียดรางวัล :</label>
						

             		 <textarea name="researchAward_detail" class="ckeditor" ><?php print $rs['researchAward_detail'];?></textarea>
            			</div>
           			 <div class="element">
						<label>หน่วยงานที่มอบรางวัล : </label>
						<input type="text" name="researchAward_agencies" class="text" value="<?php print $rs['researchAward_agencies'];?>"/>
						<?php echo form_error('researchAward_agencies'); ?>
					</div>
				
					<div class="element">
						<label for="name">วันที่ได้รับรางวัล : <input type="text" placeholder="วันที่ประกาศ" size="20" id="datepicker-th" name="researchAward_date" value="<?php print $rs['researchAward_date'];?>" /></label>
					</div>
					
					<?php 
					if ($rs['researchAward_file']){
						print '<div class="element">';
						print '<label for="name">ไฟล์รายละเอียดข่าวสารประชาสัมพันธ์  : '.$rs['researchAward_file'].'</label>';
						print '</div>'	;

						}
					?>

   					<div class="element">
   					<?php echo $this->session->flashdata('msg'); ?> 
   					<label for="name">แก้ไขไฟล์รายละเอียดข่าวสารประชาสัมพันธ์ :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
					<input type="file" name="file_researchAward" />
					</div>
					
					
					</br>
					<button  id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataresearchAward?>">ยกเลิก</a>
					</div>

			
				<?php print form_close();?>

	</div>
		
</div>



