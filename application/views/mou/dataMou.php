<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp;ค้นหาข้อมูลความร่วมมือด้านการวิจัย &nbsp;&nbsp;&nbsp;</strong></legend>
					<?php echo form_open('mou/dataSearchmou/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อบันทึกความร่วมมือ :
						<input name="search" class="email"/> 
						<button id="search" type="submit" name="bsave">ค้นหา</button>
						</label>
				<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลความร่วมมือด้านการวิจัย &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>

			 <th>ชื่อบันทึกความร่วมมือด้านการวิจัย</th>
			 <th width=100px;>รายละเอียด</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="2" align="center">'.'ไม่พบข้อมูลความร่วมมือด้านการวิจัย'.'</td>';
				echo'</tr>';
				}else
				{
	
				foreach($query->result() as $row){
					echo '<tr>';

				echo '<td>'.$row->mou_name.'</td>';
				
				
				echo '<td  align="center">'.anchor('mou/dataDetail/'.$this->uri->segment(3).'/'.$row->mou_id,'ดูข้อมูล').'</td>';
				
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

	</div>
		
</div>

