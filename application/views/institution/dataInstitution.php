<?php 
$link_addInstitution= site_url() . 'institution/addInstitution/'.$this->uri->segment(3).'/';

?>
<div id="main">
	<div class="full_w">
				
			<fieldset>
			<legend><strong>&nbsp;&nbsp;:: ค้นหาข้อมูลสถาบันการศึกษา ::&nbsp;&nbsp;&nbsp;</strong></legend>
					<?php echo form_open('institution/dataSearchinstitution/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อสถาบันการศึกษา :
						<input name="search" class="email"/> 
						<button  type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
				
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;:: ข้อมูลสถาบันการศึกษา ::&nbsp;&nbsp;&nbsp;</strong></legend>

		<table>
	
			
			<tr>
			<th>ลำดับที่</th>
			 <th>สถาบันการศึกษา</th>
			 <th colspan="2">จัดการข้อมูล</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลสถาบันการศึกษา'.'</td>';
				echo'</tr>';
				}else
				{
				$no=$this->uri->segment(4)+1;
				foreach($query->result() as $row){
				echo '<tr>';
				print '<td align="center">'.$no.'</td>';
				echo '<td>'.$row->institution_name.'</td>';
				echo '<td  align="right">'.anchor('institution/editInstitution/'.$this->uri->segment(3).'/'.$row->institution_id,'แก้ไข').'</td>';
				echo '<td  align="left">'.anchor('institution/deleteInstitution/'.$this->uri->segment(3).'/'.$row->institution_id,"ลบ",array("onclick"=>"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?');")).'</td>';;
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
    </br>
<div class="align-left">
<div class="sep"></div>
					<a class="button" href="<?php echo $link_addInstitution; ?>">เพิ่มข้อมูลสถาบันการศึกษา </a>
			<div class="sep"></div>
					
				</div>
	</div>
		
</div>

