<?php 
$link_dataDepartment= site_url() . 'department/dataDepartment/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลภาควิชา </a></div>
	


		<?php
			print form_open("department/update_Department/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
	
					<div class="element">
						<label>ชื่อภาควิชา : </label>
						<input type="text"name="department_value" class="text"  value="<?php print $rs['department_name'];?>"/>

					</div>

					<div class="entry">
						<button  id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataDepartment; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


