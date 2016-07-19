
<div id="main">
<div class="full_w">

		

			<?php
				foreach($query->result() as $row){
				
			}
			?>

			<fieldset>
   				 <legend><img src=<?php print base_url()?>assets/img/researcher-head.jpg /></legend>
			
			
 <br>
				<?php if ($row->photo){
						print '<img class="right"style="margin:25px;width:160px;height:190px;border:1px;" src="'.base_url('imgResearcher/'.$row->photo).'">';
					}else 
					{
						print '<img class="right"style="margin:25px;width:160px;height:190px;border:1px;" src="'.base_url('imgResearcher/noImg.jpg').'">';
					}
					?>

			<?php

				foreach($query->result() as $row){
				if($row->position_id != "" or $row->position_id != null){
					$queryPosition=$this->researchModel->positionRe($row->user_id);
					foreach($queryPosition->result() as $rowPos)
				
				echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'.$rowPos->position_name." ".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
				echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'.$rowPos->position_name_EN." ".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
				}else {
					if($row->title==1){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'."นาย ".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
						if ($row->name_en){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'."Mr.".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
						};
					}elseif ($row->title==2){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'."นาง".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
						if ($row->name_en){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'."Mrs.".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
						};
						}
					else{
						echo '<p>'.'<strong> ชื่อ - นามสกุล (TH) : </strong>'."นางสาว ".$row->name_th." ".$row->surname_th.'</p>'.'</br>';
						if ($row->name_en){
						echo '<p>'.'<strong> ชื่อ - นามสกุล (EN) : </strong>'."Ms.".ucwords($row->name_en)." ".ucwords($row->surname_en).'</p>'.'</br>';
						};
						}
				}
				
				echo '<p>'.'<strong> หลักสูตร : </strong>'.$row->major_name.'</p>'.'</br>';
				echo '<p>'.'<strong> ภาควิชา : </strong>'.$row->department_name.'</p>'.'</br>';
				
				echo '<p>'.'<strong> E-mail : </strong>'.$row->email.'</p>'.'</br>';
				
				}
				
			?>
			
			</fieldset>
		<br>
		<fieldset>
   				 <legend><img src=<?php print base_url()?>assets/img/research-head.jpg /></legend>
<br>
			<?php
				if($queryResearch->num_rows()==0){	
					echo'<p  >'.'<strong> หัวหน้าโครงการวิจัย </strong>'.'</p>'.'<br>';
				echo'<p>'.'ไม่พบข้อมูลโครงการวิจัย'.'</p>';

				}else
				{
				$no=1;
				echo'<p  >'.'<strong> หัวหน้าโครงการวิจัย </strong>'.'</p>'.'<br>';
				foreach($queryResearch->result() as $row){

				echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.anchor('researchMain/dataDetailResearch/'.$row->research_id.'/'.$row->user_id, $row->research_name_th).'<p>';
				echo '<div class="sep"></div>	';
				$no++;
				}
			}
			?>
			
<br>
<?php
				if($partner_in_research->num_rows()==0){	
					echo'<p >'.'<strong> ร่วมดำเนินโครงการวิจัย  </strong>'.'</p>'.'<br>';
				echo'<p>'.'ไม่พบข้อมูลโครงการวิจัย'.'</p>';

				}else
				{
				$no=1;
				echo'<p >'.'<strong> ร่วมดำเนินโครงการวิจัย  </strong>'.'</p>'.'<br>';
				foreach($partner_in_research->result() as $rowPartin){
					$partIN=$this->researchModel->dataResearch($rowPartin->research_id);
					foreach($partIN->result() as $IN)

				echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.anchor('researchMain/dataDetailResearch/'.$rowPartin->research_id.'/'.$rowPartin->user_id, $IN->research_name_th).'<p>';
				echo '<div class="sep"></div>	';
				$no++;
				}
			}
			?>
			<br>
			</fieldset>
			
			<br>
		<fieldset>
   				 <legend><img src=<?php print base_url()?>assets/img/researcherAward-head.jpg /></legend>
			
			<?php
				if($queryAward->num_rows()==0){	

				echo'<p>'.'ไม่พบข้อมูลรางวัลผลงานผู้วิจัย '.'</p>';

				}else
				{
			
				$no=1;
				
				foreach($queryAward->result() as $row){
	
				echo '<p>'.$no.".".'&nbsp&nbsp&nbsp'.anchor('researcherAwardMain/dataDetailResearcherAward/'.$row->researcherAward_id.'/'.$row->user_id, $row->researcherAward_name).'<p>';
				echo '<div class="sep"></div>	';
				$no++;
				}
			}
			?>
<br>
			</fieldset>
	</div>
		
</div>

