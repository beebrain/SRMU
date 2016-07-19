<div id="main">
	<div class="full_w">

			<fieldset>
			<legend><strong>&nbsp;&nbsp; ค้นหาข้อมูลข่าวสารและการประชาสัมพันธ์ &nbsp;&nbsp;&nbsp;</strong></legend>
					
					<?php echo form_open('news/dataSearchnews/'.$id=$this->uri->segment(3)); ?>	
					
						<label for="name" > หัวข้อข่าวสาร :
						<input name="search" class="email"/> 
						<button  id="search" type="submit" name="bsave">ค้นหา</button>
						</label>
					<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
	</br>		<?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp; ข้อมูลข่าวสารและการประชาสัมพันธ์ &nbsp;&nbsp;&nbsp;</strong></legend>

		
		<table>
	
			
			<tr>
			
			<th width=120px;>วันที่ประกาศ</th>
			 <th>หัวข้อข่าวประชาสัมพันธ์</th>
			 <th width=120px;>การเผยแพร่</th>

			 <th width=100px;>รายละเอียด</th>
			</tr>
			<tbody>
			<?php
				if($query->num_rows()==0){	
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลข่าวสารและการประชาสัมพันธ์'.'</td>';
				echo'</tr>';
				}else
				{
				$no=$this->uri->segment(4)+1;
				foreach($query->result() as $row){
					echo '<tr>';
					
					
					print '<td align="center">'.thai_date(strtotime($row->news_date)).'</td>';
				echo '<td>'.$row->news_title.'</td>';
				if($row->status==1){
					echo '<td>'.'อนุมัติการเผยแพร่'.'</td>';
				}else{
					echo '<td>'.'ระงับการเผยแพร่'.'</td>';
				}
				
				echo '<td  align="center">'.anchor('news/dataDetail/'.$this->uri->segment(3).'/'.$row->news_id,'ดูข้อมูล').'</td>';
				
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

	</div>
		
</div>

