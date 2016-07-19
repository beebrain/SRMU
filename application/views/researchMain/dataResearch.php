<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลโครงการวิจัย&nbsp;&nbsp;&nbsp;</strong></legend>
					
					<?php echo form_open('researchMain/datasearchResearch/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ข้อมูลที่ต้องการค้นหา :
						<input type="search" name="search" class="email" autocomplete="off"/> 
	
						<button id="search" type="submit" name="bsave">ค้นหา</button><br>
							(สามารถสืบค้นข้อมูลได้จาก ชื่อโครงการวิจัยไทย/อังกฤษ  ,ปีงบประมาณ  ,และชื่อแหล่งทุนวิจัย )
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
				</br>		
	<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลโครงการวิจัย &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>
			<th>ปีงบประมาณ</th>
			 <th>ชื่อโครงการวิจัย</th>
 			<th width=200px;>ผู้วิจัย</th>
			 <th width=auto;>รายละเอียด</th>
			</tr>
			<tbody>
			<?php
				
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="4" align="center">'.'ไม่พบข้อมูลโครงการวิจัย'.'</td>';
				echo'</tr>';
				}else
				{
				
				foreach($query->result() as $row){
				
				$queryPosition=$this->researchModel->positionRe($row->user_id);
				foreach($queryPosition->result() as $rowPos)
					
				echo '<tr>';
				echo '<td  align="center">'.$row->budget_year.'</td>';
				echo '<td>'.$row->research_name_th.'</td>';

				echo '<td >'.$rowPos->position_name.$rowPos->name_th." ".$rowPos->surname_th.'</td>';

				echo '<td  align="center">'.anchor('researchMain/dataDetailResearch/'.$row->research_id.'/'.$row->user_id,'ดูข้อมูล').'</td>';
				
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

