<?php 
$link_dataNews = site_url() . 'news/dataNews/'.$this->uri->segment(3); ?>

<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add">เพิ่มข้อมูลข่าวสารและการประชาสัมพันธ์</a>  </div>
	


		<?php echo form_open_multipart('news/savenew_News/'.$this->uri->segment(3)); ?>
	
					<div class="element">
						<label>หัวข้อข่าวประชาสัมพันธ์  : </label>
						<input type="text" name="news_title_value" placeholder="กรุณากรอกข้อมูลหัวข้อข่าวประชาสัมพันธ์  " class="text err"/>
						<?php echo form_error('news_title_value'); ?>
					</div>

		
					
					<div class="element">
						<label for="name">รายละเอียดข้อมูลข่าวประชาสัมพันธ์ :</label>
						

             		 <textarea name="news_detail_value" class="ckeditor" ></textarea>
            		
            
					</div>
					<div class="element">
						<label for="name">วันที่ประกาศ : <input autocomplete="off"  type="text" class="err" placeholder="คลิกเพื่อเพิ่มวันที่ประกาศ  " size="30"  id="datepicker-th" name="news_date_value" /></label>
						<?php echo form_error('news_date_value'); ?>
						 
					</div>

					<div class="element">
					
						<?php echo $this->session->flashdata('msg'); ?> 
						<label for="name">แนบไฟล์รายละเอียดข่าวสารประชาสัมพันธ์ :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
						<input type="file" name="file_news" />
						
						 
					</div>
					<div class="entry">
						<button  id="ok" type="submit" name="bsave">บันทึกข้อมูล</button>
						<a id="cancel" class="button" href="<?php echo $link_dataNews; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


