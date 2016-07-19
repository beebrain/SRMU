<?php 
$link_dataInstitution= site_url() . 'institution/dataInstitution/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title">:: แก้ไขข้อมูลสถาบันการศึกษา ::</div>
	


		<?php
			print form_open("institution/update_Institution/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
	
					<div class="element">
						<label>ชื่อสถาบันการศึกษา : </label>
						<input type="text"name="institution_value" class="text err"  value="<?php print $rs['institution_name'];?>"/>

					</div>

					<div class="entry">
						<button  type="submit" name="bsave">บันทึกข้อมูล</button><a class="button" href="<?php echo $link_dataInstitution; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


