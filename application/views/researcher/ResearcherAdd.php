<?php
	print form_open();
?>

<form>
<fieldset style='width:auto;pading:auto;margin:auto;'>
		<legend>จัดการข้อมูลผู้วิจัย</legend>
		<table align='center' border='0'>
			
			<tr>
				<td align='right'>รหัสผู้วิจัย<span style="margin-left:3px;color:red;">*</span></td>
				<td><input type='text' name=''></td>
			</tr>	
			
			<tr>
				<td align='right'>คำนำหน้า<span style="margin-left:3px;color:red;">*</span></td>
				<td>
					<?php
					?>
				</td>

			</tr>	
			
			<tr>
				<td align='right'>ตำแหน่งทางวิชาการ<span style="margin-left:3px;color:red;">*</span></td>
				<td>
					<?php $result = $this->db->query("select * from ref_position")->result();
							foreach($result as $row)
								{
								$dataPosistion[$row->position_id] = $row->position_name;
								}
					echo form_dropdown('position_name',$dataPosistion);
					?>
				</td>
			</tr>			
			
			<tr>
				<td align='right'>ชื่อผู้วิจัย (TH)<span style="margin-left:3px;color:red;">*</span><td><input type='text' name=''>&nbsp;&nbsp;&nbsp;นามสกุล (TH)<span style="margin-left:3px;color:red;">*</span><input type='text' name=''></td>
			</tr>
			
			<tr>
				<td align='right'>ชื่อผู้วิจัย (EN)<span style="margin-left:3px;color:red;">*</span><td><input type='text' name=''>&nbsp;&nbsp;&nbsp;นามสกุล (EN)<span style="margin-left:3px;color:red;">*</span><input type='text' name=''></td>
			</tr>
			
			<tr>
				<td align='right'>หลักสูตร <span style="margin-left:3px;color:red;">*</span> </td>
				<td>
					<?php $result = $this->db->query("select * from ref_major")->result();
							foreach($result as $row)
								{
								$dataMajor[$row->major_id] = $row->major_name;
								}
					echo form_dropdown('major_name',$dataMajor);
					?>
				</td>
			</tr>		

			<tr>
				<td align='right'>ที่อยู่ที่สามารถติดต่อได้ :</td>
				<td>
					<textarea name='' style='height:75px;width:300px;'></textarea> 
				</td>
			</tr>			
			
			<tr>
				<td align='right'>E-mail :</td>
				<td><input type='text' name=''></td>
			</tr>	
			
			<tr>
				<td align='right'>เบอร์โทรศัพท์ :</td>
				<td><input type='text' name=''></td>
			</tr>	
			
			<tr>
				<td align='right'>รูปถ่ายผู้วิจัย :</td>
				<td>
					<input type='file' id='bFileName' name='bFileName'>
				</td>
			</tr>
			
	 <!-- Button Save-->

			<tr>
				<td colspan='4'  align='center'><input type='submit' value='บันทึกข้อมูลผู้วิจัย' id='btSave' style="font-size : 12pt">
				<?php  
					print anchor("researcher","ยกเลิก");
				?>
				</td>
			</tr>
			
		</table>
	</fieldset>
	</form>
<?php
	print form_close();
?>