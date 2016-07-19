<?php 
$link_dataListresearcher = site_url() . 'staff/dataListresearcher/'.$this->uri->segment(3);
?>
<div id="main">
		<div class="full_w">
			<div id="pass">
			<div class="h_title"><a  id="edit">แก้ไขข้อมูลรหัสผ่าน</a></div>

			<?php print form_open("staff/update_researcher_pass/".$this->uri->segment(3).'/'.$this->uri->segment(4));?>
		
					<div class="element">
						<label>รหัสผ่านใหม่  : </label>
						<input type="password" name="password_new" class="text" value=""/>
							<?php echo form_error('password_new'); ?>
					</div>
					
					<div class="element">
						<label>ยืนยันรหัสผ่าน  : </label>
						<input type="password" name="password_confirm" class="text" value=""/>
							<?php echo form_error('password_confirm'); ?>
					</div>
					<div class="entry">
					<button type="submit" id="ok">บันทึกข้อมูลรหัสผ่าน</button>
					<a class="button" id="cancel" href="">ยกเลิก</a>
					</div>
					<?php print form_close();?>
		</div>
		<div class="sep"></div>
				<div class="h_title"><a id="edit">แก้ไขข้อมูลเกี่ยวกับผู้ใช้งาน</a> </div>

			<?php print form_open_multipart("staff/update_Researcher/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));?>
					<div class="element">
					
						<label for="name">ชื่อผู้ใช้    :</label>
						 <input name="username_value" class="text" value="<?php print $rs['username'];?>"/> 
						 <?php echo form_error('username_value'); ?>
					</div>

					<div class="element">
						<label for="comments">คำนำหน้า
						<?php
						if(($rs['title'])==1){
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="1" checked="checked" /> นาย';
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="2" /> นาง';
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="3" /> นางสาว</label>';
						}elseif(($rs['title'])==2){
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="1"  /> นาย';
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="2" checked="checked"/> นาง';
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="3" /> นางสาว</label>';
						}else{
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="1" /> นาย'; 
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="2" /> นาง';
							echo '&nbsp;&nbsp;<input type="radio" name="title_value" value="3" checked="checked" /> นางสาว</label>';
						}
						?>
					</div>
					<div class="element">
						<label for="comments">ตำแหน่งทางวิชาการ  
						<select name="position_value"  >
						<?php
							if($queryPosition->num_rows()==0){	
							echo '<option value="ไม่พบข้อมูลตำแหน่งทางวิชาการ"</option>';
				}else{
							echo '<option value="">-- กรุณาเลือกตำแหน่งทางวิชาการ --</option>';
							foreach($queryPosition->result() as $row){
								echo '<option value='.$row->position_id.'>'.$row->position_name.'</option>';
								if ($row->position_id==$rs['position_id'])
								{
									echo '<option value='.".$row->position_id.". ' selected="selected" >'.$row->position_name;
								}
							}
							}
							?>
						</select>
						<span class="red"> ( หากมีข้อมูล  )</span> 
					</label>
			
					</div>
					<div class="element">
						<label for="name">ชื่อภาษาไทย  : </label>
						<input id="name" name="name_th_value" class="text" value="<?php print $rs['name_th'];?>"/>
						<?php echo form_error('name_th_value'); ?>
						
						<label for="name">นามสกุลภาษาไทย   : </label>
						<input id="name" name="surname_th_value" class="text" value="<?php print $rs['surname_th'];?>"/>
						<?php echo form_error('surname_th_value'); ?>
					</div>
							<div class="element">
						<label for="name">ชื่อภาษาอังกฤษ  : </label>
						<input id="name" name="name_en_value" class="text" value="<?php print $rs['name_en'];?>"/>
						
						
						<label for="name">นามสกุลภาษาอังกฤษ   : </label>
						<input id="name" name="surname_en_value" class="text" value="<?php print $rs['surname_en'];?>"/>

					</div>
					<div class="element">
						<label for="name">หลักสูตร   :
							<select name="major_value"  >
						<?php
							if($queryPosition->num_rows()==0){	
							echo '<option value="ไม่พบข้อมูลหลักสูตร"</option>';
							}else{
								echo '<option value="">-- กรุณาเลือกหลักสูตร --</option>';
							foreach($queryMajor->result() as $row){
								echo '<option value='.$row->major_id.'>'.$row->major_name.'</option>';
								if ($row->major_id==$rs['major_id'])
								{
									echo '<option value='.".$row->major_id.". ' selected="selected" >'.$row->major_name;
								}
							}
							}
							?>
						</select>
						</label>
						<?php echo form_error('major_value'); ?>
					</div>
					<div class="element">
						<label for="name">ที่อยู่ที่สามารถติดต่อได้ :</label>
						<textarea class="textarea" rows="5" " name="address_value"  ><?php print $rs['address'];?></textarea>
					</div>
					<div class="element">
						<label for="name">E-mail :</label>
						<input id="name" name="email_value" class="text" value="<?php print $rs['email'];?>"/>
						<?php echo form_error('email_value'); ?>
						 <label for="name">โทรศัพท์   : </label>
						 <input id="name" name="tel_value" class="text" value="<?php print $rs['tel'];?>"/>
				
					</div>

					<?php if ($rs['photo']){
						print'<div class="element">';
						print '<label for="name">รูปถ่ายผู้วิจัย </label>';
						print '<img style="margin:25px;width:120px;height:150px;border:1px;" src="'.base_url('imgResearcher/'.$rs['photo']).'">';
						print '</div>';
						print '</br>';
					}
					?>
					
					<div class="element">
   					<?php echo $this->session->flashdata('msg'); ?> 
   					<label for="name">แก้ไขรูปถ่ายผู้วิจัย :<span class="red"> (ขนาดไฟล์ไม่เกิน: 1 MB | ชนิดของไฟล์ : gif|jpg|png)</span> </label>
					<input type="file" name="photo" />
					</div>
					<input type="hidden" name="user_type_value" value="3" />
					<input type="hidden" name="status_user_value" value="1" />
					<div class="entry">
					<button  id="ok"type="submit" name="bsave">บันทึกข้อมูลเกี่ยวกับผู้วิจัย</button>
					<a id="cancel"class="button" href="<?php echo $link_dataListresearcher; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>
		

	</div>
		
</div>

