<?php 
$link_editResearch = site_url() . 'research/editResearch/'.$this->uri->segment(3).'/';
$link_editResearchGroup = site_url() . 'research/editResearchGroup/'.$this->uri->segment(3).'/';
$link_deleteResearch = site_url() . 'research/deleteResearch/'.$this->uri->segment(3).'/';
$link_deleteResearchGroup = site_url() . 'research/deleteResearchGroup/'.$this->uri->segment(3).'/';
?>
<div id="main">
<div class="full_w">
<div class="h_title"><a id="report">ข้อมูลรายละเอียดโครงการวิจัย</a></div>
	
				<br>		<?php echo $this->session->flashdata('msg'); ?> 
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
				
				echo '<p>'.'<strong> ชื่อโครงการวิจัย (EN)  </strong>'.'</br>'.'</br>'.$row->research_name_en.'</br>'.'</p>';
				
				
				
				if($row->research_type=='2'){
					echo '<div class="sep"></div>';
					echo '<p>'.'<strong> ผู้ร่วมดำเนินโครงการวิจัยภายใน    </strong>'.'</br>';
					$partnerIN=$this->partnerinmodel->get_partner_in($row->research_id);
					foreach($partnerIN->result() as $rowIN){
					if ($partnerIN!= null){
					$queryPosition=$this->researchModel->positionRe($rowIN->researcher_id);
					foreach($queryPosition->result() as $rowPos){
						
					echo '<br>'.$rowPos->position_name.$rowPos->name_th." ".$rowPos->surname_th.'<br>';
				
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


			<div class="sep"></div>
					<div class="right">
				<div class="align-right">
				<?php 
				if($row->research_type=='2'){
					echo '<a id="edit" class="button" href="'.$link_editResearchGroup.$row->research_id.'">แก้ไขข้อมููล</a>';

				}else{
					echo '<a id="edit" class="button" href="'.$link_editResearch.$this->uri->segment(4).'">แก้ไขข้อมููล</a>';
				}
				?>
					
				<?php 
				if($row->research_type=='2'){
					echo '<a id="cancel" class="button" onclick="return confirm(\'คุณต้องการลบข้อมูลนี้ใช่หรือไม่?\')"  href="'.$link_deleteResearchGroup.$row->research_id.'">ลบข้อมูล</a>';
	
				}else{
					echo '<a id="cancel" class="button" onclick="return confirm(\'คุณต้องการลบข้อมูลนี้ใช่หรือไม่?\')" href="'.$link_deleteResearch.$row->research_id.'">ลบข้อมูล</a>';
					
				}
				
				?>
					
				</div>
			</div>
					
	</div>
		
</div>
				