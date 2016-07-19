<?php 
$link_dataMajor= site_url() . 'major/dataMajor/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"> <a id="edit">แก้ไขข้อมูลหลักสูตร</a></div>
	


		<?php
			print form_open("major/update_Major/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
				
						<div class="element">
						<label for="comments">ชื่อภาควิชา  :
						<select name="department_value">
						<?php
							if($queryDepartment->num_rows()==0){	
							echo '<option value="ไม่พบข้อมูลภาควิชา"</option>';
				}else{
							foreach($queryDepartment->result() as $row){
							echo '<option value='.$row->department_id.'>'.$row->department_name.'</option>';
								if ($row->fund_id==$rs['department_id'])
								{
									echo '<option value='.".$row->department_id.". ' selected="selected" >'.$row->department_name;
								}
							}
							}
							?>
						</select>
						
					</label>
						
					</div>
					<div class="element">
						<label>ชื่อหลักสูตร: </label>
						<input type="text"name="major_name_value" class="text" value="<?php print $rs['major_name'];?>"/>

					</div>

					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataMajor; ?>">ยกเลิก</a>
					</div>
			
					
			
				<?php print form_close();?>

	</div>
		
</div>



