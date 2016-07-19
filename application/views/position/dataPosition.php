<?php 
$link_addPosition= site_url() . 'position/addPosition/'.$this->uri->segment(3).'/';
?>
<div id="main">
	<div class="full_w">
				<div class="align-left">
	
				<a id="add" class="button" href="<?php echo $link_addPosition; ?>">เพิ่มข้อมูลตำแหน่งทางวิชาการ </a>
			<div class="sep"></div>
					
				</div>
			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลตำแหน่งทางวิชาการ &nbsp;&nbsp;&nbsp;</strong></legend>
					<?php echo form_open('position/dataSearchposition/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > ชื่อตำแหน่งทางวิชาการ :
						<input name="search" class="email"/> 
						<button  id="search" type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
				</br>
		<?php echo $this->session->flashdata('msg'); ?> 

			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลตำแหน่งทางวิชาการ &nbsp;&nbsp;&nbsp;</strong></legend>

		<table>
	
			
			<tr>
			 <th>ตำแหน่งทางวิชาการ (TH)</th>
			 <th>ตำแหน่งทางวิชาการ (EN)</th>
			 <th colspan="2">จัดการข้อมูล</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลตำแหน่งทางวิชาการ'.'</td>';
				echo'</tr>';
				}else
				{
			
				foreach($query->result() as $row){
				
				echo '<tr>';

				echo '<td  align="center">'.$row->position_name.'</td>';
				echo '<td  align="center">'.$row->position_name_EN.'</td>';
				echo '<td  align="right">'.anchor('position/editPosition/'.$this->uri->segment(3).'/'.$row->position_id,'แก้ไข').'</td>';
				echo '<td  align="left">'.anchor('position/deletePosition/'.$this->uri->segment(3).'/'.$row->position_id,"ลบ",array("onclick"=>"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?');")).'</td>';;
				echo'</tr>';
	
				}
			}
			?>
			
	</tbody>
		</table>

					 
			
    </fieldset>
    </br>

	</div>
		
</div>

