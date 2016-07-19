	<div id="main">
	<div class="full_w">


	<fieldset>
    <legend><strong>&nbsp;&nbsp;ข้อมูลผู้ใช้งานระบบ&nbsp;&nbsp;&nbsp;</strong></legend>
		<table>
			<tr>
			 <th>ประเภทผู้ใช้งาน</th>
			 <th>จำนวนผู้ใช้งาน</th>
			 <th>รายละเอียด</th>
			</tr> 
			<?php
				if($query->num_rows()==0){
				echo'<tr>';
				echo'<td colspan="3" align="center">'.'ไม่พบข้อมูลผู้ใช้งานระบบ'.'</td>';
			
				echo'</tr>';
				}else{
				echo '<tr>';
				echo '<td align="center">'.'เจ้าหน้าที่'.'</td>';
				echo '<td align="center">'.$query1->num_rows." คน".'</td>';
				echo '<td align="center">'.anchor("admin/dataAllstaff/".$this->uri->segment(3).'/',"ดูข้อมูล").'</td>';
				echo'</tr>';

				echo '<tr>';
				echo '<td align="center">'.'ผู้วิจัย'.'</td>';
				echo '<td align="center">'.$query2->num_rows." คน".'</td>';
				echo '<td align="center">'.anchor("admin/dataListresearcher/".$this->uri->segment(3).'/',"ดูข้อมูล").'</td>';
				echo'</tr>';
				}
			
			?>
		</table>
    </fieldset>

	</div>
		
</div>

