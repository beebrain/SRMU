<?php $this->load->view('header');?>
		<div class="entry">
					
				</div>
	<h1>แสดงข้อมูลผู้วิจัย</h1>
		<?php 
			print anchor("Researcher/ResearcherAdd","เพิ่มข้อมูลผู้วิจัย");
		?>
		<div class="sep"></div>
	<table border="1">
			<thead>
				<tr>
					<th>รหัสผู้วิจัย</th>
					<th>ตำแหน่งทางวิชาการ</th>
					<th>ชื่อ -นามสกุลผู้วิจัย </th>
		
					<th>หลักสูตร</th>
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
					print "<td>".$row->position_name."</td>";
					print "<td>".$row->researcher_name_th."&nbsp&nbsp&nbsp&nbsp".$row->researcher_sname_th."</td>";
					print "<td>".$row->major_name."</td>";
					print "<td align='center'>";
					
					print anchor("Researcher/ResearcherShow/".$row->researcher_id,"ดูข้อมูล")."&nbsp;";
					print anchor("Researcher/ResearcherEdit/".$row->researcher_id,"แก้ไข")."&nbsp;";
					print anchor("Researcher/ResearcherDel/".$row->researcher_id,"ลบ",array("onclick"=>"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?');"));
						
					print "</td>";
					print "</tr>";
				}
			}
			?>
			</tbody>
		</table>
</body>

</html>
<?php $this->load->view('footer');?>
	