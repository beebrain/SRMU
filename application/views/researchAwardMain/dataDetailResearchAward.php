
<div id="main">
<div class="full_w">
<fieldset>
<legend><img src=<?php print base_url()?>assets/img/researchAward-head.jpg /></legend>
				</br>

			<?php

				foreach($query->result() as $row){
				echo '<p>'.'<strong> โครงการวิจัย  </strong>'.'</br>'.'</br>'.anchor('researchMain/dataDetailResearch/'.$row->research_id.'/'.$row->user_id,$row->research_name_th).'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				$queryPosition=$this->researchModel->positionRe($row->user_id);
				foreach($queryPosition->result() as $rowPos_)
					echo '<p>'.'<strong> หัวหน้าโครงการวิจัย : </strong>'.anchor('researcherMain/dataDetailResearcher/'.$row->user_id,$rowPos_->position_name.$rowPos_->name_th." ".$rowPos_->surname_th).'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ชื่อรางวัลที่ได้รับ  </strong>'.'</br>'.'</br>'.$row->researchAward_name.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ชื่อการประชุมทางวิชาการ  </strong>'.'</br>'.'</br>'.$row->researchAward_meeting.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> สาขาที่ได้รับรางวัล </strong>'.'</br>'.'</br>'.$row->researchAward_branch.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> รายละเอียดรางวัล </strong>'.'</br>'.'</br>'.$row->researchAward_detail.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> หน่วยงานที่มอบรางวัล </strong>'.'</br>'.'</br>'.$row->researchAward_agencies.'</br>'.'</p>';
				}
			?>
			<?php 
				if ($row->researchAward_date !== '0000-00-00'){
					echo '<div class="sep"></div>	';
					echo '<p>'.'<strong> วันที่ได้รับรางวัล: </strong>'.thai_date(strtotime($row->researchAward_date)).'</p>';
				}
			?>
			<?php if ($row->researchAward_file){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์รายละเอียดรางวัลโครงการวิจัย : </strong>';
				print '<a  href='. base_url('fileresearchAwardUpload/'.$row->researchAward_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดรางวัลโครงการวิจัย'.'</a>'.'</p>';
				
			}
					
			?>
	
		<br>
	</fieldset>
			
					
	</div>
		
</div>
