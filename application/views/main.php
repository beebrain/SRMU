<script> 
$(document).ready(function(){
    	$("#news").hide();
       	$("#news").slideDown("slow");
        $("#mou").hide();
        $("#mou").slideDown("slow");
});
</script>
<div id="main">
	<div class="full_w">
<img src=<?php print base_url()?>assets/img/news-head_.jpg />
 <div id="news">
 <?php
				if($queryNews->num_rows()==0){	
				echo'<ul>';
				echo'<li>'.'ไม่พบข้อมูลข่าวสารและการประชาสัมพันธ์'.'</li>';
				echo'</ul>';
				}else
				{
				foreach($queryNews->result() as $row){
					echo '<ul>';
				echo '<p><li>'.anchor('newsMain/dataDetailNews/'.$row->news_id,$row->news_title).' : '.thai_date(strtotime($row->news_date)).'</li></p>';

				echo'</ul>';

				}
			}
			?>
			<?php echo'<p align="right">'.anchor('newsMain/dataNews/','อ่านข้อมูลข่าวสารทั้งหมด.....').'</p>'?>
</div>

<br>
  <img src=<?php print base_url()?>assets/img/mou-head_.jpg />
 <div id="mou">
<?php
				if($queryMOU->num_rows()==0){	
				echo'<ul>';
				echo'<li>'.'ไม่พบข้อมูลความร่วมมือด้านการวิจัย'.'</li>';
				echo'</ul>';
				}else
				{
				foreach($queryMOU->result() as $row){
					echo '<ul>';
				echo '<p><li>'.anchor('mouMain/dataDetailMou/'.$row->mou_id,$row->mou_name).'</li></p>';

				echo'</ul>';

				}
			}
			?>

<?php echo'<p align="right" >'.anchor('mouMain/dataMou/','อ่านข้อมูลความร่วมมือด้านการวิจัยทั้งหมด.....').'</p>'?>
</div>
</div>
		
</div>