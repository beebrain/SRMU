<?php 
$link_editNews = site_url() . 'news/editNews/'.$this->uri->segment(3).'/';
$link_deleteNews = site_url() . 'news/deleteNews/'.$this->uri->segment(3).'/';

?>
<div id="main">
<div class="full_w">
<div class="h_title"><a id="report">ข้อมูลข่าวสารและการประชาสัมพันธ์ </a></div>
	
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
					echo '<p>'.'<strong> วันประกาศ : </strong>'.thai_date(strtotime($row->news_date)).'</p>';

				}
			?>
			<?php if ($row->news_file){
				echo '<div class="sep"></div>	';
				print '<p>'.'<strong> ไฟล์รายละเอียดข่าวสารประชาสัมพันธ์ : </strong>';
				print '<a  href='. base_url('fileNewsUpload/'.$row->news_file) .' class = pdf_icon>'.'ไฟล์รายละเอียดข่าวสารประชาสัมพันธ์ '.'</a>'.'</p>';
	
			}
					
			?>
<?php 	if($row->status==1){
	echo '<div class="sep"></div>	';
					echo '<p>'.'<strong> สถานะการเผยแพร่ข้อมูลข่าวประชาสัมพันธ์  : </strong>'.'อนุมัติการเผยแพร่ข้อมูลข่าวสาร'.'</p>';
				
				}else{
					echo '<div class="sep"></div>	';
					echo '<p>'.'<strong> สถานะการเผยแพร่ข้อมูลข่าวประชาสัมพันธ์  : </strong>'.'ระงับการเผยแพร่ข้อมูลข่าวสาร'.'</p>';
				}?>
		
			<div class="sep"></div>
					<div class="right">
				<div class="align-right">
					<a id="edit" class="button" href="<?php echo $link_editNews.$row->news_id; ?>">แก้ไขข้อมููล</a>
				
					<a id="cancel" class="button" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="<?php echo $link_deleteNews.$row->news_id; ?>">ลบข้อมูล</a>
				</div>
			</div>
					
	</div>
		
</div>
