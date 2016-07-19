<?php 
$link_addFund= site_url() . 'fund/addFund/'.$this->uri->segment(3).'/';
?>
<div id="main">
	<div class="full_w">
	<div class="align-left">
	
				<a id="add" class="button" href="<?php echo $link_addFund; ?>">เพิ่มข้อมูลแหล่งทุนวิจัย</a>
				<div class="sep"></div>
				</div>
  <fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลแหล่งทุนวิจัย &nbsp;&nbsp;&nbsp;</strong></legend>
					<?php echo form_open('fund/dataSearchFund/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อแหล่งทุนวิจัย :
						<input name="search" class="email"/> 
						<button id="search"  type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			
								
								<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลแหล่งทุนวิจัย  &nbsp;&nbsp;&nbsp;</strong></legend>

		<table>
	
			
			<tr>

			 <th width=120px;>ประเภทแหล่งทุน</th>
			 <th>ชื่อแหล่งทุนวิจัย</th>
			 <th colspan="2">จัดการข้อมูล</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan=3" align="center">'.'ไม่พบข้อมูลแหล่งทุนวิจัย'.'</td>';
				echo'</tr>';
				}else
				{
		
				foreach($query->result() as $row){
				
				echo '<tr>';
			
				if($row->fund_type=='1'){
					echo '<td align="center">'.'ทุนวิจัยภายนอก '.'</td>';
				}else {
					echo '<td align="center">'.'ทุนวิจัยภายใน'.'</td>';
				}
		
				echo '<td  align="center">'.$row->fund_name.'</td>';
				echo '<td  align="right">'.anchor('fund/editFund/'.$this->uri->segment(3).'/'.$row->fund_id,'แก้ไข').'</td>';
				echo '<td  align="left">'.anchor('fund/deleteFund/'.$this->uri->segment(3).'/'.$row->fund_id,"ลบ",array("onclick"=>"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?');")).'</td>';
				echo'</tr>';
		
				}
			}
			?>
			
	</tbody>
		</table>
				<div class="sep"></div>		
					<?php print $this->pagination->create_links();?>
					<div class="sep"></div>	
    </fieldset>
	</br>


	</div>
		
</div>

