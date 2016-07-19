<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลรางวัลผลงานผู้วิจัย  &nbsp;&nbsp;&nbsp;</strong></legend>
					
					<?php echo form_open('researcherAward/dataResearcherAward/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อรางวัลผลงานผู้วิจัย :
						<input name="search" class="email"/> 
						<button id="search" type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลรางวัลผลงานผู้วิจัย  &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>
			<th>ลำดับ</th>
			 <th>ชื่อรางวัลผลงานผู้วิจัย</th>

			 <th width=100px;>รายละเอียด</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลรางวัลผลงานผู้วิจัย'.'</td>';
				echo'</tr>';
				}else
				{
				$no=$this->uri->segment(4)+1;
				foreach($query->result() as $row){
					echo '<tr>';
					print '<td align="center">'.$no.'</td>';
				echo '<td>'.$row->researcherAward_name.'</td>';
				
				
				echo '<td  align="center">'.anchor('researcherAward/dataDetail/'.$this->uri->segment(3).'/'.$row->researcherAward_id,'ดูข้อมูล').'</td>';
				
				echo'</tr>';
				$no++;
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


