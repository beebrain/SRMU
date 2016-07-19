<div id="main">
	<div class="full_w">
 
	<fieldset>
			<legend><strong>&nbsp;&nbsp;ค้นหาข้อมูลผู้วิจัย&nbsp;&nbsp;&nbsp;</strong></legend>
						<?php echo form_open('researcherMain/dataSearchresearcher/'.$this->uri->segment(3)); ?>	
					
						<label for="name" > ข้อมูลที่ต้องการค้นหา :
						<input type="search" name="search" size=40 autocomplete="off"/> 
	
						<button id="search" type="submit" name="bsave">ค้นหา</button><br>
							(สามารถสืบค้นข้อมูลได้จาก ชื่อ-นามสกุล ผู้วิจัยไทย/อังกฤษ  , หลักสูตร , ภาควิชา)
						</label>
				<?php echo $this->session->flashdata('msgSearch'); ?> 
					<?php print form_close();?>
				
				</fieldset>
				</br>   				 <?php echo $this->session->flashdata('msg'); ?> 
			<fieldset>
   				 <legend><strong>&nbsp;&nbsp;ข้อมูลผู้วิจัย&nbsp;&nbsp;&nbsp;</strong></legend>

		<table>
		
			<tr>

			<th width=auto; align="right">รูปถ่ายผู้วิจัย</th>
			 <th width=300px;>ชื่อ - นามสกุล</th>

			 <th width=100px;>รายละเอียด</th>
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
			
				echo '<tr>';
	
				if ($row->photo){
					print '<td><img class="right"style="margin:10px;width:100px;height:130px;border:1px;" src="'.base_url('imgResearcher/'.$row->photo).'"></td>';
				}else
				{
					print '<td><img class="right"style="margin:10px;width:100px;height:130px;border:1px;" src="'.base_url('imgResearcher/noImg.jpg').'"><td>';
				}
			
				if($row->position_id != "" or $row->position_id != null){
					echo '<td>';
					$queryPosition=$this->researchModel->positionRe($row->user_id);
					foreach($queryPosition->result() as $rowPos)
					echo $rowPos->position_name." " . $row->name_th." ".$row->surname_th.'<br>'.$rowPos->position_name_EN." ".ucwords($row->name_en)." ".ucwords($row->surname_en);
					echo '</td>';
				}else{
					if($row->title==1){
						echo 'นาย'.$row->name_th." ".$row->surname_th;
					}elseif ($row->title==2){
						echo 'นาง'.$row->name_th." ".$row->surname_th;
					}
					else{
						echo 'นางสาว'.$row->name_th." ".$row->surname_th;
					}
				}
			
				
				echo '<td>'.anchor('researcherMain/dataDetailResearcher/'.$row->user_id,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ดูข้อมูล').'</td>';
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

