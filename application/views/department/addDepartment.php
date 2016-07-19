<?php 
$link_dataDepartment= site_url() . 'department/dataDepartment/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add"> เพิ่มข้อมูลภาควิชา </a></div>



		<?php echo form_open('department/savenew_Department/'.$this->uri->segment(3)); ?>
	
					<div class="element">
						<label>ชื่อภาควิชา : </label>
						<input type="text"name="department_value" class="text err" placeholder="กรุณากรอกข้อมูลชื่อภาควิชา "/>
						<?php echo form_error('department_value'); ?>
					</div>

					<div class="entry">
						<button  id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataDepartment; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


