<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลผลงานสิทธิบัตร  &nbsp;&nbsp;&nbsp;</strong></legend>
					
					<?php echo form_open('sitiMain/datasearchsiti/'.$id=$this->uri->segment(3)); ?>	
					<label for="name" > ข้อมูลที่ต้องการค้นหา :
						<input type="search" name="search" class="email" autocomplete="off"/> 
	
						<button id="search" type="submit" name="bsave">ค้นหา</button><br>
							(สามารถสืบค้นข้อมูลได้จาก ชื่อผลงานสิทธิบัตร ,ชื่อโครงการวิจัย,เลขที่ทะเบียน  )
					</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลผลงานสิทธิบัตร  &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>
			 <th width=200px;>ชื่อผลงานสิทธิบัตร </th>
			<th>โครงการวิจัย</th>

			 <th width=100px;>รายละเอียด</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลผลงานสิทธิบัตร '.'</td>';
				echo'</tr>';
				}else
				{

				foreach($query->result() as $row){
					$queryResearch=$this->researchModel->dataResearch($row->research_id);
					foreach($queryResearch->result() as $rowResearch)
					echo '<tr>';


				echo '<td>'.$row->partent_name.'</td>';
				echo '<td>'.$rowResearch->research_name_th.'</td>';
				
				
				echo '<td  align="center">'.anchor('sitiMain/datadetailsiti/'.$row->partent_id,'ดูข้อมูล').'</td>';
				
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



