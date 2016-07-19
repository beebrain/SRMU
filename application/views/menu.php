
<div class="wrap">
	
 <div id="header">

 	<div id="top">


<?php 
$link_login = site_url() . 'login';
$link_main = site_url() . 'main';
$link_report = site_url() . 'report';
$link_listNews= site_url() . 'newsMain/dataNews';
$link_listMOU= site_url() . 'mouMain/dataMou';
$link_listResearch= site_url() . 'researchMain/dataResearch';
$link_listResearcher= site_url() . 'researcherMain/dataResearcher';
$link_listResearcherAward= site_url() . 'researcherAwardMain/dataResearcherAward';
$link_listResearchAward= site_url() . 'researchAwardMain/dataResearchAward';
$link_listPresentation =  site_url() . 'presentationMain/dataPresentation';
$link_listPublication =  site_url() . 'publicationMain/datapublication';
$link_listSiti =  site_url() . 'sitiMain/datasiti';
$link_listAnuSiti =  site_url() . 'anusitiMain/dataanusiti';
$link_listLikasit =  site_url() . 'likasitMain/datalikasit';

?> 



		</div>

			<div id="nav" class="left">
			<ul>
				<li class="upp"><a href="<?php echo $link_main; ?>">หน้าหลัก</a></li>
				<li class="upp"><a href="<?php echo $link_listResearch; ?>">โครงการวิจัย</a></li>
				<li class="upp"><a href="<?php echo $link_listResearcher; ?>">ผู้วิจัย</a></li>
				<li class="upp"><a href="<?php echo $link_listNews; ?>">ข่าวสารและการประชาสัมพันธ์</a></li>
				<li class="upp"><a href="<?php echo $link_listMOU; ?>">ความร่วมมือด้านการวิจัย</a></li>
				<li class="upp"><a href="<?php echo $link_report; ?>">รายงานสารสนเทศ</a>
					
				</li>
			</ul>

	</div>
		
	<div id="content">

		<div id="sidebar">
		<div class="fieldset">
			<a  href="<?php echo $link_login; ?>"><img src=<?php print base_url()?>assets/img/login_menu.jpg /></a>
				
			</div>
			<div class="sep"></div>
			
			<div class="box">
				<div class="h_title" id="arrows">&nbsp&nbsp&nbspผลงานผู้วิจัย | โครงการวิจัย</div>
				<ul id="home">
					<p><li class="b1"><a id="arrow" href="<?php echo $link_listResearcherAward; ?>">รางวัลผลงานผู้วิจัย</a></li></p>
					<li class="b1"><a id="arrow"  href="<?php echo $link_listResearchAward; ?>">รางวัลผลงานโครงการวิจัย</a></li>

				</ul>
			</div>
			<div class="sep"></div>
			<div class="box">
				<div class="h_title" id="arrows" >&nbsp&nbsp&nbspผลงานนำเสนอ  | ตีพิมพ์</div>
				<ul id="home">
					<p><li class="b1"><a id="arrow" href="<?php echo $link_listPresentation; ?>" >ผลงานนำเสนอ</a></li></p>
					<li class="b1"><a id="arrow" href="<?php echo $link_listPublication; ?>">ผลงานตีพิมพ์ทางวิชาการ  </a></li>

				</ul>
			</div>
			<div class="sep"></div>

			
			<div class="box">
				<div class="h_title" id="arrows">&nbsp&nbsp&nbspผลงานทรัพย์สินทางปัญญา</div>
				<ul id="home">
					<p><li class="b1"><a id="arrow" href="<?php echo $link_listSiti; ?>">ผลงานสิทธิบัตร</a></li></p>
					<li class="b1"><a id="arrow" href="<?php echo $link_listAnuSiti; ?>">ผลงานอนุสิทธิบัตร</a></li>
					<li class="b1"><a id="arrow" href="<?php echo $link_listLikasit; ?>">ผลงานลิขสิทธิ์</a></li>
				</ul>
			</div>
			<div class="sep"></div>
			<div class="box">
				<div class="h_title" id="arrows">&nbsp&nbsp&nbspเชื่อมโยงเว็บไซต์ที่เกี่ยวข้อง</div>
				<ul id="home">
					<li class="b1"><a href="http://www.cheqa.mua.go.th/"><img src=<?php print base_url()?>assets/img/1_link.jpg width="100px" height="30px" /></a>&nbsp&nbsp<a href="http://tdc.thailis.or.th/tdc//basic.php" ><img src=<?php print base_url()?>assets/img/2_link.jpg width="100px" height="30px" /></a></li>
					<li class="b1"><a href="http://www.uniserv.cmu.ac.th/" ><img src=<?php print base_url()?>assets/img/3_link.jpg width="100px" height="30px" /></a>&nbsp&nbsp<a href="https://www.gotoknow.org/home" ><img src=<?php print base_url()?>assets/img/4_link.jpg width="100px" height="30px" /></a></li>
					<li class="b1"><a href="http://www.irpus.or.th/" ><img src=<?php print base_url()?>assets/img/5_link.jpg width="100px" height="30px" /></a>&nbsp&nbsp<a href="http://www.job.mua.go.th/codes/index.php" ><img src=<?php print base_url()?>assets/img/7_link.jpg width="100px" height="30px" /></a></li>
					<li class="b1"><a href="http://www.mua.go.th/" ><img src=<?php print base_url()?>assets/img/8_link.jpg width="100px" height="30px" /></a>&nbsp&nbsp<a href="http://www.mua.go.th/users/tqf-hed/" ><img src=<?php print base_url()?>assets/img/9_link.jpg width="100px" height="30px" /></a></li>
					<li class="b1"><a href="http://www.trf.or.th/" ><img src=<?php print base_url()?>assets/img/10_link.jpg width="100px" height="30px" /></a>&nbsp&nbsp<a href="http://www.nrct.go.th/th/landing/sirindhorn.html" ><img src=<?php print base_url()?>assets/img/11_link.jpg width="100px" height="30px" /></a></li>
				</ul>
			</div>
	


	</div>
	
</div>
	
	<div id="content">		