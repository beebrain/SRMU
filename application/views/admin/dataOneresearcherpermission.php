<?php 
$link_dataPermissionresearcher = site_url() . 'admin/dataPermissionresearcher/'.$this->uri->segment(3);
?>
	<div id="main">
	<div class="full_w">
	<div class="h_title" ><a id="block_users">ข้อมูลกำหนดสิทธิ์การใช้งานผู้วิจัย</a>  </div>
		<br>
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลกำหนดสิทธิ์การใช้งานผู้วิจัย  &nbsp;&nbsp;&nbsp;</strong></legend>
			</br>
			<?php

				foreach($query->result() as $row){
					
					echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'.$row->position_name.$row->name_th." ".$row->surname_th.'</p>'.'</br>';
					echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'.$row->position_name_EN." ".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
					
					echo '<p>'.'<strong> หลักสูตร : </strong>'.$row->major_name.'</p>'.'</br>';
					echo '<p>'.'<strong> ภาควิชา : </strong>'.$row->department_name.'</p>'.'</br>';

				}
			
			?>
			</fieldset>
	
			<div class="sep"></div>
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;กำหนดสิทธิ์การใช้งานระบบ&nbsp;&nbsp;&nbsp;</strong></legend>
				<?php
				print form_open("admin/permission_researcher/".$id=$this->uri->segment(3));
				?>

				<p>
				<input type="radio" name="status_user_value" value="1"  <?php if ($row->status_user==1) echo "checked='checked'";?>/>  อนุมัติสิทธิ์การใช้งาน&nbsp;&nbsp;&nbsp;
				<input type="radio" name="status_user_value" value="0" <?php if ($row->status_user==0) echo"checked='checked'";?>/>&nbsp;ระงับสิทธิ์การใช้งาน
				</p>

				<div class="sep"></div>
						<button id="ok" type="submit" name="bsave" onclick="javascript:return confirm('คุณต้องการเปลี่ยนแปลงข้อมูลสิทธิ์การใช้งานใช่หรือไม่?')">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataPermissionresearcher; ?>">ยกเลิก</a>
			<?php print form_close();?>
			</fieldset>
			
	</div>
		
</div>

