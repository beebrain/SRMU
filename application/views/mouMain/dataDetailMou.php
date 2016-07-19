
<div id="main">

	<div class="full_w">
	<fieldset>
<legend><img src=<?php print base_url()?>assets/img/mou-head_.jpg /></legend>
				</br>
			<?php

				foreach($query->result() as $row){
				
				echo '<p>'.'<strong> ชื่อบันทึกความร่วมมือด้านการวิจัย  </strong>'.'</br>'.'</br>'.$row->mou_name.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> รายละเอียดข้อมูลความร่วมมือด้านการวิจัย </strong>'.'</br>'.'</br>'.$row->mou_detail.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> ชื่อหน่วยงานความร่วมมือด้านการวิจัย: </strong>'.$row->mou_agencies.'</p>';
		
				
				}
				
			?>
			<?php if ($row->mou_file){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์รายละเอียดความร่วมมือด้านการวิจัย : </strong>';
				print '<a  href='. base_url('fileMouUpload/'.$row->mou_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดความร่วมมือด้านการวิจัย '.'</a>'.'</p>';
				
			}
					
			?>
			<br>
			</fieldset>

					
			
	</div>

</div>
