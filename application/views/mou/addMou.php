<?php 
$link_dataMou = site_url() . 'mou/dataMou/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add">เพิ่มข้อมูลความร่วมมือด้านการวิจัย</a></div>

	

				<?php print form_open_multipart("mou/savenew_Mou/".$this->uri->segment(3)); ?>

					<div class="element">
						<label>ชื่อบันทึกความร่วมมือด้านการวิจัย  : </label>
						<input type="text"name="mou_name_value" class="text err" placeholder="กรุณากรอกข้อมูลชื่อบันทึกความร่วมมือด้านการวิจัย  "/>
						<?php echo form_error('mou_name_value'); ?>
					</div>

		
					
					<div class="element">
						<label for="name">รายละเอียดข้อมูลความร่วมมือด้านการวิจัย  :</label>
						 <textarea name="mou_detail_value" class="ckeditor" ></textarea>
						
					</div>
					
					<div class="element">
						<label>ชื่อหน่วยงานความร่วมมือด้านการวิจัย  : </label>
						<input type="text"name="mou_agencies_value" class="text err"placeholder="กรุณากรอกข้อมูลชื่อหน่วยงานความร่วมมือด้านการวิจัย  "/>
						<?php echo form_error('mou_agencies_value'); ?>
					</div>
					<div class="element">
						<?php echo $this->session->flashdata('msg'); ?> 
						<label for="name">แนบไฟล์รายละเอียดความร่วมมือด้านการวิจัย :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
						<input type="file" name="file_mou" />

					</div>

					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataMou; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>
</div>
	</div>



