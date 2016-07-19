<?php 
$link_dataFund= site_url() . 'fund/dataFund/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="add"> เพิ่มข้อมูลแหล่งทุนวิจัย </a></div>
	


		<?php echo form_open('fund/savenew_Fund/'.$this->uri->segment(3)); ?>
						<div class="element">
						<label for="comments">ประเภทแหล่งทุนวิจัย
						&nbsp;&nbsp;<input type="radio" name="fund_type_value" value="1" checked="checked" /> แหล่งทุนวิจัยภายนอก 
						&nbsp;&nbsp;<input type="radio" name="fund_type_value" value="2" /> แหล่งทุนวิจัยภายใน</label>
						</div>
	
					<div class="element">
						<label>ชื่อแหล่งทุนวิจัย : </label>
						<input type="text"name="fund_name_value" class="text err" placeholder="กรุณากรอกข้อมูลชื่อแหล่งทุนวิจัย  " />
						<?php echo form_error('fund_name_value'); ?>
					</div>

					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataFund; ?>">ยกเลิก</a>
					</div>
			
				<?php print form_close();?>

	</div>
		
</div>


