<?php
ob_start();
//session_start();
include_once "config.php";
?>
<html>
<head>
<title>ระบบติดตามค่า HI อำเภอแก้งสนามนาง</title>
<meta charset="utf-8" />

<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.9.1.custom.css" />
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.1.custom.js"></script>




<script type="text/javascript">
$(function(){
var dateBefore=null;
$("#dateInput").datepicker({inline:true ,
dateFormat: 'dd-mm-yy',
showOn: 'button',
buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',
buttonImageOnly: true,
dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
changeMonth: true,
changeYear: true ,
beforeShow:function(){
if($(this).val()!=""){
var arrayDate=$(this).val().split("-");
arrayDate[2]=parseInt(arrayDate[2])-543;
$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
}
setTimeout(function(){
$.each($(".ui-datepicker-year option"),function(j,k){
var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
$(".ui-datepicker-year option").eq(j).text(textYear);
});
},50);
},
onChangeMonthYear: function(){
setTimeout(function(){
$.each($(".ui-datepicker-year option"),function(j,k){
var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
$(".ui-datepicker-year option").eq(j).text(textYear);
});
},50);
},
onClose:function(){
if($(this).val()!="" && $(this).val()==dateBefore){
var arrayDate=dateBefore.split("-");
arrayDate[2]=parseInt(arrayDate[2])+543;
$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
}
},
onSelect: function(dateText, inst){
dateBefore=$(this).val();
var arrayDate=dateText.split("-");
arrayDate[2]=parseInt(arrayDate[2]);
$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
}
});
});
</script>
</head>
<div class="navbar" >
<div class="container fluid">
<a class="navbar-brand" href="#">HI Report</a>
<ul class="nav navbar-nav">
<li color: #999; class="active"><a href="index.php">Home</a></li>
<li><a href="login.php">บันทึกข้อมูล</a></li>
<li><a href="reportvill.php??Hi_villcode=''">รายงาน</a></li>
</ul>
</div>
<div>
<a class="navbar-brand" href="#">ระบบติดตามการควบคุมลูกน้ำยุงลาย อำเภอแก้งสนามนาง</a>
</div>
</div>
