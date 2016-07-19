
<div id="main">
<div class="full_w">
<fieldset>
<legend><img src=<?php print base_url()?>assets/img/anusitti-head.jpg /></legend>
		
			<?php

				foreach($query->result() as $row){
				echo '<p>'.'<strong> โครงการวิจัย  </strong>'.'</br>'.'</br>'.anchor('researchMain/dataDetailResearch/'.$row->research_id.'/'.$row->user_id,$row->research_name_th).'</br>'.'</p>';
				echo '<div class="sep"></div>';
				$queryPosition=$this->researchModel->positionRe($row->user_id);
				foreach($queryPosition->result() as $rowPos_)
					echo '<p>'.'<strong> หัวหน้าโครงการวิจัย : </strong>'.anchor('researcherMain/dataDetailResearcher/'.$row->user_id,$rowPos_->position_name.$rowPos_->name_th." ".$rowPos_->surname_th).'</p>';
	
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ชื่อในการจดทะเบียน  : </strong>'.'</br>'.'</br>'.$row->partent_name.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> เลขที่ทะเบียน  :   </strong>'.'</br>'.'</br>'.$row->partent_no.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				
				if($row->partent_type=='1'){
					echo '<p>'.'<strong> ประเภทการจดทะเบียน :  </strong>'.'อนุสิทธิบัตร '.'</p>';
					echo '<div class="sep"></div>';
				}
				else if($row->partent_type=='2'){
					echo '<p>'.'<strong> ประเภทการจดทะเบียน:  </strong>'.'อนุอนุสิทธิบัตร '.'</p>';
					echo '<div class="sep"></div>';
				}else {
					echo '<p>'.'<strong> ประเภทการจดทะเบียน :  </strong>'.'ลิขสิทธิ์'.'</p>';
					echo '<div class="sep"></div>';
				}
	
				}
				echo '<p>'.'<strong> หน่วยงานที่ดำเนินการขอความคุ้มครองทรัพย์สินทางปัญญา  :   </strong>'.'</br>'.'</br>'.$row->partent_agencies.'</br>'.'</p>';
				
			?>
			<?php 
				if ($row->partent_date !== '0000-00-00'){
					echo '<div class="sep"></div>	';
					echo '<p>'.'<strong> วันที่จดทะเบียน: </strong>'.thai_date(strtotime($row->partent_date)).'</p>';
				}
			?>
			<?php if ($row->partent_file){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์รายละเอียดผลงานอนุสิทธิบัตร   : </strong>';
				print '<a  href='. base_url('filepartentUpload/'.$row->partent_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดผลงานอนุสิทธิบัตร'.'</a>'.'</p>';
				
			}
					
			?>
	
		<br>
</fieldset>
	</div>
		
</div>



