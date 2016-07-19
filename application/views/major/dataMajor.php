<?php 
$link_addMajor= site_url() . 'major/addMajor/'.$this->uri->segment(3).'/';
?>
<div id="main">
	<div class="full_w">
<div class="align-left">
	
					<a id="add" class="button" href="<?php echo $link_addMajor; ?>">เพิ่มข้อมูลหลักสูตร</a>
								<div class="sep"></div>
				</div>
  <fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลหลักสูตร &nbsp;&nbsp;&nbsp;</strong></legend>
					<?php echo form_open('major/dataSearchmajor/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อหลักสูตร :
						<input name="search" class="email"/> 
						<button id="search" type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			
								
								<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลหลักสูตร  &nbsp;&nbsp;&nbsp;</strong></legend>

		<table>
	
			
			<tr>

			 <th>ชื่อหลักสูตร</th>
			 <th>ชื่อภาควิชา</th>
			 <th colspan="2">จัดการข้อมูล</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan=3" align="center">'.'ไม่พบข้อมูลหลักสูตร'.'</td>';
				echo'</tr>';
				}else
				{

				foreach($query->result() as $row){
				
				echo '<tr>';
		
				echo '<td  align="center">'.$row->major_name.'</td>';
				echo '<td  align="center"> '.$row->department_name.'</td>';
				echo '<td  align="right">'.anchor('major/editMajor/'.$this->uri->segment(3).'/'.$row->major_id,'แก้ไข').'</td>';
				echo '<td  align="left">'.anchor('major/deleteMajor/'.$this->uri->segment(3).'/'.$row->major_id,"ลบ",array("onclick"=>"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?');")).'</td>';
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
	</br>
	

	</div>
		
</div>

