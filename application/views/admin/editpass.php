<?php 

$link_dataAdmin = site_url() . 'admin/dataAdmin/'.$this->uri->segment(3);


?>
<div id="main">
		<div class="full_w">
				<div class="h_title" ><a id="edit">แก้ไขข้อมูลรหัสผ่าน</a>  </div>

		<?php
			print form_open("admin/update_admin_pass/".$id=$this->uri->segment(3));
		?>	
					<div class="element">
						<label>รหัสผ่านเดิม  : </label>
						<input type="password" name="password_old" placeholder="กรุณากรอกรหัสผ่านที่ต้องการแก้ไข"class="text err" value=""/>
						<?php echo form_error('password_old'); ?>
					</div>
					
					<div class="element">
						<label>รหัสผ่านใหม่  : </label>
						<input type="password" name="password_new" placeholder="กรุณากรอกรหัสผ่านที่ต้องการแก้ไข"class="text err" value=""/>
							<?php echo form_error('password_new'); ?>
					</div>
					
					<div class="element">
						<label>ยืนยันรหัสผ่าน  : </label>
						<input type="password" name="password_confirm" placeholder="กรุณากรอกรหัสผ่านที่ต้องการแก้ไข"class="text err" value=""/>
							<?php echo form_error('password_confirm'); ?>
					</div>
					<div class="entry">
					<button type="submit" id="ok">บันทึกข้อมูล</button>
					<a class="button" id="cancel" href="<?php echo $link_dataAdmin; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>
		

	</div>
		
</div>
