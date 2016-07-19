<body>

<div class="wrap">
	
 <div id="header">

 	<div id="top">

<?php 
$link_main = site_url() . 'main';
$link_dataStaff = site_url() . 'staff/dataStaff/'.$this->uri->segment(3);
$link_editpass = site_url() . 'staff/editpass/'.$this->uri->segment(3);
$link_editStaff = site_url() . 'staff/editStaff/'.$this->uri->segment(3);
$link_dataListresearcher = site_url() . 'staff/dataListresearcher/'.$this->uri->segment(3).'/';
$link_addResearcher = site_url() . 'staff/addResearcher/'.$this->uri->segment(3);
$link_dataPosition= site_url() . 'position/dataPosition/'.$this->uri->segment(3);
$link_dataMajor= site_url() . 'major/dataMajor/'.$this->uri->segment(3);
$link_dataDepartment= site_url() . 'department/dataDepartment/'.$this->uri->segment(3);
$link_dataFund= site_url() . 'fund/dataFund/'.$this->uri->segment(3);
//$link_dataInstitution= site_url() . 'institution/dataInstitution/'.$this->uri->segment(3);
$link_dataNews = site_url() . 'news/dataNews/'.$this->uri->segment(3);
$link_addNews = site_url() . 'news/addNews/'.$this->uri->segment(3);
$link_dataMOU = site_url() . 'mou/dataMOU/'.$this->uri->segment(3);
$link_addMOU = site_url() . 'mou/addMou/'.$this->uri->segment(3);
?> 

		</div>

	<div id="content">


				<div class="align-right">
				<div class="sep"></div>
				<?php
				$who=$this->whomodel->all();
				foreach($who->result() as $row){
				if ($row->user_id==$this->uri->segment(3)){
echo '<p>'.'<FONT COLOR=#333335>>> </font><strong>คุณ'.$row->name_th.' '.$row->surname_th." ".'</strong>';
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
				<div class="h_title" >&#8250; ข้อมูลเกี่ยวกับใช้งาน </div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataStaff; ?>">ข้อมูลเกี่ยวกับผู้ใช้งาน</a></li>
					<li class="b1"><a class="icon edit" href="<?php echo $link_editStaff; ?>">แก้ไขข้อมูลเกี่ยวกับผู้ใช้งาน</a></li>
					<li class="b1"><a class="icon edit" href="<?php echo $link_editpass; ?>">แก้ไขข้อมูลรหัสผ่าน</a></li>
					<li class="b1"><a class="icon logout" onclick="javascript:return confirm('คุณต้องออกจากระบบใช่หรือไม่?')" href="<?php echo  $link_main; ?>">ออกจากระบบการใช้งาน </a></li>
				</ul>
			</div>
			
			<div class="box">
				<div class="h_title">&#8250; จัดการข้อมูลผู้วิจัย</div>
				<ul id="home">
					<li class="b1"><a class="icon page" href="<?php echo $link_dataListresearcher; ?>">ข้อมูลผู้วิจัย</a></li>
					<li class="b2"><a class="icon add_user" href="<?php echo $link_addResearcher; ?>">เพิ่มข้อมูลผู้วิจัย</a></li>
				</ul>
			</div>

			<div class="box">
				<div class="h_title">&#8250; จัดการข้อมูลพื้นฐาน</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataPosition;?>">ข้อมูลตำแหน่งทางวิชาการ</a></li>
					<li class="b1"><a class="icon report" href="<?php echo $link_dataMajor;?>">ข้อมูลหลักสูตร</a></li>
					<li class="b2"><a class="icon report" href="<?php echo $link_dataDepartment;?>">ข้อมูลภาควิชา</a></li>
					<li class="b1"><a class="icon report" href="<?php echo $link_dataFund;?>">ข้อมูลแหล่งทุนวิจัย</a></li>
					
				</ul>
			</div>
			
			<div class="box">
				<div class="h_title">&#8250; ข่าวสารและการประชาสัมพันธ์</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataNews;?>">ข้อมูลข่าวสาร</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addNews;?>">เพิ่มข้อมูลข่าวสาร</a></li>
				</ul>
			</div>
			<div class="box">
				<div class="h_title">&#8250; ข้อมูลความร่วมมือด้านการวิจัย</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataMOU;?>">ข้อมูลความร่วมมือ</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addMOU;?>">เพิ่มข้อมูลความร่วมมือ</a></li>
				</ul>
			</div>
		
		</div>