
<?php 
$link_dataResearch = site_url() . 'research/dataResearch/'.$this->uri->segment(3); 
?>


	<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลชุดโครงการวิจัย ( โครงการวิจัยที่มีผู้ร่วมดำเนินโครงการ )</a></div>
	
	
	
	
		<?php echo form_open_multipart('research/update_ResearchGroup/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>
<div class="element">	
						<label for="comments">ลักษณะโครงการวิจัย :
						&nbsp;&nbsp;<input type="radio" name="research_type" value="1"  disabled/> โครงการวิจัยเดี่ยว  
						&nbsp;&nbsp;<input type="radio" name="research_type" value="2" checked="checked" /> ชุดโครงการวิจัย 
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
				<div class="element">
						<label for="name">ผู้ร่วมดำเนินโครงการวิจัย (ภายในคณะ)  </label>
			
				
 				


    <?php 
    		$partnerIN=$this->partnerinmodel->get_partner_in($this->uri->segment(4));
    		if ($partnerIN->num_rows() > 0){
    			echo '<table id="myTbl" >  ';
					foreach($partnerIN->result() as $rowIN){
					
						echo '  <tr class="firstTr">  ';
						echo   '<td >';  
						echo '<select name="data1[]" id="data1[]"class="text">';
						if($queryResearcher->num_rows()==0){
							echo '<option value="ไม่พบข้อมูลผู้วิจัย"</option>';
						}else{
							echo '<option value="">-- กรุณาเลือกข้อมูลผู้วิจัยภายในคณะ --</option>';
							foreach($queryResearcher->result() as $row){
								if($row->position_name==NULL){
									if($row->title==1){
										echo '<option value='.$row->user_id.'>'.'นาย'.$row->name_th." ".$row->surname_th.'</option>';
									}elseif ($row->title==2){
										echo '<option value='.$row->user_id.'>'.'นาง'.$row->name_th." ".$row->surname_th.'</option>';
									}
									else{
										echo '<option value='.$row->user_id.'>'.'นางสาว'.$row->name_th." ".$row->surname_th.'</option>';
									}
						
								}else {
									echo '<option value='.$row->user_id.'>'.$row->position_name.$row->name_th."  ".$row->surname_th.'</option>';
								}
								if ($row->user_id==$rowIN->researcher_id)
								{
									echo '<option value='.".$row->user_id.". ' selected="selected" >'.$row->position_name.$row->name_th."  ".$row->surname_th;
								}
							}
						}
						
						echo '</select>';
					echo '</td>  
									
    					<td >  
   						 <input name="h_item_id[]" type="hidden" id="h_item_id[]" value="" />  
 
 
   					 </td>  
    				</tr> 
					';
					}}else{
						echo '<tr class="firstTr">
						<td >
						<select name="data1[]" id="data1[]"class="text">';
					
						if($queryResearcher->num_rows()==0){
							echo '<option value="ไม่พบข้อมูลผู้วิจัย"</option>';
						}else{
							echo '<option value="">-- กรุณาเลือกข้อมูลผู้วิจัยภายในคณะ --</option>';
							foreach($queryResearcher->result() as $row){
								if($row->position_name==NULL){
									if($row->title==1){
										echo '<option value='.$row->user_id.'>'.'นาย'.$row->name_th." ".$row->surname_th.'</option>';
									}elseif ($row->title==2){
										echo '<option value='.$row->user_id.'>'.'นาง'.$row->name_th." ".$row->surname_th.'</option>';
									}
									else{
										echo '<option value='.$row->user_id.'>'.'นางสาว'.$row->name_th." ".$row->surname_th.'</option>';
									}
						
								}else {
									echo '<option value='.$row->user_id.'>'.$row->position_name.$row->name_th."  ".$row->surname_th.'</option>';
								}
							}
						
								echo'</select></td>  
						    <td >  
						    <input name="h_item_id[]" type="hidden" id="h_item_id[]" value="" />  
 
						 
						    </td>  
						    </tr>  ';
					}}
					
?>
</table>
 </div>  
<div class="element" >
  <button class="add" id="addRow" type="button">เพิ่มข้อมูล</button>    
 <button class="cancel" id="removeRow" type="button">ลบข้อมูล</button> 

 </div>  

					
		
		<div class="element">
						<label for="name">ผู้ร่วมดำเนินโครงการวิจัยภายนอก : </label>
		 
					
		<table>
	
			
			<tr>
			<th >ลำดับ</th>
			<th >ชื่อ - นามสกุล</th>
			<th>หน่วยงาน/สถาบัน</th>
			</tr>
			<tbody>
			
			<tr>
			<td align="center">1</td>
			<td><input type="text" name="fullname" style="width: 250px"  value="<?php print $rs['fullname'];?>"/><?php echo form_error('fullname'); ?></td>
			<td><input type="text" name="organ" style="width: 300px"  value="<?php print $rs['organ'];?>"/><?php echo form_error('organ'); ?></td>
			</tr>
			<tr>
			<td align="center">2</td>
			<td><input type="text" name="fullname_2" style="width: 250px" value="<?php print $rs['fullname_2'];?>"/></td>
			<td><input type="text" name="organ_2" style="width: 300px" value="<?php print $rs['organ_2'];?>"/></td>
			</tr>
			<tr>
			<td align="center">3</td>
			<td><input type="text" name="fullname_3" style="width: 250px" value="<?php print $rs['fullname_3'];?>"/></td>
			<td><input type="text" name="organ_3" style="width: 300px" value="<?php print $rs['organ_3'];?>" /></td>
			</tr>
			
	</tbody>
		</table>
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


