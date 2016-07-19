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
					                text: 'รายงานสรุปโครงการวิจัยแบ่งตามปีงบประมาณ'
					            },
					            xAxis: {
					                categories: [
									             "",
									<?php
									foreach($querybuggetYear->result() as $row){
										echo "'".$row->budget_year."'".",";
									}
									?>
					                ],
					                labels: {
					                    rotation: -10,
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
					                    text: 'จำนวนโครงการวิจัย'
					                }
					            },
					            legend: {
					                enabled: false
					            },
					            tooltip: {
					                formatter: function() {
					                    return '<b>'+ this.x +'</b><br/>'+
					                        'จำนวน: '+ Highcharts.numberFormat(this.y, 0)+' โครงการ';
					                }
					            },
					                series: [{
					                name: 'Visits',
					                data: [null,3,
					                			9,
					                			13,
					                			16,
					                			15,
					                			
					                   ],
					                   dataLabels: {
						                    enabled: true,
						                    rotation: -10,
						                    color: '#F07E01',
						                    align: 'right',
						                    x: -3,
						                    y: -20,
						                    formatter: function() {
						                        return this.y+' โครงการ';;
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