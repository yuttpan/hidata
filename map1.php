<?php
ob_start();
session_start();

//include_once "config.php";

           
                        include_once "menu.php"; 
?>

<html>
    <head>
        <style type="text/css">
html { height: 100% }
body { 
	height:100%;
	margin:0;padding:0;
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:800px;
	height:500px;
	margin:auto;
/*	margin-top:100px;*/
}
</style>
    </head>
    <body>
       
       <?php		 
$dbserver = 'localhost';
$dbuser = 'sa' ; 
$dbpass= "sa";
$dbname= 'hi';
error_reporting(E_ALL ^ E_NOTICE);
mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล
mysql_query("SET NAMES UTF8");
?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<style type="text/css">
html { height: 100% }
body { 
	height:100%;
	margin:0;padding:0;
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:100%;
	height:100%;
	margin:auto;
/*	margin-top:100px;*/
}
</style>
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="js/gmap3.js"></script> 
    <script type="text/javascript">
        $(function () {
            $('#map_canvas').gmap3({
                map: {
                    options: {
                        center: [15.7405, 102.2690],
                        zoom: 12,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControl: true,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                        },
                    }
                },
                marker: {
                    values: [
<?php
$sql = mysql_query("select * from village");
$num = mysql_num_rows($sql);
if ($num>0){
	while ($r=mysql_fetch_array($sql))	{
		++$i;
		$i != $num ? $k=',' : $k='';
?>
{latLng:[<?=$r[latitude]?>, <?=$r[longitude]?>], data:"<div class='font_map'> บ้าน <?=$r[village_name]?> หมู่ <?=$r[village_moo]?> ตำบล <?=$r[village_code]?><br />ค่า HI  <?=$r[village_id]?></div>", options:{icon: "img/mosq.png"}}<?=$k?>
<?php
	}
}
?>
                    ],
                    events: {
                        mouseover: function (marker, event, context) {
                            var map = $(this).gmap3("get"),
                                infowindow = $(this).gmap3({
                                    get: {
                                        name: "infowindow"
                                    }
                                });
                            if (infowindow) {
                                infowindow.open(map, marker);
                                infowindow.setContent(context.data);
                            } else {
                                $(this).gmap3({
                                    infowindow: {
                                        anchor: marker,
                                        options: {
                                            content: context.data
                                        }
                                    }
                                });
                            }
                        },
                        closeclick: function () {
                            infowindow.close();
                        },
                        mouseout: function () {
                            var infowindow = $(this).gmap3({
                                get: {
                                    name: "infowindow"
                                }
                            });
                        }
                    }
                }
            });
        });
    </script>
<div id="map_canvas"></div>
</html>