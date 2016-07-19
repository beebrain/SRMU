<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลรางวัลผลงานผู้วิจัย  &nbsp;&nbsp;&nbsp;</strong></legend>
					
					<?php echo form_open('researcherAwardMain/datasearchResearcherAward/'.$id=$this->uri->segment(3)); ?>	
					
							<label for="name" > ข้อมูลที่ต้องการค้นหา :
						<input type="search" name="search" class="email" autocomplete="off"/> 
	
						<button id="search" type="submit" name="bsave">ค้นหา</button><br>
							(สามารถสืบค้นข้อมูลได้จาก ชื่อรางวัลผลงานผู้วิจัย  ,สาขาที่ได้รับรางวัล ,ชื่อผู้วิจัยไทย/อังกฤษ)
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	<br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลรางวัลผลงานผู้วิจัย  &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>

			 <th>ชื่อรางวัลผลงานผู้วิจัย</th>
			<th>ผู้วิจัย</th>
			

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
				foreach($query->result() as $row){
		
					$queryPosition=$this->researchModel->positionRe($row->user_id);
					foreach($queryPosition->result() as $rowPos)
				echo '<tr>';
		
				echo '<td>'.$row->researcherAward_name.'</td>';
				echo '<td >'.$rowPos->position_name.$rowPos->name_th." ".$rowPos->surname_th.'</td>';
			
				
				
				echo '<td  align="center">'.anchor('researcherAwardMain/dataDetailResearcherAward/'.$row->researcherAward_id.'/'.$row->user_id,'ดูข้อมูล').'</td>';
				
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



