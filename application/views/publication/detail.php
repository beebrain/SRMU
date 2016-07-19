<?php 
$link_editpublication = site_url() . 'publication/editpublication/'.$this->uri->segment(3).'/';
$link_deletepublication = site_url() . 'publication/deletepublication/'.$this->uri->segment(3).'/';

?>
<div id="main">
<div class="full_w">
<div class="h_title"><a id="report">ข้อมูลผลงานตีพิมพ์ทางวิชาการ</a></div>
	
				</br>

			<?php

				foreach($query->result() as $row){
				echo '<p>'.'<strong> โครงการวิจัย  </strong>'.'</br>'.'</br>'.$row->research_name_th.'</br>'.'</p>';
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
				print '<p>'.'<strong> ไฟล์รายละเอียดผลงานตีพิมพ์  : </strong>';
				print '<a  href='. base_url('filepublicationUpload/'.$row->publication_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดผลงานตีพิมพ์ '.'</a>'.'</p>';
				
			}
					
			?>
	
		
			<div class="sep"></div>
					<div class="right">
				<div class="align-right">
					<a id="edit" class="button" href="<?php echo $link_editpublication.$row->publication_id; ?>">แก้ไขข้อมููล</a>
				
					<a id="cancel" class="button" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="<?php echo $link_deletepublication.$row->publication_id; ?>">ลบข้อมูล</a>
				</div>
			</div>
					
	</div>
		
</div>

