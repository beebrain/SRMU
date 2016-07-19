<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet"  href="<?php  print base_url(); ?>assets/css/style.css"/>
<link rel="stylesheet"  href="<?php  print base_url(); ?>assets/css/ui-lightness/jquery-ui-1.8.10.custom.css"/>

	<title>:: ระบบฐานข้อมูลสารสนเทศงานวิจัย ::</title>
 
      
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="assets/js/autocomplete.js"></script>  
<link rel="stylesheet"  href="<?php  print base_url(); ?>assets/css/navi.css"/>

<script type="text/javascript" src="<?php  print base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php  print base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>



<script type="text/javascript" src="<?php  print base_url(); ?>assets/js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
 <link rel="stylesheet" href="<?php  print base_url(); ?>assets/js/jquery-ui-1.11.4.custom/jquery-ui.css">

 <link rel="stylesheet" href="<?php  print base_url(); ?>assets/js/jquery.datetimepicker.css" > 
 <script type="text/javascript" src="<?php  print base_url(); ?>assets/js/jquery.datetimepicker.js"></script>  

	<script type="text/javascript">
	$(function(){
		$(".box .h_title").not(this).next("ul").hide("normal");
		$(".box .h_title").not(this).next("#home").show("normal");
		$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
	});
	
	</script>
	<script type="text/javascript">     
$(function(){  
  
    var thaiYear = function (ct) {  
        var leap=3;    
        var dayWeek=["พฤ.", "ศ.", "ส.", "อา.","จ.", "อ.", "พ."];    
        if(ct){    
            var yearL=new Date(ct).getFullYear()+543;    
            leap=(((yearL % 4 == 0) && (yearL % 100 != 0)) || (yearL % 400 == 0))?2:3;    
            if(leap==2){    
                dayWeek=["ศ.", "ส.", "อา.", "จ.","อ.", "พ.", "พฤ."];    
            }    
        }                
        this.setOptions({    
            i18n:{ th:{dayOfWeek:dayWeek}},dayOfWeekStart:leap,    
        })                  
    };      
      
    $("#datepicker-th").datetimepicker({  
        timepicker:false,  
        format:'Y-m-d',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000              
        lang:'th',  // แสดงภาษาไทย  
        onChangeMonth:thaiYear,            
        onShow:(thaiYear),                    
        yearOffset:0,   // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
        closeOnDateSelect:true,  
    });         
    $("#datepicker-th-2").datetimepicker({  
        timepicker:false,  
        format:'Y-m-d',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000              
        lang:'th',  // แสดงภาษาไทย  
        onChangeMonth:thaiYear,            
        onShow:thaiYear,                    
        yearOffset:0,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
        closeOnDateSelect:true,  
    });         
  
      
      
});  
</script> 
<?php  
 function thai_date($time){  
	   $thai_month_arr=array(  
	    "0"=>"",  
	    "1"=>"มกราคม",  
	    "2"=>"กุมภาพันธ์",  
	    "3"=>"มีนาคม",  
	    "4"=>"เมษายน",  
	    "5"=>"พฤษภาคม",  
	    "6"=>"มิถุนายน",   
	    "7"=>"กรกฎาคม",  
	    "8"=>"สิงหาคม",  
	    "9"=>"กันยายน",  
	    "10"=>"ตุลาคม",  
	    "11"=>"พฤศจิกายน",  
	    "12"=>"ธันวาคม"                    
	);   
    $thai_date_return= date("j",$time);  
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " ".(date("Y",$time)+543);   
    return $thai_date_return;  
}  
?> 

<script type="text/javascript">  
function isEnglishchar(str,obj){  
    var orgi_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890._-";  
    var str_length=str.length;  
    var str_length_end=str_length-1;  
    var isEnglish=true;  
    var Char_At="";  
    for(i=0;i<str_length;i++){  
        Char_At=str.charAt(i);  
        if(orgi_text.indexOf(Char_At)==-1){  
        	isEnglish=false;  
        }     
    }  
    if(str_length>=1){  
        if(isEnglish==false){ 
			alert("กรุณากรอกข้อมูลเป็นภาษาอังกฤษเท่านั้น");   
            obj.value=str.substr(0,str_length_end);  
        }  
    }  
    return isEnglish; 
}  
</script> 
<script language="javascript">  
		function IsNumeric(sText,obj)  
		{  
		    var ValidChars = "0123456789.";  
		   var IsNumber=true;  
		   var Char;  
		   for (i = 0; i < sText.length && IsNumber == true; i++)   
		      {   
		      Char = sText.charAt(i);   
		      if (ValidChars.indexOf(Char) == -1)   
		         {  
		         IsNumber = false;  
		         }  
		      }  
		        if(IsNumber==false){  
		            alert("กรุณากรอกข้อมูลจำนวนตัวเลข!");  
		            obj.value=sText.substr(0,sText.length-1);  
		        }  
		   }  
		</script>
		<script type="text/javascript">  
		function formatMoney(inum){ 
		    var s_inum=new String(inum);     
		    var num2=s_inum.split(".",s_inum);     
		    var l_inum=num2[0].length;     
		    var n_inum="";     
		    for(i=0;i<l_inum;i++){     
		        if(parseInt(l_inum-i)%3==0){     
		            if(i==0){     
		                n_inum+=s_inum.charAt(i);            
		            }else{     
		                n_inum+=","+s_inum.charAt(i);            
		            }        
		        }else{     
		            n_inum+=s_inum.charAt(i);     
		        }     
		    }     
		    if(num2[1]!=undefined){     
		        n_inum+="."+num2[1];     
		    }     
		    return n_inum;     
		}     
		</script>  
		<script type="text/javascript">
		$(function() {
    		$('#researcher_in_1').on('change', function(event) {
        	
        	document.getElementById("days").value = document.getElementById("researcher_in_1").value;
    		});
		});
</script>
		<script type="text/javascript">  
$(function(){  
      
    $("#addRow").click(function(){  
        // ส่วนของการ clone ข้อมูลด้วย jquery clone() ค่า true คือ  
        // การกำหนดให้ ไม่ต้องมีการ ดึงข้อมูลจากค่าเดิมมาใช้งาน  
        // รีเซ้ตเป็นค่าว่าง ถ้ามีข้อมูลอยู่แล้ว ทั้ง select หรือ input  
        $(".firstTr:eq(0)").clone(true)   
        .find("input").attr("value","").end()  
        .find("select").attr("value","").end()  
        .appendTo($("#myTbl"));  
    });  
    $("#removeRow").click(function(){  
        // // ส่วนสำหรับการลบ  
        if($("#myTbl tr").size()>1){ // จะลบรายการได้ อย่างน้อย ต้องมี 1 รายการ  
            $("#myTbl tr:last").remove(); // ลบรายการสุดท้าย  
        }else{  
            // เหลือ 1 รายการลบไม่ได้  
            alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");  
        }  
    });   
      
  
});  
</script>  
  
</head>
