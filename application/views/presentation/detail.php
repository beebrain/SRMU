<?php 
$link_editpresentation = site_url() . 'presentation/editpresentation/'.$this->uri->segment(3).'/';
$link_deletepresentation = site_url() . 'presentation/deletepresentation/'.$this->uri->segment(3).'/';

?>
<div id="main">
<div class="full_w">
<div class="h_title"><a id="report">ข้อมูลผลงานนำเสนอในการประชุมวิชาการ</a></div>
	
				</br>

			<?php

				foreach($query->result() as $row){
				echo '<p>'.'<strong> โครงการวิจัย  </strong>'.'</br>'.'</br>'.$row->research_name_th.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
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
	
		
			<div class="sep"></div>
					<div class="right">
				<div class="align-right">
					<a id="edit" class="button" href="<?php echo $link_editpresentation.$row->presentation_id; ?>">แก้ไขข้อมููล</a>
				
					<a id="cancel" class="button" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="<?php echo $link_deletepresentation.$row->presentation_id; ?>">ลบข้อมูล</a>
				</div>
			</div>
					
	</div>
		
</div>

