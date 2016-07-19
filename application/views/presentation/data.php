<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลผลงานนำเสนอในการประชุมวิชาการ &nbsp;&nbsp;&nbsp;</strong></legend>
					
					<?php echo form_open('presentation/datasearchPresentation/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อผลงานนำเสนอในการประชุมวิชาการ :
						<input name="search" class="email"/> 
						<button  id="search" type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลผลงานนำเสนอในการประชุมวิชาการ &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>
			<th>ลำดับที่</th>
			 <th>ชื่อผลงานนำเสนอในการประชุมวิชาการ</th>
			 <th>โครงการวิจัย</th>
			

			 <th width=100px;>รายละเอียด</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลผลงานนำเสนอในการประชุมวิชาการ'.'</td>';
				echo'</tr>';
				}else
				{
				$no=$this->uri->segment(4)+1;
				foreach($query->result() as $row){
					$queryResearch=$this->researchModel->dataResearch($row->research_id);
					foreach($queryResearch->result() as $rowResearch)
					echo '<tr>';
					print '<td align="center">'.$no.'</td>';
				echo '<td>'.$row->presentation_name.'</td>';
				echo '<td>'.$rowResearch->research_name_th.'</td>';
				
				
				echo '<td  align="center">'.anchor('presentation/dataDetail/'.$this->uri->segment(3).'/'.$row->presentation_id,'ดูข้อมูล').'</td>';
				
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



