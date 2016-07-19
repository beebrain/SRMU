<?php 
$link_dataPosition= site_url() . 'position/dataPosition/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add">&nbspเพิ่มข้อมูลตำแหน่งทางวิชาการ</a>  </div>



		<?php echo form_open('position/savenew_position/'.$this->uri->segment(3)); ?>
	
					<div class="element">
						<label>ชื่อตำแหน่งทางวิชาการ (TH) : </label>
						<input type="text"name="position_value" placeholder="กรุณากรอกข้อมูลชื่อตำแหน่งทางวิชาการภาษาไทย " class="text err"/>
						<?php echo form_error('position_value'); ?>
					</div>
					
					<div class="element">
						<label>ชื่อตำแหน่งทางวิชาการ (EN) : </label>
						<input type="text"name="position_value_EN" placeholder="กรุณากรอกข้อมูลชื่อตำแหน่งทางวิชาการภาษาอังกฤษ " class="text err"/>
						<?php echo form_error('position_value_EN'); ?>
					</div>

					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataPosition; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


