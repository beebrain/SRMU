
<div id="main">
<div class="full_w">
<fieldset>
<legend><img src=<?php print base_url()?>assets/img/presentation-head.jpg /></legend>
				</br>

			<?php

				foreach($query->result() as $row){
				echo '<p>'.'<strong> โครงการวิจัย  </strong>'.'</br>'.'</br>'.anchor('researchMain/dataDetailResearch/'.$row->research_id.'/'.$row->user_id,$row->research_name_th).'</br>'.'</p>';
				echo '<div class="sep"></div>';
				$queryPosition=$this->researchModel->positionRe($row->user_id);
				foreach($queryPosition->result() as $rowPos_)
					echo '<p>'.'<strong> หัวหน้าโครงการวิจัย : </strong>'.anchor('researcherMain/dataDetailResearcher/'.$row->user_id,$rowPos_->position_name.$rowPos_->name_th." ".$rowPos_->surname_th).'</p>';

				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ชื่อผลงานนำเสนอ  </strong>'.'</br>'.'</br>'.$row->presentation_name.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> ชื่อการประชุมทางวิชาการ  </strong>'.'</br>'.'</br>'.$row->presentation_meeting.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				
				if($row->presentation_type=='1'){
					echo '<p>'.'<strong> ประเภทการนำเสนอ :  </strong>'.'ภาคบรรยาย (Oral)'.'</p>';
					echo '<div class="sep"></div>';
				}
				else if($row->presentation_type=='2'){
					echo '<p>'.'<strong> ประเภทการนำเสนอ :  </strong>'.'ภาคโปสเตอร์ (Poster)'.'</p>';
					echo '<div class="sep"></div>';
				}else {
					echo '<p>'.'<strong> ประเภทการนำเสนอ :  </strong>'.'ภาคบรรยายและภาคโปสเตอร์'.'</p>';
					echo '<div class="sep"></div>';
				}
				
				if($row->presentation_kind=='1'){
					echo '<p>'.'<strong> ระดับการการนำเสนอ :  </strong>'.'ระดับชาติ'.'</p>';
					echo '<div class="sep"></div>';
				}
				else {
					echo '<p>'.'<strong> ระดับการการนำเสนอ :  </strong>'.'ระดับนานาชาติ'.'</p>';
					echo '<div class="sep"></div>';
				}
				
				
				echo '<p>'.'<strong> สถานที่นำเสนอ  : </strong>'.$row->location_name.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> ประเทศที่นำเสนอ  : </strong>'.$row->country_name.'</br>'.'</p>';
				
				
				
				}
			?>
			<?php 
				if ($row->presentation_date !== '0000-00-00'){
					echo '<div class="sep"></div>	';
					echo '<p>'.'<strong> วันที่ได้รับรางวัล: </strong>'.thai_date(strtotime($row->presentation_date)).'</p>';
				}
			?>
			<?php if ($row->presentation_file){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์รายละเอียดผลงานนำเสนอ  : </strong>';
				print '<a  href='. base_url('filepresentationUpload/'.$row->presentation_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดผลงานนำเสนอ'.'</a>'.'</p>';
				
			}
					
			?>
	<br>
	</fieldset>
					
	</div>
		
</div>

