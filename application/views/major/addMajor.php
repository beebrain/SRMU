<?php 
$link_datamajor= site_url() . 'major/datamajor/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"> <a id="add">เพิ่มข้อมูลหลักสูตร</a> </div>
	


		<?php echo form_open('major/savenew_Major/'.$this->uri->segment(3)); ?>
						<div class="element">
						<label for="comments">ชื่อภาควิชา  :
						<select name="department_value">
						<?php
							if($queryDepartment->num_rows()==0){	
							echo '<option value="ไม่พบข้อมูลภาควิชา"</option>';
				}else{
							echo '<option value="">-- กรุณาเลือกข้อมูลภาควิชา --</option>';
							foreach($queryDepartment->result() as $row){
								echo '<option value='.$row->department_id.'>'.$row->department_name.'</option>';
							}
							}
							?>
						</select>
						
					</label>
					<?php echo form_error('department_value'); ?>
					</div>
					<div class="element">
						<label>ชื่อหลักสูตร : </label>
						<input type="text"name="major_name_value" class="text err" placeholder="กรุณากรอกข้อมูลชื่อหลักสูตร " />
						<?php echo form_error('major_name_value'); ?>
					</div>
					
					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_datamajor; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


