
<div id="main">
	<div class="full_w">
				
				
			<fieldset>
			<legend><strong>&nbsp;&nbsp;ค้นหาข้อมูลผู้วิจัย&nbsp;&nbsp;&nbsp;</strong></legend>
					<?php echo form_open('admin/dataSearchResearcherPremission/'.$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อ - นามสกุล :
						<input name="search" class="email"/> 
						<button  id="search"  type="submit" name="bsave">ค้นหา</button>
						</label>
				<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;กำหนดสิทธิ์การใช้งานผู้วิจัย&nbsp;&nbsp;&nbsp;</strong></legend>

		<table>
		
			<tr>
			 <th>ชื่อ - นามสกุล </th>
			 <th>สถานะการใช้งานระบบ </th>
			 <th>กำหนดสิทธิ์</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลผู้วิจัย'.'</td>';
				echo'</tr>';
				}else
				{
		
				foreach($query->result() as $row){
					$queryPosition=$this->researchModel->positionRe($row->user_id);
					foreach($queryPosition->result() as $rowPos)
					
				echo '<tr>';
		

				print '<td>'.$rowPos->position_name.$row->name_th." ".$row->surname_th.'</td>';
					if($row->status_user==0){
						echo '<td>ระงับสิทธิ์การใช้งานระบบ</td>';
					}else{
						echo '<td>อนุมัติสิทธิ์การใช้งานระบบ</td>';
					}
				echo '<td>'.anchor('admin/dataOneresearcherpermission/'.$this->uri->segment(3).'/'.$row->user_id,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กำหนดสิทธิ์').'</td>';

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

