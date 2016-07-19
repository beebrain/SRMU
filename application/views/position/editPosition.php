<?php 
$link_dataPosition= site_url() . 'position/dataPosition/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit"> แก้ไขข้อมูลตำแหน่งทางวิชาการ </a></div>
	


		<?php
			print form_open("position/update_Position/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
	
					<div class="element">
						<label>ชื่อตำแหน่งทางวิชาการ (TH) : </label>
						<input type="text" name="position_value" class="text err"  value="<?php print $rs['position_name'];?>"/>

					</div>
					<div class="element">
						<label>ชื่อตำแหน่งทางวิชาการ (EN): </label>
						<input type="text" name="position_value_EN" class="text"  value="<?php print $rs['position_name_EN'];?>"/>

					</div>

					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataPosition; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


