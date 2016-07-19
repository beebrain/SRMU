<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<h1>แสดงข้อมูลผู้วิจัย</h1>

	<table border="1">
			<thead>
				<tr>
					<th>รหัสผู้วิจัย</th>
					<th>ตำแหน่ง</th>
					<th>คำนำหน้า</th>
					<th>ชื่อผู้วิจัย</th>			
					<th>นามสกุลผู้วิจัย</th>	
					<th>name</th>	
					<th>surname</th>
					<th>ภาควิชา</th>
					<th>ที่อยู่</th>
					<th>email</th>
					<th>โทรศัพท์</th>
					<th>รูปภาพ</th>
					<th>สถานะผู้วิจัย</th>
					<th>user_id</th>
					<th>จัดการข้อมูล</th>
				</tr>
			</thead>

			<tbody>
			<?php 
			if(count($results)==0)
			{
				print "<tr><td colspan='13' align='center'>---- no data ----</td></tr>";
			}
			else
			{
				foreach ($results as $row)
				{
					print "<tr>";
					print "<td>".$row->researcher_id."</td>";
					print "<td>".$row->position_id."</td>";
					print "<td>".$row->title_id."</td>";
					print "<td>".$row->researcher_name_th."</td>";
					print "<td>".$row->researcher_sname_th."</td>";
					print "<td>".$row->researcher_name_en."</td>";
					print "<td>".$row->researcher_sname_en."</td>";
					print "<td>".$row->major_id."</td>";
					print "<td>".$row->researcher_address."</td>";
					print "<td>".$row->researcher_email."</td>";
					print "<td>".$row->researcher_tel."</td>";
					print "<td>".$row->researcher_photo."</td>";
					print "<td>".$row->researcher_status."</td>";
					print "<td>".$row->user_id."</td>";
					print "<td align='center'>";
					
									
					print anchor("researcher","กลับหน้าก");

						
					print "</td>";
					print "</tr>";
				}
			}
			?>
			</tbody>
		</table>
</body>

</html>
	