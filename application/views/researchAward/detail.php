<?php 
$link_editresearchAward = site_url() . 'researchAward/editresearchAward/'.$this->uri->segment(3).'/';
$link_deleteresearchAward = site_url() . 'researchAward/deleteresearchAward/'.$this->uri->segment(3).'/';

?>
<div id="main">
<div class="full_w">
<div class="h_title"><a id="report">ข้อมูลรางวัลผลงานโครงการวิจัย</a></div>
	
				</br>

			<?php

				foreach($query->result() as $row){
				echo '<p>'.'<strong> โครงการวิจัย  </strong>'.'</br>'.'</br>'.$row->research_name_th.'</br>'.'</p>';
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
				print '<a  href='. base_url('fileresearchAwardUpload/'.$row->researchAward_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดรางวัลโครงการวิจัย '.'</a>'.'</p>';
				
			}
					
			?>
	
		
			<div class="sep"></div>
					<div class="right">
				<div class="align-right">
					<a id="edit" class="button" href="<?php echo $link_editresearchAward.$row->researchAward_id; ?>">แก้ไขข้อมููล</a>
				
					<a id="cancel" class="button" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="<?php echo $link_deleteresearchAward.$row->researchAward_id; ?>">ลบข้อมูล</a>
				</div>
			</div>
					
	</div>
		
</div>
