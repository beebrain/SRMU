
<div id="main">
<div class="full_w">
	<fieldset>
<legend><img src=<?php print base_url()?>assets/img/researcherAward-head.jpg /></legend>
				</br>
			<?php
			foreach($queryPosition->result() as $rowPos)
				foreach($query->result() as $row){
				
				echo '<p>'.'<strong> ชื่อรางวัลที่ได้รับ  </strong>'.'</br>'.'</br>'.$row->researcherAward_name.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ผู้วิจัย : </strong>'.anchor('researcherMain/dataDetailResearcher/'.$row->user_id,$rowPos->position_name.$row->name_th." ".$row->surname_th).'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ชื่อการประชุมทางวิชาการ  </strong>'.'</br>'.'</br>'.$row->researcherAward_meeting.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> สาขาที่ได้รับรางวัล </strong>'.'</br>'.'</br>'.$row->researcherAward_branch.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> รายละเอียดรางวัล </strong>'.'</br>'.'</br>'.$row->researcherAward_detail.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> หน่วยงานที่มอบรางวัล </strong>'.'</br>'.'</br>'.$row->researcherAward_agencies.'</br>'.'</p>';
				}
			?>
			<?php 
				if ($row->researcherAward_date !== '0000-00-00'){
					echo '<div class="sep"></div>	';
					echo '<p>'.'<strong> วันที่ได้รับรางวัล: </strong>'.thai_date(strtotime($row->researcherAward_date)).'</p>';
				}
			?>
			<?php if ($row->researcherAward_file){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์รายละเอียดรางวัลผลงานผู้วิจัย : </strong>';
				print '<a  href='. base_url('fileresearcherAwardUpload/'.$row->researcherAward_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดรางวัลผลงานผู้วิจัย'.'</a>'.'</p>';
				
			}
					
			?>
	<br>
	</fieldset>
		
			
					
	</div>
		
</div>
