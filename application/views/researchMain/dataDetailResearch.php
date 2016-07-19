
<div id="main">
<div class="full_w">
<fieldset>
<legend><img src=<?php print base_url()?>assets/img/research-head.jpg /></legend>
				<?php

				foreach($query->result() as $row){
					if($row->research_type=='1'){
						echo '<p>'.'<strong> ลักษณะโครงการวิจัย :  </strong>'.'โครงการวิจัยเดี่ยว'.'</p>';
					
					}
					else {
						echo '<p>'.'<strong> ลักษณะโครงการวิจัย :  </strong>'.'ชุดโครงการวิจัย'.'</p>';
					}
					
					echo '<div class="sep"></div>	';
					
				echo '<p>'.'<strong> ชื่อโครงการวิจัย (TH)  </strong>'.'</br>'.'</br>'.$row->research_name_th.'</br>'.'</p>';
				
				echo '<div class="sep"></div>';
				
				if($row->research_name_en != null && $row->research_name_en != " " ){
				echo '<p>'.'<strong> ชื่อโครงการวิจัย (EN)  </strong>'.'</br>'.'</br>'.$row->research_name_en.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				}
				
				$queryPosition=$this->researchModel->positionRe($row->user_id);
				foreach($queryPosition->result() as $rowPos_)
				echo '<p>'.'<strong> หัวหน้าโครงการวิจัย : </strong>'.anchor('researcherMain/dataDetailResearcher/'.$row->user_id,$rowPos_->position_name.$rowPos_->name_th." ".$rowPos_->surname_th).'</p>';
			
				if($row->research_type=='2'){
					echo '<div class="sep"></div>';
					echo '<p>'.'<strong> ผู้ร่วมดำเนินโครงการวิจัยภายใน    </strong>'.'</br>';
					$partnerIN=$this->partnerinmodel->get_partner_in($row->research_id);
					
					foreach($partnerIN->result() as $rowIN){
					if ($partnerIN!=null){
					$queryPosition=$this->researchModel->positionRe($rowIN->researcher_id);
					foreach($queryPosition->result() as $rowPos){
						
					echo '<br>'.anchor('researcherMain/dataDetailResearcher/'.$rowIN->researcher_id,$rowPos->position_name.$rowPos->name_th." ".$rowPos->surname_th).'<br>';
				
					}
					}
			
					}
				
					
					foreach($queryPartner->result() as $rowPart){
						echo '<div class="sep"></div>';
					
						echo '<p>'.'<strong> ผู้ร่วมดำเนินโครงการวิจัยภายนอก    </strong>'.'</p>'.'<br>';
								
								if($row->fullname){
								echo '<p>'.$row->fullname.' &nbsp&nbsp&nbsp'.$row->organ.'</p>'.'<br>';
								}
								if($row->fullname_2){
								echo '<p>'.$row->fullname_2.'&nbsp&nbsp&nbsp'.$row->organ_2.'&nbsp'.'</p>'.'</br>';
								}
								if($row->fullname_3){
								echo '<p>'.$row->fullname_3.'&nbsp&nbsp&nbsp'.$row->organ_3.'</p>';
								}
					
					}
				}
				echo '<div class="sep"></div>	';
				
				if($row->research_kind=='1'){
					echo '<p>'.'<strong> ประเภทโครงการวิจัย : </strong>'.'การวิจัยพื้นฐาน (Basic research)'.'</p>';
				
				}
				else if($row->research_kind=='2') {
					echo '<p>'.'<strong> ประเภทโครงการวิจัย : </strong>'.'การวิจัยประยุกต์ (Applied research)'.'</p>';
			
				}
				else {
					echo '<p>'.'<strong> ประเภทโครงการวิจัย : </strong>'.'การพัฒนาทดลอง (Experimental development) '.'</p>';
					
				}
				
				echo '<div class="sep"></div>	';
				
				if($row->fund_type=='1'){
					echo '<p>'.'<strong> ประเภทแหล่งทุนวิจัย :  </strong>'.'ทุนวิจัยภายนอก'.'</p>';
				
				}
				else {
					echo '<p>'.'<strong> ประเภทแหล่งทุนวิจัย :  </strong>'.'ทุนวิจัยภายใน'.'</p>';	
				}
				}
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ชื่อแหล่งทุนวิจัย :  </strong>'.$row->fund_name.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ปีงบประมาณ :  </strong>'.$row->budget_year.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> จำนวนเงินงบประมาณ :  </strong>'.number_format( $row->budget , 2 ).' บาท </p>';
				echo '<div class="sep"></div>	';
				switch ($row->research_status) {
	
					case "1":
					echo '<p>'.'<strong> สถานะการดำเนินโครงการวิจัย :  </strong>'.'เริ่มดำเนินโครงการ'.'</p>';
					break;
	
					case "2":
					echo '<p>'.'<strong> สถานะการดำเนินโครงการวิจัย :  </strong>'.'กำลังดำเนินโครงการ'.'</p>';
					break;

					case "3":
						echo '<p>'.'<strong> สถานะการดำเนินโครงการวิจัย :  </strong>'.'สิ้นสุดการดำเนินโครงการ'.'</p>';
					break;
					
					case "4":
						echo '<p>'.'<strong> สถานะการดำเนินโครงการวิจัย :  </strong>'.'ระงับการดำเนินโครงการ'.'</p>';
					break;
				}
			?>
			<?php 
				if ($row->date_start !== '0000-00-00'){
					echo '<div class="sep"></div>	';
			
					echo '<p>'.'<strong> วันที่เริ่มดำเนินโครงการ : </strong>'.thai_date(strtotime($row->date_start)).'</p>';
					//echo '<p>'.'<strong> วันที่เริ่มดำเนินโครงการ : </strong>'.strtotime($row->date_start).'</p>';
				}
			?>
			<?php 
				if ($row->date_end !== '0000-00-00'){
					echo '<div class="sep"></div>	';
					echo '<p>'.'<strong> วันที่เริ่มดำเนินโครงการ : </strong>'.thai_date(strtotime($row->date_end)).'</p>';
				}
			?>
			<?php if ($row->file_abstract){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์บทคัดย่อ : </strong>';
				print '<a  href='. base_url('fileAbstract/'.$row->file_abstract) .' class = pdf_icon>'.'ไฟล์รายละเอีดยบทคัดย่อ '.'</a>'.'</p>';
			}	
			?>
				<br>
</fieldset>
<br>
		<fieldset>
   				 <legend><img src=<?php print base_url()?>assets/img/researchAward-head.jpg /></legend>

			<?php
				if($queryAward->num_rows()==0){	

				echo'<p>'.'ไม่พบข้อมูลรางวัลโครงการวิจัย '.'</p>';

				}else
				{
				$no=1;
				foreach($queryAward->result() as $row){
	
			
				echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.anchor('researchAwardMain/dataDetailResearchAward/'.$row->researchAward_id.'/'.$row->user_id, $row->researchAward_name).'<p>';
				echo '<div class="sep"></div>	';
				$no++;
				}
			}
			?>
<br>
			</fieldset>
		
			<br>
		<fieldset>
   				 <legend><img src=<?php print base_url()?>assets/img/presentation-head.jpg /></legend>

			<?php
				if($queryPre->num_rows()==0){	

				echo'<p>'.'ไม่พบข้อมูลผลงานนำเสนอในการประชุมวิชาการ '.'</p>';

				}else
				{
				$no=1;
				foreach($queryPre->result() as $row){
	
			
				echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.anchor('presentationMain/dataDetailPresentation/'.$row->presentation_id.'/'.$row->user_id, $row->presentation_name).'<p>';
				echo '<div class="sep"></div>	';
				$no++;
				}
			}
			?>
<br>
			</fieldset>		
					<br>
		<fieldset>
   				 <legend><img src=<?php print base_url()?>assets/img/publication-head.jpg /></legend>

			<?php
				if($queryPub->num_rows()==0){	

				echo'<p>'.'ไม่พบข้อมูลผลงานตีพิมพ์ทางวิชาการ'.'</p>';

				}else
				{
				$no=1;
				foreach($queryPub->result() as $row){
	
			
				echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.anchor('publicationMain/datadetailpublication/'.$row->publication_id.'/'.$row->user_id, $row->publication_name).'<p>';
				echo '<div class="sep"></div>	';
				$no++;
				}
			}
			?>
<br>
			</fieldset>	
			<br>
		<fieldset>
   				 <legend><img src=<?php print base_url()?>assets/img/partent-head.jpg /></legend>

			<?php
				if($queryPar->num_rows()==0){	

				echo'<p>'.'ไม่พบข้อมูลผลงานทรัยพ์สินทางปัญญา'.'</p>';

				}else
				{
				$no=1;
				foreach($queryPar->result() as $row){
				if( $row->partent_type==1 ){
					echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.'สิทธิบัตร   :  '.anchor('sitiMain/datadetailsiti/'.$row->partent_id.'/'.$row->user_id, $row->partent_name).'<p>';
				}else if ($row->partent_type==2){
					echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.'อนุสิทธิบัตร   :  '.anchor('anuSitiMain/datadetailanusiti/'.$row->partent_id.'/'.$row->user_id, $row->partent_name).'<p>';
				}else{
					echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.'ลิขสิทธิ์   :  '.anchor('likasitMain/datadetaillikasit/'.$row->partent_id.'/'.$row->user_id, $row->partent_name).'<p>';
				}
				echo '<div class="sep"></div>	';
				$no++;
				}
			}
			?>
<br>
			</fieldset>	
	</div>
		
</div>
