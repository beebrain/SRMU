<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลรางวัลผลงานโครงการวิจัย  &nbsp;&nbsp;&nbsp;</strong></legend>
					
					<?php echo form_open('researchAwardMain/dataSearchRsearchAward/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ข้อมูลที่ต้องการค้นหา :
						<input type="search" name="search" class="email" autocomplete="off"/> 
	
						<button id="search" type="submit" name="bsave">ค้นหา</button><br>
							(สามารถสืบค้นข้อมูลได้จาก ชื่อรางวัลผลงานโครงการวิจัย  , ชื่อโครงการวิจัย,สาขาที่ได้รับรางวัล,ชื่อการประชุมทางวิชาการ )
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลรางวัลผลงานโครงการวิจัย  &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>

			
	 <th width=250px;>ชื่อรางวัลผลงานโครงการวิจัย</th>
	 	<th >โครงการวิจัย</th>
			 <th width=100px;>รายละเอียด</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลรางวัลผลงานโครงการวิจัย'.'</td>';
				echo'</tr>';
				}else
				{
	
				foreach($query->result() as $row){
					
					$queryResearch=$this->researchModel->dataResearch($row->research_id);
					foreach($queryResearch->result() as $rowResearch)
						
					echo '<tr>';

					echo '<td>'.$row->researchAward_name.'</td>';
					echo '<td>'.$rowResearch->research_name_th.'</td>';
				
				
				echo '<td  align="center">'.anchor('researchAwardMain/dataDetailResearchAward/'.$row->researchAward_id,'ดูข้อมูล').'</td>';
				echo '</tr>';
	

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



