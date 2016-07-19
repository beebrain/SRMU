<?php 
$link_datapublication= site_url() . 'publication/datapublication/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลผลงานตีพิมพ์ทางวิชาการ </a></div>
	


		<?php
			print form_open_multipart("publication/update_publication/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
		<div class="element">
							<label for="name" > โครงการวิจัย :
					
					<select class="err" name="research_id" style="text align:center; width: 100%">
					<?php
						if($queryResearch->num_rows()==0){	
						echo '<option value="">ไม่พบข้อมูลโครงการวิจัย</option>';			
						}else{
						foreach($queryResearch->result() as $row){
							echo '<option value='.$row->research_id.'>'.$row->research_name_th.'</option>';
							if ($row->research_id==$rs['research_id'])
							{
									
								echo '<option value='.".$row->research_id.". ' selected="selected" >'.$row->research_name_th;
									
									
							}
							
						}
						}
						?>
					</select>
						</label>
					</div>
		
					<div class="element">
						<label>ชื่อบทความทีได้รับการตีพิมพ์    : </label>
						<input type="text" name="publication_name" class="text" value="<?php print $rs['publication_name'];?>"/>
					</div>
					
					<div class="element">
						<label>ชื่อวารสารทางวิชาการ : </label>
						<input type="text" name="journal_name" class="text" value="<?php print $rs['journal_name'];?>"/>
					</div>
				
						<div class="element">
					<label for="name">ปีที่เผยแพร่ : <input type="text"  size="12"  name="publication_years" value="<?php print $rs['publication_years'];?>"/>&nbsp
						ฉบับที่ : <input type="text"  size="15"  name="publication_no" value="<?php print $rs['publication_no'];?>"/>&nbsp
						หน้าที่ : <input type="text" size="15" name="publication_page" value="<?php print $rs['publication_page'];?>"/></label>
					</div>
					<div class="element">
						<label for="name">คำสำคัญ  :</label>
						<textarea class="textarea" rows="3" name="publication_keyword"><?php print $rs['publication_keyword'];?></textarea>
					</div>
				
					<div class="element">	
						<label for="comments">ประเภทการตีพิมพ์ :
						&nbsp;&nbsp;<input type="radio" name="publication_type" value="1" <?php if ($rs['publication_type']==1) echo "checked='checked'";?> /> ระดับชาติ 
						&nbsp;&nbsp;<input type="radio" name="publication_type" value="2" <?php if ($rs['publication_type']==2) echo "checked='checked'";?>/> ระดับนานาชาติ

					</label>
					</div>
					
					<div class="element">
						<label>เลขมาตรฐานสากลประจำวารสาร (ISSN) : </label>
						<input type="text" name="ISSN_code" class="text" value="<?php print $rs['ISSN_code'];?>"/>
					</div>
					
					<div class="element">
						<label for="name">บทคัดย่อ :</label>
						

             		 <textarea name="publication_abstract" class="ckeditor" ><?php print $rs['publication_abstract'];?></textarea>
            		
            
					</div>
					<div class="element">
						<label>ลิงค์เชื่อมโยงผลงานตีพิมพ์ : </label>
						<input type="url" name="publication_link" class="text" value="<?php print $rs['publication_link'];?>"/>
					</div>
					
					<?php 
					if ($rs['publication_file']){
						print '<div class="element">';
						print '<label for="name">ไฟล์รายละเอียดผลงานตีพิมพ์ทางวิชาการ  : '.$rs['publication_file'].'</label>';
						print '</div>'	;

						}
					?>

   					<div class="element">
   					<?php echo $this->session->flashdata('msg'); ?> 
   					<label for="name">แก้ไขไฟล์รายละเอียดผลงานตีพิมพ์ทางวิชาการ :<span class="red"> (ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf)</span></label>
					<input type="file" name="publication_file" />
					</div>
					
					
					<br>
					<button  id="ok" type="submit" name="bsave">บันทึกข้อมูล</button>
					<a id="cancel" class="button" href="<?php echo $link_datapublication?>">ยกเลิก</a>
					</div>

			
				<?php print form_close();?>

	</div>
		
</div>



