<?php 
$link_dataStaff = site_url() . 'staff/dataStaff/';
?>
<div id="main">
		<div class="full_w">
				<div class="h_title" ><a id="edit">แก้ไขข้อมูลเกี่ยวกับผู้ใช้งาน</a>  </div>

		<?php
			print form_open("staff/update_Staff/".$id=$this->uri->segment(3));
		?>	
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
						<label for="name">ชื่อ  : </label>
						<input id="name" name="name_th_value" class="text" value="<?php print $rs['name_th'];?>"/>
						
						
						<label for="name">นามสกุล   : </label>
						<input id="name" name="surname_th_value" class="text" value="<?php print $rs['surname_th'];?>"/>

					</div>
					
					<div class="element">
						<label for="name">ที่อยู่ที่สามารถติดต่อได้ :</label>
						<textarea class="textarea" rows="5" " name="address_value"  ><?php print $rs['address'];?></textarea>
					</div>
					<div class="element">
						<label for="name">E-mail  <span class="red">( หากมีข้อมูล : กรุณากรอกรูปแบบ Email ให้ถูกต้อง )</span> </label>
						<input id="name" name="email_value" class="text" value="<?php print $rs['email'];?>"/>
						
						 <label for="name">โทรศัพท์   : </label>
						 <input id="name" name="tel_value" class="text" value="<?php print $rs['tel'];?>"/>
				
					</div>

					<input type="hidden" name="name_en_value" value="" />
					<input type="hidden" name="surname_en_value" value="" />

					<input type="hidden" name="photo_value" value="" />
					<input type="hidden" name="status_user_value" value="1" />
					<div class="entry">
					<button  id="ok" type="submit" name="bsave">บันทึกข้อมูล</button>
					<a id="cancel" class="button" href="<?php echo $link_dataStaff.$this->uri->segment(3); ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>
		

	</div>
		
</div>

