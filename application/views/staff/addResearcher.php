<?php 
$link_dataListresearcher = site_url() . 'staff/dataListresearcher/'.$this->uri->segment(3);
?>
<div id="main">
			<div class="full_w">
			<div class="h_title"><a id="add_user"> เพิ่มข้อมูลผู้วิจัย</a></div>

	<?php print form_open_multipart("staff/savenew_Researcher/".$this->uri->segment(3));?>
	
					<div class="element">
					
						<label for="name">ชื่อผู้ใช้    :</label>
						 <input name="username_value" class="text err" placeholder="กรุณากรอกข้อมูลชื่อผู้ใช้"/> 
						 <?php echo form_error('username_value'); ?>
					</div>

					
					<div class="element">
						<label>รหัสผ่าน  : </label>
						<input type="password"name="password_value" class="text err" placeholder="กรุณากรอกข้อมูลรหัสผ่าน"/> 
						<?php echo form_error('password_value'); ?>
					</div>
					<div class="element">
						<label for="category">ประเภทผู้ใช้งานระบบ&nbsp;&nbsp;: &nbsp;&nbsp;ผู้วิจัย<input type="hidden" name="user_type_value" value="3" /></label>
	
					</div>
					
					<div class="element">
						<label for="comments">คำนำหน้า
						&nbsp;&nbsp;<input type="radio" name="title_value" value="1" checked="checked" /> นาย 
						&nbsp;&nbsp;<input type="radio" name="title_value" value="2" /> นาง
						&nbsp;&nbsp;<input type="radio" name="title_value" value="3" /> นางสาว</label>
					</div>
					
					<div class="element">
						<label for="comments">ตำแหน่งทางวิชาการ  
						<select name="position_value">
						<?php
							if($queryPosition->num_rows()==0){	
							echo '<option value="ไม่พบข้อมูลตำแหน่งทางวิชาการ"</option>';
				}else{
							echo '<option value="">-- กรุณาเลือกตำแหน่งทางวิชาการ --</option>';
							foreach($queryPosition->result() as $row){
								echo '<option value='.$row->position_id.'>'.$row->position_name.'</option>';
							}
							}
							?>
						</select>
						 <span class="red"> ( หากมีข้อมูล  )</span> 
					</label>

					</div>
					<div class="element">
						<label for="name">ชื่อภาษาไทย : </label>
						<input id="name" name="name_th_value" class="text err" autocomplete="off" placeholder="กรุณากรอกข้อมูลชื่อภาษาไทย "/> 
						<?php echo form_error('name_th_value'); ?>
						
						<label for="name">นามสกุลภาษาไทย : </label>
						<input id="name" name="surname_th_value" class="text err" autocomplete="off" placeholder="กรุณากรอกข้อมูลนามสกุลภาษาไทย "/>
						<?php echo form_error('surname_th_value'); ?>
					</div>
					<div class="element">
						<label for="name">ชื่อภาษาอังกฤษ : </label>
						<input name="name_en_value" value="" class="text" autocomplete="off"/>

						
						<label for="name">นามสกุลภาษาอังกฤษ : </label>
						<input  name="surname_en_value" value="" class="text" autocomplete="off"/>

					</div>
					<div class="element">
						<label for="name">หลักสูตร   :
							<select name="major_value" class="err">
						<?php
							if($queryMajor->num_rows()==0){	
							echo '<option value="ไม่พบข้อมูลหลักสูตร"</option>';
							}else{
								echo '<option value="">-- กรุณาเลือกหลักสูตร --</option>';
							foreach($queryMajor->result() as $row){
								echo '<option value='.$row->major_id.'>'.$row->major_name.'</option>';
							}
							}
							?>
						</select>
						</label>
						<?php echo form_error('major_value'); ?>
					</div>
					<div class="element">
						<label for="name">ที่อยู่ที่สามารถติดต่อได้ :</label>
						<textarea class="textarea" rows="5" name="address_value" ></textarea>
					</div>
					<div class="element">
						<label for="name">E-mail  <span class="red">( หากมีข้อมูล : กรุณากรอกรูปแบบ Email ให้ถูกต้อง )</span> </label>
						<input id="name" name="email_value" class="text"/>
						<?php echo form_error('email_value'); ?>
						 <label for="name">โทรศัพท์   : </label>
						 <input id="name" name="tel_value" class="text"/>
						 
					</div>
					<div class="element">
					<?php echo $this->session->flashdata('msg'); ?> 
					<label for="name">รูปถ่ายผู้วิจัย :<span class="red"> (ขนาดไฟล์ไม่เกิน: 1 MB | ชนิดของไฟล์ : gif|jpg|png)</span> </label>
					<input type="file" name="photo" size="20" />&nbsp;
					
					</div>
					
				
					
					<input type="hidden" name="status_user_value" value="1" />
					<div class="entry">
					<button id="ok"  type="submit" name="bsave">บันทึกข้อมูล</button><a  id="cancel" class="button" href="<?php echo $link_dataListresearcher; ?>">ยกเลิก</a>
					</div>
					
				<?php print form_close();?>
					

	</div>
		
</div>


