<body>

<div class="wrap">
	
 <div id="header">

 	<div id="top">

<?php 
$link_main = site_url() . 'main';
$link_dataResearcher = site_url() . 'researcher/index/'.$this->uri->segment(3);
$link_editResearcher = site_url() . 'researcher/editResearcher/'.$this->uri->segment(3);
$link_dataResearch = site_url() . 'research/dataResearch/'.$this->uri->segment(3);
$link_addResearch = site_url() . 'research/addResearch/'.$this->uri->segment(3);
$link_addResearchGroup = site_url() . 'research/addResearchGroup/'.$this->uri->segment(3);
$link_dataResearchAward = site_url() . 'researchAward/dataResearchAward/'.$this->uri->segment(3);
$link_addResearchAward = site_url() . 'researchAward/addResearchAward/'.$this->uri->segment(3);
$link_dataResearcherAward = site_url() . 'researcherAward/dataResearcherAward/'.$this->uri->segment(3);
$link_addResearcherAward = site_url() . 'researcherAward/addResearcherAward/'.$this->uri->segment(3);
$link_addPresentation = site_url() . 'presentation/addPresentation/'.$this->uri->segment(3);
$link_dataPresentation = site_url() . 'presentation/dataPresentation/'.$this->uri->segment(3);
$link_addPublication= site_url() . 'publication/addPublication/'.$this->uri->segment(3);
$link_dataPublication = site_url() . 'publication/dataPublication/'.$this->uri->segment(3);
$link_addPartent= site_url() . 'partent/addPartent/'.$this->uri->segment(3);
$link_dataPartent = site_url() . 'partent/dataPartent/'.$this->uri->segment(3);
$link_editPass = site_url() . 'researcher/editpass/'.$this->uri->segment(3);
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
					<li class="b1"><a class="icon report" href="<?php echo $link_dataResearcher?>">ข้อมูลเกี่ยวกับผู้ใช้งาน</a></li>
					<li class="b1"><a class="icon edit" href="<?php echo $link_editResearcher?>">แก้ไขข้อมูลเกี่ยวกับผู้ใช้งาน</a></li>
					<li class="b1"><a class="icon edit" href="<?php echo $link_editPass?>">แก้ไขข้อมูลรหัสผ่าน</a></li>
					<li class="b1"><a class="icon logout" onclick="javascript:return confirm('คุณต้องออกจากระบบใช่หรือไม่?')" href="<?php echo  $link_main; ?>">ออกจากระบบการใช้งาน </a></li>
				</ul>
				</div>

				<div class="box">
				<div class="h_title">&#8250; โครงการวิจัย</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataResearch?>">ข้อมูลโครงการวิจัย</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addResearch?>">เพิ่มข้อมูลโครงการวิจัยเดี่ยว</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addResearchGroup?>">เพิ่มข้อมูลชุดโครงการวิจัย </a></li>
				</ul>
				</div>
				
				
				
			
				<div class="box">
				<div class="h_title">&#8250; รางวัลผลงานผู้วิจัย</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataResearcherAward?>">ข้อมูลรางวัลผลงานผู้วิจัย</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addResearcherAward?>">เพิ่มข้อมูลรางวัลผลงานผู้วิจัย</a></li>
				</ul>
				</div>
			
				<div class="box">
				<div class="h_title">&#8250; รางวัลผลงานโครงการวิจัย</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataResearchAward?>">ข้อมูลรางวัลผลงานโครงการวิจัย</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addResearchAward?>">เพิ่มข้อมูลรางวัลผลงานโครงการวิจัย</a></li>
				</ul>
				</div>
			
				<div class="box">
				<div class="h_title">&#8250; ผลงานนำเสนอ</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataPresentation?>">ข้อมูลผลงานนำเสนอ</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addPresentation?>">เพิ่มข้อมูลผลงานนำเสนอ</a></li>
				</ul>
				</div>

				<div class="box">
				<div class="h_title">&#8250; ผลงานตีพิมพ์ทางวิชาการ</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataPublication?>">ข้อมูลผลงานตีพิมพ์</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addPublication?>">เพิ่มข้อมูลผลงานตีพิมพ์</a></li>
				</ul>
				</div>

				<div class="box">
				<div class="h_title">&#8250; ผลงานทรัพย์สินทางปัญญา</div>
				<ul id="home">
					<li class="b1"><a class="icon report" href="<?php echo $link_dataPartent?>">ข้อมูลผลงานทรัพย์สินทางปัญญา</a></li>
					<li class="b2"><a class="icon add_page" href="<?php echo $link_addPartent?>">เพิ่มข้อมูลผลงานทรัพย์สินทางปัญญา</a></li>
				</ul>
			</div>
		
		</div>