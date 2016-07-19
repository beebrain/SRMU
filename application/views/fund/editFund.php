<?php 
$link_dataFund= site_url() . 'fund/dataFund/'.$this->uri->segment(3).'/';
?>
<div id="main">
		<div class="full_w">
	<div class="h_title"><a id="edit">แก้ไขข้อมูลแหล่งทุนวิจัย  </a> </div>
	


		<?php
			print form_open("fund/update_Fund/".$this->uri->segment(3).'/'.$id=$this->uri->segment(4));
		?>
					<div class="element">
						<label for="comments">ประเภทแหล่งทุนวิจัย
						<?php
						if(($rs['fund_type'])==1){
							echo '&nbsp;&nbsp;<input type="radio" name="fund_type_value" value="1" checked="checked" /> แหล่งทุนวิจัยภายนอก';
							echo '&nbsp;&nbsp;<input type="radio" name="fund_type_value" value="2" /> แหล่งทุนวิจัยภายใน';
									
						}else{
							echo '&nbsp;&nbsp;<input type="radio" name="fund_type_value" value="1"  /> แหล่งทุนวิจัยภายนอก';
							echo '&nbsp;&nbsp;<input type="radio" name="fund_type_value" value="2" checked="checked"/> แหล่งทุนวิจัยภายใน';
						}
						?></label>
						
						</div>
	
					<div class="element">
						<label>ชื่อแหล่งทุนวิจัย : </label>
						<input type="text"name="fund_name_value" class="text" value="<?php print $rs['fund_name'];?>"/>

					</div>

					<div class="entry">
						<button id="ok" type="submit" name="bsave">บันทึกข้อมูล</button><a id="cancel" class="button" href="<?php echo $link_dataFund; ?>">ยกเลิก</a>
					</div>
			
					
			
				<?php print form_close();?>

	</div>
		
</div>


