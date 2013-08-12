<?php
ob_start();
//session_start();
include_once "header.php";
include_once "config.php";
?>
<html>
    <head>
        <title>ระบบติดตามค่า HI อำเภอแก้งสนามนาง</title>
        <meta charset="utf-8" />
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
   
      <div class="page" id="page-index">
    <div class="nav-bar  bg-color-green">
    <div class="nav-bar-inner padding10">
        <span class="pull-menu"></span>

        <a href="/"><span class="element brand">
            <img class="place-left" src="images/logo32.png" style="height: 20px"/>
           HI Data
        </span></a>

        <div class="divider"></div>

        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li data-role="dropdown">
                <a href="login.php">บันทึกข้อมูล</a>
                <ul class="dropdown-menu">
                    <li><a href="global.php">Global styles</a></li>
                    <li><a href="layout.php">Layouts and templates</a></li>
                    <li><a href="grid.php">Grid system</a></li>
                    <li class="divider"></li>
                    <li><a href="responsive.php">Responsive design</a>
                    </li>
                </ul>
            </li>
            <li data-role="dropdown"><a href="#">รายงาน</a>
                <ul class="dropdown-menu">
                    <li><a href="reportvill.php">ค่า Hi รายหมู่บ้าน</a></li>
                    
                    
                </ul>
            </li>
            

            <li><a href="https://github.com/olton/Metro-UI-CSS">Source</a></li>
        </ul>

    </div>
    
 
</div>

   

        