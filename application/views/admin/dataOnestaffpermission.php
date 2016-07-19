<?php 
$link_editStaff = site_url() . 'admin/editStaff/'.$this->uri->segment(3);
$link_dataAllstaff = site_url() . 'admin/dataAllstaff/'.$this->uri->segment(3);
$link_dataPermissionstaff= site_url() . 'admin/dataPermissionstaff/'.$this->uri->segment(3);
?>
	<div id="main">
	<div class="full_w">
	<div class="h_title" ><a id="block_users">ข้อมูลกำหนดสิทธิ์การใช้งานเจ้าหน้าที่</a>  </div>
		<br>
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลกำหนดสิทธิ์การใช้งานเจ้าหน้าที่&nbsp;&nbsp;&nbsp;</strong></legend>
			<br>
			<?php

				foreach($query->result() as $row){

					if($row->title==1){
						echo '<p>'.'<strong> ชื่อ - นามสกุล : </strong>'.'นาย'.$row->name_th." ".$row->surname_th.'</p>'.'</br>';
					}elseif ($row->title==2){
						echo '<p>'.'<strong> ชื่อ - นามสกุล  : </strong>'.'นาง'.$row->name_th." ".$row->surname_th.'</p>'.'</br>';
					}
					else{
						echo '<p>'.'<strong> ชื่อ - นามสกุล  : </strong>'.'นางสาว'.$row->name_th." ".$row->surname_th.'</p>'.'</br>';
					}
						
					
			
				
				echo '<p>'.'<strong> ที่อยู่ที่สามารถติดต่อได้ : </strong>'.$row->address.'</p>'.'</br>';

				echo '<p>'.'<strong> E-mail : </strong>'.$row->email.'</p>'.'</br>';
				echo '<p>'.'<strong> โทรศัพท์ : </strong>'.$row->tel.'</p>'.'</br>';
			
				}
			
			?>
			</fieldset>

			<div class="sep"></div>
				

	
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;กำหนดสิทธิ์การใช้งานระบบ&nbsp;&nbsp;&nbsp;</strong></legend>
				<?php
				print form_open("admin/permission_staff/".$id=$this->uri->segment(3));
				?>

				<p>
				<input type="radio" name="status_user_value" value="1"  <?php if ($row->status_user==1) echo "checked='checked'";?>/>  อนุมัติสิทธิ์การใช้งาน&nbsp;&nbsp;&nbsp;
				<input type="radio" name="status_user_value" value="0" <?php if ($row->status_user==0) echo"checked='checked'";?>/>&nbsp;ระงับสิทธิ์การใช้งาน
				</p>
				
				

				<div class="sep"></div>
						<button id="ok" type="submit" name="bsave" onclick="javascript:return confirm('คุณต้องการเปลี่ยนแปลงข้อมูลสิทธิ์การใช้งานใช่หรือไม่?')">บันทึกข้อมูล</button>
						<a id="cancel" class="button" href="<?php echo $link_dataPermissionstaff; ?>">ยกเลิก</a>
			<?php print form_close();?>
			</fieldset>

	</div>
		
</div>

