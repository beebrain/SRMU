
<div id="main">

	<div class="full_w">
	<fieldset>
<legend><img src=<?php print base_url()?>assets/img/news-head_.jpg /></legend>
				</br>


			<?php

				foreach($query->result() as $row){
				
				echo '<p>'.'<strong> หัวข้อข่าวประชาสัมพันธ์  </strong>'.'</br>'.'</br>'.$row->news_title.'</br>'.'</p>';
				echo '<div class="sep"></div>	';
				echo '<p>'.'<strong> รายละเอียดข้อมูลข่าวประชาสัมพันธ์  </strong>'.'</br>'.'</br>'.$row->news_detail.'</br>'.'</p>';
				
				}
				
			?>
				<?php 
				if ($row->news_date !== '0000-00-00'){
					echo '<div class="sep"></div>	';
					echo '<p>'.'<strong> วันประกาศ  : </strong>'.thai_date(strtotime($row->news_date)).'</p>';
				}
			?>
			<?php if ($row->news_file){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์รายละเอียดข่าวสารประชาสัมพันธ์ : </strong>';
				print '<a  href='. base_url('fileNewsUpload/'.$row->news_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดข่าวสารประชาสัมพันธ์ '.'</a>'.'</p>';
				
			}
					
			?>
			<br>
				</fieldset>
	
	
					
	</div>

</div>

