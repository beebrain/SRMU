<?php 
$link_researcher_major = site_url() . 'report/researcher_major';
$link_researcher_department = site_url() . 'report/researcher_department';
$link_research_bugget = site_url() . 'report/research_bugget';
?>
	<div id="main">
		<div class="full_w">
<img src=<?php print base_url()?>assets/img/report-head.jpg />
				</br>
				<p>รายงานสารสนเทศงานวิจัย เป็นข้อมูลสารสนเทศที่ได้จากการจัดเก็บฐานข้อมูลสารสนเทศงานวิจัย 
				ภายในคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏอุตรดิตถ์ ซึ่งสามารถแบ่งเป็นข้อมูลสารสนเทศได้ดังนี้
				<div class="entry">
					<div class="sep"></div>
				</div>
						<ul>
						<li><a href="<?php echo $link_research_bugget; ?>">จำนวนโครงการวิจัยแบ่งตามปีงบประมาณ</a></li>
						<li><a href="<?php echo $link_researcher_department; ?>">จำนวนผู้วิจัยแบ่งตามภาควิชา</a></li>
						<li><a href="<?php echo $link_researcher_major; ?>">จำนวนผู้วิจัยแบ่งตามหลักสูตร</a></li>
					</ul>
		
				
				<div class="entry">
					<div class="sep"></div>
				</div>
				
		<br>
				<br>
			<?php $this->load->view('buggetYear');?>
		<br>
	<br>
               
                
			</div>
			</div>

			

