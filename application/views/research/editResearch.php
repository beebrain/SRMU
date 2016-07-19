
<?php 
$link_dataResearch = site_url() . 'research/dataResearch/'.$this->uri->segment(3); 
?>


	<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลโครงการวิจัยเดี่ยว</a> </div>
	
	
	
	
		<?php echo form_open_multipart('research/update_Research/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>
<div class="element">	
						<label for="comments">ลักษณะโครงการวิจัย :
						&nbsp;&nbsp;<input type="radio" name="research_type" value="1"   checked="checked"/> โครงการวิจัยเดี่ยว  
						&nbsp;&nbsp;<input type="radio" name="research_type" value="2" disabled/> ชุดโครงการวิจัย 
					</label>
					</div>
					
					<div class="element">
						<label>ชื่อโครงการวิจัย  (TH) : 
						<input type="text" name="research_name_th" class="text err" autocomplete="off" value="<?php print $rs['research_name_th'];?>"/>
						</label><?php echo form_error('research_name_th'); ?>
					</div>
					
					<div class="element">
						<label>ชื่อโครงการวิจัย  (EN) : </label>
						<input type="text" name="research_name_en" class="text" autocomplete="off" value="<?php print $rs['research_name_en'];?>"/>
			
					</div>
					
					<div class="element">
						<label for="comments">ประเภทโครงการวิจัย  :
						<select name="research_kind" class="err">
							
							<option value="1" <?php if ($rs['research_kind']==1) echo "selected='selected'";?>>การวิจัยพื้นฐาน (Basic research)</option>
							<option value="2" <?php if ($rs['research_kind']==2) echo "selected='selected'";?>>การวิจัยประยุกต์ (Applied research)</option>
							<option value="3" <?php if ($rs['research_kind']==3) echo "selected='selected'";?>>การพัฒนาทดลอง (Experimental development)</option>
						</select>
					</label>
					<?php echo form_error('research_kind'); ?>
					</div>
					
					<div class="element">
						<label>ชื่อแหล่งทุนวิจัย  : 
						<select name="fund_id" class="err">
						<?php
							if($queryFund->num_rows()==0)
							{
							echo '<option value="ไม่พบข้อมูลแหล่งทุนวิจัย"</option>';
							}
							else{
							foreach($queryFund->result() as $row){
								echo '<option value='.".$row->fund_id.".'  >'.$row->fund_name;
								if ($row->fund_id==$rs['fund_id']) 
								{ 
									echo '<option value='.".$row->fund_id.". ' selected="selected" >'.$row->fund_name;
								}
							}
							}
							?>
							</select>
							</label>
						<?php echo form_error('fund_id'); ?>
					</div>
					

					<div class="element">
						<label for="comments">สถานะการดำเนินโครงการวิจัย  :
						<select name="research_status" class="err" >
	
							<option value="1" <?php if ($rs['research_status']==1) echo "selected='selected'";?>>เริ่มดำเนินโครงการ</option>
							<option value="2" <?php if ($rs['research_status']==2) echo "selected='selected'";?>>กำลังดำเนินโครงการ</option>
							<option value="3" <?php if ($rs['research_status']==3) echo "selected='selected'";?>>สิ้นสุดการดำเนินโครงการ</option>
							<option value="4" <?php if ($rs['research_status']==4) echo "selected='selected'";?>>ระงับการดำเนินโครงการ</option>
						</select>
						
					</label>
					<?php echo form_error('research_status'); ?>
					</div>
					<div class="element">
						<label>ปีงบประมาณ : <span class="red"> ( กรุณากรอกจำนวนตัวเลขปี พ.ศ. เช่น  2558 )</span></label>
						<input type="text" name="budget_year" class="text" autocomplete="off" onKeyUp="IsNumeric(this.value,this)" value="<?php print $rs['budget_year'];?>"/>
						<?php echo form_error('budget_year'); ?>
					</div>
					
					<div class="element">
						<label>จำนวนเงินงบประมาณ : <span class="red">( กรุณากรอกจำนวนตัวเลขจำนวนเงินงบประมาณ เช่น 200000 )</span>
						<input type="text" name="budget" autocomplete="off" class="text" onKeyUp="IsNumeric(this.value,this)" value="<?php print $rs['budget'];?>"/>
						</label>
						<?php echo form_error('budget'); ?>
					</div>
					
					
					
					<div class="element">
						<label for="name">วันที่เริ่มดำเนินโครงการ : <input type="text" size="20" id="datepicker-th" name="date_start" value="<?php print $rs['date_start'];?>"/>

						</label>

						 
					</div>
					
					<div class="element">
						<label for="name">วันสิ้นสุดการดำเนินโครงการ : <input type="text" size="20" id="datepicker-th-2" name="date_end" value="<?php print $rs['date_end'];?>"/></label>
		 
					</div>
					
				<?php 
					if ($rs['file_abstract']){
						print '<div class="element">';
						print '<label for="name">ไฟล์บทคัดย่อ  : '.$rs['file_abstract'].'</label>';
						print '</div>'	;

						}
					?>
		
			<div class="element">
					<?php echo $this->session->flashdata('msg'); ?> 
					<label for="name">แก้ไขไฟล์บทคัดย่อ :<span class="red"> ( ขนาดไฟล์ไม่เกิน : 10 MB | ชนิดของไฟล์ : pdf )</span> </label>
					<input type="file" name="file_abstract" size="20" />&nbsp;
					</div>
    
					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataResearch; ?>">ยกเลิก</a>
					</div>
					
				<?php print form_close();?>

	</div>
		
</div>


