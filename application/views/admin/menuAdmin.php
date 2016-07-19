<body>
<div class="wrap">
	<div id="header">

 	<div id="top">


<?php 
$link_main = site_url() . 'main';
$link_index = site_url() . 'admin/index/'.$this->uri->segment(3);
$link_dataAlluser = site_url() . 'admin/dataAlluser/'.$this->uri->segment(3);
$link_dataAdmin = site_url() . 'admin/dataAdmin/'.$this->uri->segment(3);
$link_addStaff = site_url() . 'admin/addStaff/'.$this->uri->segment(3);
$link_editAdmin = site_url() . 'admin/edit_Admin/'.$this->uri->segment(3);
$link_editPass = site_url() . 'admin/edit_pass/'.$this->uri->segment(3);
$link_dataAllstaff = site_url() . 'admin/dataAllstaff/'.$this->uri->segment(3);
$link_dataPermissionstaff = site_url() . 'admin/dataPermissionstaff/'.$this->uri->segment(3);
$link_dataPermissionresearcher = site_url() . 'admin/dataPermissionresearcher/'.$this->uri->segment(3);

?> 
		</div>

	<div id="content">

				<div class="align-right">
				<div class="sep"></div>
				<?php
				$who=$this->whomodel->all();
				foreach($who->result() as $row){
				if ($row->user_id==$this->uri->segment(3)){
				echo '<p>'.'<FONT COLOR=#333335>>> </font>  <strong>คุณ'.$row->name_th.' '.$row->surname_th." ".'</strong>';
				if($row->user_type_id=='1'){
				echo '<b><FONT COLOR=#333335>[ สิทธิ์การใช้งาน : ผู้ดูแลระบบ ]</FONT></b></p>';
				}
				else if($row->user_type_id=='2')
				{
						echo '<b><FONT COLOR=#333335>[ สิทธิ์การใช้งาน : เจ้าหน้าที่ ]</FONT></b></p>';
				}
				else {
					echo '<b><FONT COLOR=#333335>[ สิทธิ์การใช้งาน : ผู้วิจัย ]</FONT></b></p>';
				}
				}
				}
				
			
			?>


				</div>
				<div class="sep"></div>
	<div id="sidebar">
				
				<div class="box">
				
				<div class="h_title" >&#8250; เกี่ยวกับผู้ใช้งาน </div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataAdmin; ?>">ข้อมูลเกี่ยวกับผู้ใช้งาน</a></li>
					<li class="b1"><a class="icon edit" href="<?php echo $link_editAdmin ?>">แก้ไขข้อมูลเกี่ยวกับผู้ใช้งาน</a></li>
					<li class="b1"><a class="icon edit" href="<?php echo $link_editPass ?>">แก้ไขข้อมูลรหัสผ่าน</a></li>
					<li class="b1"><a class="icon logout" onclick="javascript:return confirm('คุณต้องการออกจากระบบใช่หรือไม่?')" href="<?php echo  $link_main; ?>">ออกจากระบบการใช้งาน </a></li>
				</ul>
				</div>
			
			<div class="box">
				<div class="h_title">&#8250; ข้อมูลผู้ใช้งานระบบ</div>
				<ul id="home">
				<li class="b1"><a class="icon users" href="<?php echo $link_dataAlluser; ?>">ข้อมูลผู้ใช้งานระบบ</a></li>
					
				</ul>
			</div>
			
			<div class="box">
				<div class="h_title">&#8250; จัดการข้อมูลเจ้าหน้าที่</div>
				<ul id="home">
					<li class="b1"><a class="icon page" href="<?php echo $link_dataAllstaff; ?>">ข้อมูลเจ้าหน้าที่</a></li>
					<li class="b1"><a class="icon add_user" href="<?php echo $link_addStaff; ?>">เพิ่มข้อมูลเจ้าหน้าที่</a></li>
				</ul>
			</div>
			<div class="box">
				<div class="h_title">&#8250; จัดการสิทธิ์การใช้งานระบบ</div>
				<ul id="home">
					<li class="b1"><a class="icon block_users" href="<?php echo $link_dataPermissionstaff; ?>">กำหนดสิทธิ์การใช้งานเจ้าหน้าที่</a></li>
					<li class="b2"><a class="icon block_users" href="<?php echo $link_dataPermissionresearcher; ?>">กำหนดสิทธิ์การใช้งานผู้วิจัย</a></li>
				</ul>
			</div>

	</div>
