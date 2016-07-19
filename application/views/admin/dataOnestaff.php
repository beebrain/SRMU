<?php 
$link_editStaff = site_url() . 'admin/edit_Staff/'.$this->uri->segment(3);
$link_dataAllstaff = site_url() . 'admin/dataAllstaff/'.$this->uri->segment(3);
$link_delete_staff = site_url() . 'admin/delete_staff/'.$this->uri->segment(3).'/';

?>
	<div id="main">
	<div class="full_w">

	<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลรายละเอียดเจ้าหน้าที่&nbsp;&nbsp;&nbsp;</strong></legend>
			</br>
			<?php

				foreach($query->result() as $row){
					echo '<p>'.'<strong> ชื่อผู้ใช้  : </strong>'.$row->username.'</p>'.'</br>';
					
					if($row->user_type_id=='1'){
						echo '<p>'.'<strong> ประเภทผู้ใช้งานระบบ : </strong>'.'ผู้ดูแลระบบ'.'</p>'.'</br>';
					}
					else if($row->user_type_id=='2')
					{
						echo '<p>'.'<strong> ประเภทผู้ใช้งานระบบ : </strong>'.'เจ้าหน้าที่'.'</p>'.'</br>';
					}
					else {
						echo '<p>'.'<strong> ประเภทผู้ใช้งานระบบ : </strong>'.'ผู้วิจัย'.'</p>'.'</br>';
					}

					if($row->title==1){
						echo '<p>'.'<strong> ชื่อ - นามสกุล  : </strong>'.'นาย'.$row->name_th." ".$row->surname_th.'</p>'.'</br>';
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
					
					<a class="button" id="edit" href="<?php echo $link_editStaff."/".$row->user_id; ?>">แก้ไขข้อมููลเจ้าหน้าที่</a>

					<a class="button" id="cancel" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="<?php echo $link_delete_staff.$row->user_id; ?>">ลบข้อมูล</a>
					
					
	</div>
		
</div>

