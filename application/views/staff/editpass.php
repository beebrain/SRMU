<?php 
$link_dataStaff = site_url() . 'staff/dataStaff/';
?>
<div id="main">
		<div class="full_w">
				<div class="h_title" ><a id="edit">แก้ไขข้อมูลรหัสผ่าน</a>  </div>

		<?php
			print form_open("staff/update_staff_pass/".$this->uri->segment(3));
		?>	
					<div class="element">
						<label>รหัสผ่านเดิม  : </label>
						<input type="password"name="password_old" placeholder="กรุณากรอกรหัสผ่านที่ต้องการแก้ไข"class="text err" value=""/>
						<?php echo form_error('password_old'); ?>
					</div>
					
					<div class="element">
						<label>รหัสผ่านใหม่  : </label>
						<input type="password"name="password_new" placeholder="กรุณากรอกรหัสผ่านที่ต้องการแก้ไข"class="text err" value=""/>
						<?php echo form_error('password_new'); ?>
					</div>
					
					<div class="element">
						<label>ยินยันรหัสผ่าน  : </label>
						<input type="password"name="password_confirm" placeholder="กรุณากรอกรหัสผ่านที่ต้องการแก้ไข"class="text err" value=""/>
						<?php echo form_error('password_confirm'); ?>
					</div>
					<div class="entry">
					<button type="submit" id="ok">บันทึกข้อมูล</button>
					<a id="cancel"class="button" href="<?php echo $link_dataStaff.$this->uri->segment(3); ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>
		

	</div>
		
</div>
