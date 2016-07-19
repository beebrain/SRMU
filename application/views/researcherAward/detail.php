<?php 
$link_editResearcherAward = site_url() . 'researcherAward/editResearcherAward/'.$this->uri->segment(3).'/';
$link_deleteResearcherAward = site_url() . 'researcherAward/deleteResearcherAward/'.$this->uri->segment(3).'/';

?>
<div id="main">
<div class="full_w">
<div class="h_title"><a id="report">ข้อมูลรางวัลผลงานผู้วิจัย</a></div>
	
				</br>

			<?php

				foreach($query->result() as $row){
				
				echo '<p>'.'<strong> ชื่อรางวัลที่ได้รับ  </strong>'.'</br>'.'</br>'.$row->researcherAward_name.'</br>'.'</p>';
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
	
		
			<div class="sep"></div>
					<div class="right">
				<div class="align-right">
					<a id="edit" class="button" href="<?php echo $link_editResearcherAward.$row->researcherAward_id; ?>">แก้ไขข้อมููล</a>
				
					<a id="cancel" class="button" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="<?php echo $link_deleteResearcherAward.$row->researcherAward_id; ?>">ลบข้อมูล</a>
				</div>
			</div>
					
	</div>
		
</div>
