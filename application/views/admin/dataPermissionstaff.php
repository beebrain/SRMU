<div id="main">
	<div class="full_w">
				
				
			<fieldset>
			<legend><strong>&nbsp;&nbsp;ค้นหาข้อมูลเจ้าหน้าที่&nbsp;&nbsp;&nbsp;</strong></legend>
					<?php echo form_open('admin/dataSearchstaffPremission/'.$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อ - นามสกุล :
						<input name="search" class="email"/> 
						<button id="search"  type="submit" name="bsave">ค้นหา</button>
						</label>
				<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;กำหนดสิทธิ์การใช้งานเจ้าหน้าที่&nbsp;&nbsp;&nbsp;</strong></legend>

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
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลเจ้าหน้าที่'.'</td>';
				echo'</tr>';
				}else
				
				{

				foreach($query->result() as $row){
				echo '<tr>';
	
				if($row->title==1){
						echo '<td>'.'นาย'.$row->name_th." ".$row->surname_th.'</td>';
					}elseif ($row->title==2){
						echo '<td>'.'นาง'.$row->name_th." ".$row->surname_th.'</td>';
					}
					else{
						echo '<td>'.'นางสาว'.$row->name_th." ".$row->surname_th.'</td>';
					}
					if($row->status_user==0){
						echo '<td>ระงับสิทธิ์การใช้งานระบบ</td>';
					}else{
						echo '<td>อนุมัติสิทธิ์การใช้งานระบบ</td>';
					}
				echo '<td>'.anchor('admin/dataOnestaffpermission/'.$this->uri->segment(3).'/'.$row->user_id,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กำหนดสิทธิ์').'</td>';

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

