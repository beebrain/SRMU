<div id="main">
	<div class="full_w">
	<fieldset>
			<legend><strong>&nbsp;&nbsp;ค้นหาข้อมูลผู้วิจัย&nbsp;&nbsp;&nbsp;</strong></legend>
						<?php echo form_open('admin/dataSearchresearcher/'.$this->uri->segment(3)); ?>
					
						<label for="name" > ชื่อ - นามสกุล :
						<input name="search" class="email"/> 
						<button id="search"  type="submit" name="bsave">ค้นหา</button>
						</label>
				<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
				</br>
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลผู้วิจัย&nbsp;&nbsp;&nbsp;</strong></legend>
		<table>
		
			<tr>
			 <th>ชื่อเข้าใช้</th>
			 <th>ประเภทผู้ใช้</th>
			 <th>ชื่อ - นามสกุล </th>
			 <th>รายละเอียด</th>
			</tr>
			<tbody>
			<?php

				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="4" align="center">'.'ไม่พบข้อมูลผู้วิจัย'.'</td>';
				echo'</tr>';
				}else
				{
				foreach($query->result() as $row){
					$queryPosition=$this->researchModel->positionRe($row->user_id);
					foreach($queryPosition->result() as $rowPos)
				echo '<tr>';
			
				echo '<td align="center"> '.$row->username.'</td>';
				if($row->user_type_id=='1'){
					echo '<td align="center">'.'ผู้ดูแลระบบ'.'</td>';
				}
				else if($row->user_type_id=='2')
				{
					echo '<td align="center">'.'เจ้าหน้าที่'.'</td>';
				}
				else {
					echo '<td align="center">'.'ผู้วิจัย'.'</td>';
				}
				if($row->position_id != 0){
				echo '<td>'.$rowPos->position_name.$row->name_th." ".$row->surname_th.'</td>';
				
				}else{
					if($row->title==1){
						echo '<td >'.'นาย'.$row->name_th." ".$row->surname_th.'</td>';
					}elseif ($row->title==2){
						echo '<td >'.'นาง'.$row->name_th." ".$row->surname_th.'</td>';
					}
					else{
						echo '<td >'.'นางสาว'.$row->name_th." ".$row->surname_th.'</td>';
					}
				}
				echo '<td>'.anchor('admin/dataOneresearcher/'.$this->uri->segment(3).'/'.$row->user_id,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ดูข้อมูล').'</td>';

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

