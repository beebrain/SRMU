<?php 
$link_editMou = site_url() . 'mou/editMou/'.$this->uri->segment(3).'/';
$link_deleteMou = site_url() . 'mou/deleteMou/'.$this->uri->segment(3).'/';

?>
<div id="main">
<div class="full_w">
<div class="h_title"><a id="report"> ข้อมูลความร่วมมือด้านการวิจัย</a> </div>
	
				</br>

			<?php

				foreach($query->result() as $row){
				
				echo '<p>'.'<strong> ชื่อบันทึกความร่วมมือด้านการวิจัย  </strong>'.'</br>'.'</br>'.$row->mou_name.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> รายละเอียดข้อมูลความร่วมมือด้านการวิจัย </strong>'.'</br>'.'</br>'.$row->mou_detail.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ชื่อหน่วยงานความร่วมมือด้านการวิจัย: </strong>'.$row->mou_agencies.'</p>';
				echo '<div class="sep"></div>	';
				
				}
				
			?>
			<?php if ($row->mou_file){
				
				print '<p>'.'<strong> ไฟล์รายละเอียดความร่วมมือด้านการวิจัย : </strong>';
				print '<a  href='. base_url('fileMouUpload/'.$row->mou_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดความร่วมมือด้านการวิจัย '.'</a>'.'</p>';
				echo '<div class="sep"></div>	';
			}
					
			?>
			

					<div class="right">
				<div class="align-right">
					<a id="edit" class="button" href="<?php echo $link_editMou.$row->mou_id; ?>">แก้ไขข้อมููล</a>
				
					<a id="cancel" class="button" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="<?php echo $link_deleteMou.$row->mou_id; ?>">ลบข้อมูล</a>
				</div>
			</div>
			
	</div>

</div>
