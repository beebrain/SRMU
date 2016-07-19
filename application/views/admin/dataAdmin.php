<div id="main">
	<div class="full_w">
		<div class="h_title" ><a id="report">&nbsp;ข้อมูลเกี่ยวกับผู้ใช้งาน</a>  </div>
		<br>

			<?php echo $this->session->flashdata('msg'); ?> 

			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลในการเข้าใช้งานระบบ&nbsp;&nbsp;&nbsp;</strong></legend>
				</br>
			<?php

				foreach($query->result() as $row){
			
				echo '<p>'.'<strong> ชื่อผู้ใช้  : </strong>'.$row->username.'</p>'.'</br>';

				if($row->user_type_id=='1'){
					echo '<p>'.'<strong> สิทธิ์การใช้งาน : </strong>'.'ผู้ดูแลระบบ'.'</p>'.'</br>';
				}
				else if($row->user_type=='2')
				{
					echo '<p>'.'<strong> สิทธิ์การใช้งาน : </strong>'.'เจ้าหน้าที่'.'</p>'.'</br>';
				}
				else {
					echo '<p>'.'<strong> สิทธิ์การใช้งาน : </strong>'.'ผู้วิจัย'.'</p>'.'</br>';
				}
			
			}
			
			?>
			</fieldset>
					<div class="sep"></div>
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลรายละเอียดผู้ดูและระบบ&nbsp;&nbsp;&nbsp;</strong></legend>
			</br>
			<?php

				foreach($query->result() as $row){

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
					
			



	</div>
		
</div>

