<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลโครงการวิจัย&nbsp;&nbsp;&nbsp;</strong></legend>
					
					<?php echo form_open('research/datasearchResearch/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อโครงการวิจัย :
						<input type="search" name="search" class="email" autocomplete="off"/> 
						<button id="search" type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลโครงการวิจัย &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>
		
			 <th>ชื่อโครงการวิจัย</th>
 			 <th>ปีงบประมาณ</th>
			 <th width=80px;>รายละเอียด</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลโครงการวิจัย'.'</td>';
				echo'</tr>';
				}else
				{
			
				foreach($query->result() as $row){
				echo '<tr>';
				
				
				
				echo '<td>'.$row->research_name_th.'</td>';
				
				echo '<td  align="center">'.$row->budget_year.'</td>';
				echo '<td  align="center">'.anchor('research/dataDetail/'.$this->uri->segment(3).'/'.$row->research_id,'ดูข้อมูล').'</td>';
				
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

