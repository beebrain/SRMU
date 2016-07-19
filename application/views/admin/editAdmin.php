<?php 

$link_dataAdmin = site_url() . 'admin/dataAdmin/'.$this->uri->segment(3);


?>

<div id="main">
		<div class="full_w">
				<div class="h_title" ><a id="edit">แก้ไขข้อมูลเกี่ยวกับผู้ใช้งาน</a>  </div>


		<?php
			print form_open("admin/update_Admin/".$this->uri->segment(3));
		?>
					<div class="element">
					
						<label for="name">ชื่อผู้ใช้    :</label>
						 <input name="username_value" class="text" value="<?php print $rs['username'];?>"/> 
						 
					</div>

					
					
					<div class="element">
						<label for="category">ประเภทผู้ใช้งานระบบ&nbsp;&nbsp;: &nbsp;&nbsp;ผู้ดูแลระบบ <input type="hidden" name="user_type_value" value="1" /></label>
	
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
						<label for="name">E-mail <span class="red">( หากมีข้อมูล : กรุณากรอกรูปแบบ Email ให้ถูกต้อง )</span> </label>
						<input id="name" name="email_value" class="text" value="<?php print $rs['email'];?>"/>
						
						 <label for="name">โทรศัพท์   : </label>
						 <input id="name" name="tel_value" class="text" value="<?php print $rs['tel'];?>"/>
				
					</div>

					<div class="entry">
					<button  type="submit" id="ok" name="bsave">บันทึกข้อมูล</button><a class="button"  id="cancel"  href="<?php echo $link_dataAdmin; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>
		

	</div>
		
</div>

