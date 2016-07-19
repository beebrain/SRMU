
<div id="main">
<div class="full_w">

	<?php echo $this->session->flashdata('msg'); ?> 
		<fieldset>
   				<legend><strong>&nbsp;&nbsp;ข้อมูลในการเข้าใช้งานระบบ&nbsp;&nbsp;&nbsp;</strong></legend>
				</br>

			<?php
				foreach($query->result() as $row){
				echo '<p>'.'<strong> ชื่อผู้ใช้  : </strong>'.$row->username.'</p>'.'</br>';
				if($row->user_type_id=='1'){
				echo '<p>'.'<strong> สิทธิ์การใช้งานระบบ : </strong>'.'ผู้ดูแลระบบ'.'</p>'.'</br>';
				}
				else if($row->user_type_id=='2')
				{
				echo '<p>'.'<strong> สิทธิ์การใช้งานระบบ : </strong>'.'เจ้าหน้าที่'.'</p>'.'</br>';
				}
				else {
				echo '<p>'.'<strong> สิทธิ์การใช้งานระบบ : </strong>'.'ผู้วิจัย'.'</p>'.'</br>';
				}
			}
			?>
			</fieldset>
					<div class="sep"></div>
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลรายละเอียดผู้วิจัย&nbsp;&nbsp;&nbsp;</strong></legend>
			</br>
				<?php if ($row->photo){
						print '<img class="right"style="margin:25px;width:160px;height:190px;border:1px;" src="'.base_url('imgResearcher/'.$row->photo).'">';
					}else 
					{
						print '<img class="right"style="margin:25px;width:160px;height:190px;border:1px;" src="'.base_url('imgResearcher/noImg.jpg').'">';
					}
					?>

			<?php

				foreach($query->result() as $row){

				echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'.$row->position_name." ".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
				echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'.$row->position_name_EN." ".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
				echo '<p>'.'<strong> หลักสูตร : </strong>'.$row->major_name.'</p>'.'</br>';
				echo '<p>'.'<strong> ภาควิชา : </strong>'.$row->department_name.'</p>'.'</br>';
				echo '<p>'.'<strong> ที่อยู่ที่สามารถติดต่อได้ : </strong>'.'</br>'.'</br>'.$row->address.'</p>'.'</br>';

				echo '<p>'.'<strong> E-mail : </strong>'.$row->email.'</p>'.'</br>';
				echo '<p>'.'<strong> โทรศัพท์ : </strong>'.$row->tel.'</p>'.'</br>';
				
				}
				
			?>
			
			</fieldset>
		
		</div>
</div>
