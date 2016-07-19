<?php 
$link_editpartent = site_url() . 'partent/editpartent/'.$this->uri->segment(3).'/';
$link_deletepartent = site_url() . 'partent/deletepartent/'.$this->uri->segment(3).'/';

?>
<div id="main">
<div class="full_w">
<div class="h_title"><a id="report"> ข้อมูลผลงานทรัยพ์สินทางปัญญา</a></div>
	
				</br>

			<?php

				foreach($query->result() as $row){
				echo '<p>'.'<strong> โครงการวิจัย  </strong>'.'</br>'.'</br>'.$row->research_name_th.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> ชื่อในการจดทะเบียน  : </strong>'.'</br>'.'</br>'.$row->partent_name.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				echo '<p>'.'<strong> เลขที่ทะเบียน  :   </strong>'.'</br>'.'</br>'.$row->partent_no.'</br>'.'</p>';
				echo '<div class="sep"></div>';
				
				
				if($row->partent_type=='1'){
					echo '<p>'.'<strong> ประเภทการจดทะเบียน :  </strong>'.'สิทธิบัตร '.'</p>';
					echo '<div class="sep"></div>';
				}
				else if($row->partent_type=='2'){
					echo '<p>'.'<strong> ประเภทการจดทะเบียน:  </strong>'.'อนุสิทธิบัตร '.'</p>';
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
				print '<p>'.'<strong> ไฟล์รายละเอียดผลงานทรัยพ์สินทางปัญญา  : </strong>';
				print '<a  href='. base_url('filepartentUpload/'.$row->partent_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดผลงานทรัยพ์สินทางปัญญา '.'</a>'.'</p>';
				
			}
					
			?>
	
		
			<div class="sep"></div>
					<div class="right">
				<div class="align-right">
					<a id="edit" class="button" href="<?php echo $link_editpartent.$row->partent_id; ?>">แก้ไขข้อมููล</a>
				
					<a id="cancel" class="button" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="<?php echo $link_deletepartent.$row->partent_id; ?>">ลบข้อมูล</a>
				</div>
			</div>
					
	</div>
		
</div>


