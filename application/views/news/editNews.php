<?php 
$link_dataNews= site_url() . 'news/dataNews/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลข่าวสารและการประชาสัมพันธ์</a></div>
	


		<?php
			print form_open_multipart("news/update_News/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
					<div class="element">
						<label>หัวข้อข่าวประชาสัมพันธ์  : </label>
						<input type="text"name="news_title_value" class="text" value="<?php print $rs['news_title'];?>" />
					</div>

		
					<div class="element">
						<label for="name">รายละเอียดข้อมูลข่าวประชาสัมพันธ์ :</label>
             		 	<textarea name="news_detail_value" class="ckeditor" ><?php print $rs['news_detail'];?></textarea>
            			 <script type="text/javascript">
            			 CKEDITOR.appendTo( 'container_id',
            						{ /* Configuration options to be used. */ }
            						'Editor content to be used.'
            					);
						</script> 
					</div>
					
					<div class="element">
						<label for="name">วันที่ประกาศ : <input type="text" placeholder="วันที่ประกาศ" id="datepicker-th" size="20" value="<?php print $rs['news_date'];?>" name="news_date_value" /></label>
						 
					</div>
					
					<?php 
					if ($rs['news_file']){
						print '<div class="element">';
						print '<label for="name">ไฟล์รายละเอียดข่าวสารประชาสัมพันธ์  : '.$rs['news_file'].'</label>';
						print '</div>'	;

						}
					?>

   					<div class="element">
   					<?php echo $this->session->flashdata('msg'); ?> 
   					<label for="name">แก้ไขไฟล์รายละเอียดข่าวสารประชาสัมพันธ์ :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
					<input type="file" name="file_news" />
					</div>
								<div class="entry"></div>
					<div class="h_title"><a id="edit"> แก้ไขข้อมูลเผยแพร่ข่าวสารและการประชาสัมพันธ์</a></div>
 					<br>
					<p>
					<input type="radio" name="status_value" value="1"  <?php if ($rs['status']==1) echo "checked='checked'";?>/>  เผยแพร่ข้อมูลข่าวสาร&nbsp;&nbsp;&nbsp;
					<input type="radio" name="status_value" value="0" <?php if ($rs['status']==0) echo"checked='checked'";?>/>&nbsp;ระงับการเผยแพร่ข้อมูลข่าวสาร
					</p>
			</br>
							<div class="sep"></div>

					</br>
					<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataNews?>">ยกเลิก</a>
					</div>

			
				<?php print form_close();?>

	</div>
		
</div>


