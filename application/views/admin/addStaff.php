<?php 
$link_dataAllstaff = site_url() . 'admin/dataAllstaff/'.$this->uri->segment(3);
?>
<div id="main">
		<div class="full_w">
			<div class="h_title"><a id="add_user"> เพิ่มข้อมูลเจ้าหน้าที่</a></div>



	<?php echo form_open('admin/savenew_Staff/'.$this->uri->segment(3));?>
					<div class="element">
					
						<label for="name">ชื่อผู้ใช้    :</label>
						 <input name="username_value" autocomplete="off"   class="text err" placeholder="กรุณากรอกข้อมูลชื่อผู้ใช้"/> 
						 <?php echo form_error('username_value'); ?>
					</div>

					
					<div class="element">
						<label>รหัสผ่าน  : </label>
						<input type="password" autocomplete="off"   name="password_value" class="text err" placeholder="กรุณากรอกข้อมูลรหัสผ่าน"/> 
						<?php echo form_error('password_value'); ?>
					</div>
					<div class="element">
						<label for="category">ประเภทผู้ใช้งานระบบ&nbsp;&nbsp;: &nbsp;&nbsp;เจ้าหน้าที่ <input type="hidden" name="user_type_value" value="2" /></label>
	
					</div>
					<div class="element">
						<label for="comments">คำนำหน้า
						&nbsp;&nbsp;<input type="radio" name="title_value" value="1" checked="checked" /> นาย 
						&nbsp;&nbsp;<input type="radio" name="title_value" value="2" /> นาง
						&nbsp;&nbsp;<input type="radio" name="title_value" value="3" /> นางสาว</label>
					</div>
					<div class="element">
						<label for="name">ชื่อ  : </label>
						<input id="name" name="name_th_value" class="text err" placeholder="กรุณากรอกข้อมูลชื่อ"/>
						<?php echo form_error('name_th_value'); ?>
						
						<label for="name">นามสกุล   : </label>
						<input id="name" name="surname_th_value" class="text err"placeholder="กรุณากรอกข้อมูลนามสกุล"/>
						<?php echo form_error('surname_th_value'); ?>
					</div>
					
					<div class="element">
						<label for="name">ที่อยู่ที่สามารถติดต่อได้ :</label>
						<textarea class="textarea" rows="5" name="address_value" ></textarea>
					</div>
					<div class="element">
						<label for="name">E-mail  <span class="red">( หากมีข้อมูล : กรุณากรอกรูปแบบ Email ให้ถูกต้อง )</span> </label>
						<input id="name" name="email_value" class="text"/>
						<?php echo form_error('email_value'); ?>
							</div>
							<div class="element">
						 <label for="name">โทรศัพท์   : </label>
						 <input id="name" name="tel_value" class="text"/>
						 </div>
				

					<input type="hidden" name="name_en_value" value="" />
					<input type="hidden" name="surname_en_value" value="" />

					<input type="hidden" name="photo_value" value="" />
					<input type="hidden" name="status_user_value" value="1" />
					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataAllstaff; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


