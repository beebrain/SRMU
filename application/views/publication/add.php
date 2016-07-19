
<?php 
$link_datapublication = site_url() . 'publication/datapublication/'.$this->uri->segment(3); ?>

<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add">เพิ่มข้อมูลผลงานตีพิมพ์ทางวิชาการ</a></div>

		<?php echo form_open_multipart('publication/savenew_publication/'.$this->uri->segment(3)); ?>
	
				<div class="element">
							<label for="name" > โครงการวิจัย :
					
					<select class="err" name="research_id" style="text align:center; width: 100%">
					<?php
						if($queryResearch->num_rows()==0){	
						echo '<option value="">ไม่พบข้อมูลโครงการวิจัย</option>';			
						}else{
						echo '<option value="">--------  กรุณาเลือกโครงการวิจัย  ---------</option>';
						foreach($queryResearch->result() as $row){
						echo '<option value='.$row->research_id.'>'.$row->research_name_th.'</option>';
						}
						}
						?>
					</select>
						</label>
						<?php echo form_error('research_id'); ?>
					</div>

			<div class="element">
						<label>ชื่อบทความที่ได้รับการตีพิมพ์ : 
						
						<input type="text" name="publication_name" class="text err" placeholder="กรุณากรอกข้อมูลชื่อบทความที่ได้รับการตีพิมพ์"/>
						</label>
						<?php echo form_error('publication_name'); ?>
					</div>

					<div class="element">
						<label>ชื่อวารสารทางวิชาการ : 
						<input type="text" name="journal_name" class="text err" placeholder="กรุณากรอกข้อมูลชื่อวารสารทางวิชาการ"/>
						</label>
						<?php echo form_error('journal_name'); ?>
					</div>
					
				
					<div class="element">
					<label for="name">ปีที่เผยแพร่ : <input type="text"  size="12"  name="publication_years" onKeyUp="IsNumeric(this.value,this)" />&nbsp
						ฉบับที่ : <input type="text"  size="15"  name="publication_no" />&nbsp
						หน้าที่ : <input type="text" size="15" name="publication_page" /></label>
					</div>
					<div class="element">
						<label for="name">คำสำคัญ  :</label>
						<textarea class="textarea" rows="3" name="publication_keyword"  ></textarea>
					</div>
				
					<div class="element">	
						<label for="comments">ประเภทการตีพิมพ์ :
						&nbsp;&nbsp;<input type="radio" name="publication_type" value="1" checked="checked" /> ระดับชาติ 
						&nbsp;&nbsp;<input type="radio" name="publication_type" value="2" /> ระดับนานาชาติ

					</label>
					</div>
					<div class="element">
						<label>เลขมาตรฐานสากลประจำวารสาร (ISSN) : </label>
						<input type="text" name="ISSN_code" class="text"/>
					</div>
					<div class="element">
						<label for="name">บทคัดย่อ :</label>
						

             		 <textarea name="publication_abstract" class="ckeditor" ></textarea>
            		
            
					</div>
					<div class="element">
						<label>ลิงค์เชื่อมโยงผลงานตีพิมพ์ : </label>
						<input type="url" name="publication_link" class="text"/>
					</div>
	

					<div class="element">
					
						<?php echo $this->session->flashdata('msg'); ?> 
						<label for="name">แนบไฟล์รายละเอียดผลงานตีพิมพ์ทางวิชาการ :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
						<input type="file" name="publication_file" />
						
						 
					</div>
					
					<div class="entry">
						<button  id="ok" type="submit" name="bsave">บันทึกข้อมูล</button>
						<a id="cancel" class="button" href="<?php echo $link_datapublication; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>



