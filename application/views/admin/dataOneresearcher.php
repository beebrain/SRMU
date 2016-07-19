<?php 
$link_editStaff = site_url() . 'admin/editStaff/'.$this->uri->segment(3);
$link_staffData = site_url() . 'admin/staffData/'.$this->uri->segment(3);
$link_dataPermissionresearcher = site_url() . 'admin/dataPermissionresearcher/'.$this->uri->segment(3);
?>
	<div id="main">
	<div class="full_w">
	<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลรายละเอียดผู้วิจัย&nbsp;&nbsp;&nbsp;</strong></legend>
			</br>
			<?php

				foreach($query->result() as $row){
				if($row->position_id != "" or $row->position_id != null){
					$queryPosition=$this->researchModel->positionRe($row->user_id);
					foreach($queryPosition->result() as $rowPos)
				
				echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'.$rowPos->position_name." ".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
				echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'.$rowPos->position_name_EN." ".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
				}else {
					if($row->title==1){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'."นาย ".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
						if ($row->name_en){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'."Mr.".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
						};
					}elseif ($row->title==2){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'."นาง".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
						if ($row->name_en){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'."Mrs.".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
						};
						}
					else{
						echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'."นางสาว ".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
						if ($row->name_en){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'."Ms.".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
						};
						}
				}
				
				echo '<p>'.'<strong> หลักสูตร : </strong>'.$row->major_name.'</p>'.'</br>';
				echo '<p>'.'<strong> ภาควิชา : </strong>'.$row->department_name.'</p>'.'</br>';
				
				echo '<p>'.'<strong> E-mail : </strong>'.$row->email.'</p>'.'</br>';
				
				}
				
			?>
			</fieldset>

	</div>
		
</div>

