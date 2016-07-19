<?php 
$link_addDepartment= site_url() . 'department/addDepartment/'.$this->uri->segment(3).'/';

?>
<div id="main">
	<div class="full_w">
			<div class="align-left">
	
					<a id="add" class="button" href="<?php echo $link_addDepartment; ?>">เพิ่มข้อมูลภาควิชา </a>
			<div class="sep"></div>
					
				</div>
			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลภาควิชา &nbsp;&nbsp;&nbsp;</strong></legend>
					<?php echo form_open('department/dataSearchdepartment/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อภาควิชา :
						<input name="search" class="email"/> 
						<button id="search"  type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
				
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลภาควิชา &nbsp;&nbsp;&nbsp;</strong></legend>

		<table>
	
			
			<tr>
			 <th>ภาควิชา</th>
			 <th colspan="2">จัดการข้อมูล</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="2" align="center">'.'ไม่พบข้อมูลภาควิชา'.'</td>';
				echo'</tr>';
				}else
				{
			
				foreach($query->result() as $row){
				
				echo '<tr>';
		
				echo '<td align="center">'.$row->department_name.'</td>';
				echo '<td  align="right">'.anchor('department/editDepartment/'.$this->uri->segment(3).'/'.$row->department_id,'แก้ไข').'</td>';
				echo '<td  align="left">'.anchor('department/deleteDepartment/'.$this->uri->segment(3).'/'.$row->department_id,"ลบ",array("onclick"=>"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?');")).'</td>';;
				echo'</tr>';
;
				}
			}
			?>
			
	</tbody>
		</table>
		
    </fieldset>
    </br>

	</div>
		
</div>

