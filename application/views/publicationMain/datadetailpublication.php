
<div id="main">
<div class="full_w">
<fieldset>
<legend><img src=<?php print base_url()?>assets/img/publication-head.jpg /></legend>
				</br>

			<?php

				foreach($query->result() as $row){
				echo '<p>'.'<strong> โครงการวิจัย  </strong>'.'</br>'.'</br>'.anchor('researchMain/dataDetailResearch/'.$row->research_id.'/'.$row->user_id,$row->research_name_th).'</br>'.'</p>';
				echo '<div class="sep"></div>';
				$queryPosition=$this->researchModel->positionRe($row->user_id);
				foreach($queryPosition->result() as $rowPos_)
					echo '<p>'.'<strong> หัวหน้าโครงการวิจัย : </strong>'.anchor('researcherMain/dataDetailResearcher/'.$row->user_id,$rowPos_->position_name.$rowPos_->name_th." ".$rowPos_->surname_th).'</p>';
				echo '<div class="sep"></div>';
				echo '<p>'.'<strong> ชื่อบทความทีได้รับการตีพิมพ์  </strong>'.'</br>'.'</br>'.$row->publication_name.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> ชื่อวารสารทางวิชาการ </strong>'.'</br>'.'</br>'.$row->journal_name.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> ปีที่เผยแพร่  : </strong>'.$row->publication_years.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				echo '<p>'.'<strong> ฉบับที่ : </strong>'.$row->publication_no.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				echo '<p>'.'<strong> หน้าที่ :  </strong>'.$row->publication_page.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				echo '<p>'.'<strong> คำสำคัญ    </strong>'.'</br>'.'</br>'.$row->publication_keyword.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				if($row->publication_type=='1'){
					echo '<p>'.'<strong> ประเภทการตีพิมพ์:  </strong>'.'ระดับชาติ'.'</p>';
					echo '<div class="sep"></div>';
				}
				else {
					echo '<p>'.'<strong> ประเภทการตีพิมพ์ :  </strong>'.'ระดับนานาชาติ'.'</p>';
					echo '<div class="sep"></div>';
				}
				
				
				echo '<p>'.'<strong> เลขมาตรฐานสากลประจำวารสาร (ISSN)  : </strong>'.$row->ISSN_code.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> บทคัดย่อ  : </strong>'.$row->publication_abstract.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> ลิงค์เชื่อมโยงผลงานตีพิมพ์  : </strong>'.$row->publication_link.'</br>'.'</p>';
			
				
				}
			?>
			
			<?php if ($row->publication_file){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์รายละเอียดผลงานนำเสนอ  : </strong>';
				print '<a  href='. base_url('filepublicationUpload/'.$row->publication_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดผลงานนำเสนอ'.'</a>'.'</p>';
				
			}
					
			?>
<br>
			</fieldset>			
	</div>
		
</div>

