	<fieldset>
				
			
					<script type="text/javascript">
					$(function () {
					    var chart;
					    $(document).ready(function() {
					    Highcharts.setOptions({
					        colors: ['#32353q']
					    });
					        chart = new Highcharts.Chart({
					            chart: {
					                renderTo: 'container',

					                type: 'column',
					               
					                margin: [ 50, 30, 100, 60]
					            },
					            title: {
					                text: 'รายงานสรุปจำนวนผู้วิจัยแบ่งตามหลักสูตร'
					            },
					            xAxis: {
					                categories: ["",
					                <?php
									foreach($queryMajor->result() as $row){
										echo "'".$row->major_name."'".",";
									}
									?>
									
					                ],
					           labels: {
					                    rotation: -30,
					                    align: 'right',
					                    style: {
					                        fontSize: '12px',
					                        fontFamily: 'Tahoma, Verdana, sans-serif'
					                    }
					                }
					            },
					            yAxis: {
					                min: 0,
					                title: {
					                    text: 'จำนวนผู้วิจัย'
					                }
					            },
					            legend: {
					                enabled: false
					            },
					            tooltip: {
					                formatter: function() {
					                    return '<b>'+ this.x +'</b><br/>'+
					                        'จำนวน: '+ Highcharts.numberFormat(this.y, 0)+' คน';
					                }
					            },
					                series: [{
					                name: 'Visits',
					                data: [null,<?php $major1=$this->db->count_all("master_user where major_id=1");echo$major1;?>,
					                			<?php $major2=$this->db->count_all("master_user where major_id=2");echo$major2;?>,
					                			<?php $major3=$this->db->count_all("master_user where major_id=3");echo$major3;?>,
					                			<?php $major4=$this->db->count_all("master_user where major_id=4");echo$major4;?>,
					                			<?php $major5=$this->db->count_all("master_user where major_id=5");echo$major5;?>,
					                			<?php $major6=$this->db->count_all("master_user where major_id=6");echo$major6;?>,
					                			<?php $major7=$this->db->count_all("master_user where major_id=7");echo$major7;?>,
					                			<?php $major8=$this->db->count_all("master_user where major_id=8");echo$major8;?>,
					                			<?php $major9=$this->db->count_all("master_user where major_id=9");echo$major9;?>,
					                			<?php $major10=$this->db->count_all("master_user where major_id=10");echo$major10;?>,
					                			<?php $major11=$this->db->count_all("master_user where major_id=11");echo$major11;?>,
					                			<?php $major12=$this->db->count_all("master_user where major_id=12");echo$major12;?> 
					                   ],
					                dataLabels: {
					                    enabled: true,
					                    rotation: -10,
					                    color: '#F07E01',
					                    align: 'right',
					                    x: -3,
					                    y: -20,
					                    formatter: function() {
					                        return this.y+' คน';;
					                    },
					                    style: {
					                        fontSize: '14px',
					                        fontFamily: 'Verdana, sans-serif'
					                    }
					                }, 
					                pointWidth: 20
					            }]
					        });
					    });
					    
					});
										
					</script>

					<div id="container" style="min-width: 300px; height: 300px; margin: 0 auto"></div>
					<script src="<?php  print base_url(); ?>assets/js/highcharts.js"></script>
	</fieldset>