<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Map API 3 - search and marker</title>
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
	width:550px;
	height:400px;
	/*margin:auto;
	margin-top:50px;*/
}
</style>


</head>

<body>
  <div id="map_canvas"></div>

<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script type="text/javascript">
    var geocoder; // the variable for translate the place name to coordinate
    var map;
    var marker;
    var googleMap; // indicate the variable to store the object "google.maps"
    var my_Marker1 = [];
    var my_Marker2 = [];
    var my_Marker3 = [];
    var Rlatlng = [];
    var Blatlng = [];
    var Glatlng = [];
    var image1 = [];
    var image2 = [];
    var image3 = [];
    var i;
    var j;
    var k;
    var infowindow1 = [];
    var infowindow2 = [];
    var infowindow3 = [];
    var infowindowTmp;

    function initialize() {
        googleMap = new Object(google.maps);
        geocoder = new googleMap.Geocoder();

        var my_Latlng = new googleMap.LatLng(13.9235362, 100.3947116);  // indicate the initial point
        var my_mapTypeId = googleMap.MapTypeId.ROADMAP;  // indicate the pattern of map that represent
        
        var my_DivObj = $("#map_canvas")[0];  // indicate the object that bring the map to represent
        
        var myOptions = {  // indicate initial value of the map
            zoom: 8, 
            center: my_Latlng, 
            mapTypeId: my_mapTypeId
        };
        map = new googleMap.Map(my_DivObj, myOptions); // build the map

        Rlatlng[0] = new googleMap.LatLng(13.9235362, 100.3947116);
        Rlatlng[1] = new googleMap.LatLng(13.6917962, 100.4138746);
        Rlatlng[2] = new googleMap.LatLng(13.7768464, 100.3208549);
        Rlatlng[3] = new googleMap.LatLng(13.7575264, 100.363692);
        Rlatlng[4] = new googleMap.LatLng(13.7783653, 100.4550477);

        Blatlng[0] = new googleMap.LatLng(13.7559862, 100.6460058);
        Blatlng[1] = new googleMap.LatLng(13.8129355, 100.7316899);
        Blatlng[2] = new googleMap.LatLng(13.745718, 100.5365898);
        Blatlng[3] = new googleMap.LatLng(13.7781968, 100.508353);

        Glatlng[0] = new googleMap.LatLng(13.2017461, 101.2523792);
        Glatlng[1] = new googleMap.LatLng(12.9275, 100.8752778);
        Glatlng[2] = new googleMap.LatLng(13.2845548, 100.9151211);


        var info1 = "<table width='300' border='0' cellspacing='2' cellpadding='0'><tr><td width='10' rowspan='4'><img src='http://www.healthcorners.com/2007/article/img0/icon_1248227106.jpg' width='130' height='80'></td><td width='10'>&nbsp;</td><td width='264'>Package Name</td></tr><tr><td>&nbsp;</td><td>Location </td></tr><tr><td>&nbsp;</td><td>Details</td></tr><tr><td>&nbsp;</td><td><a href='http://www.healthcorners.com/2007/article/img0/icon_1248227106.jpg' target='_blank'>Link</a></td></tr></table>";


//        infowindow3[1] = new googleMap.InfoWindow({
//            content: "<table width='300' border='0' cellspacing='2' cellpadding='0'><tr><td width='10' rowspan='4'><img src='http://1.bp.blogspot.com/_CSZstFROFUg/S_yE5by5vgI/AAAAAAAAAPM/-mQXh6zcTzQ/s1600/pattaya-02.jpg' width='130' height='80'></td><td width='10'>&nbsp;</td><td width='264'>Package Name</td></tr><tr><td>&nbsp;</td><td>Location </td></tr><tr><td>&nbsp;</td><td>Details</td></tr><tr><td>&nbsp;</td><td><a href='http://beachresortpattaya.blogspot.com/' target='_blank'>Link</a></td></tr></table>"
//        });

//        infowindow3[2] = new googleMap.InfoWindow({
//            content: "<table width='300' border='0' cellspacing='2' cellpadding='0'><tr><td width='10' rowspan='4'><img src='http://www.moohin.com/database/pic/059/bangsan.jpg' width='130' height='80'></td><td width='10'>&nbsp;</td><td width='264'>Package Name</td></tr><tr><td>&nbsp;</td><td>Location </td></tr><tr><td>&nbsp;</td><td>Details</td></tr><tr><td>&nbsp;</td><td><a href='http://www.moohin.com/059/059h002.shtml' target='_blank'>Link</a></td></tr></table>"
//        });
        
        
        var shadow = new googleMap.MarkerImage("icons/Marker_Red/shadow.png",
        new googleMap.Size(38.0, 34.0),
        new googleMap.Point(0, 0),
        new googleMap.Point(10.0, 17.0)
        );

//        my_Marker1[] = new googleMap.Marker();
//        my_Marker2[] = new googleMap.Marker();
//        my_Marker3[] = new googleMap.Marker();

        //loop for RED marker
        for(i=0; i<5; i++){
            image1[i] = new googleMap.MarkerImage("icons/Marker_Red/red_Marker"+i+".png",
            new googleMap.Size(20.0, 34.0),
            new googleMap.Point(0, 0),
            new googleMap.Point(10.0, 17.0)
            );

            my_Marker1[i] = new googleMap.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
            position: Rlatlng[i],  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
            map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
            icon: image1[i],
            shadow: shadow,
            title: "Click to view info"
        });
        }

        //loop for BLUE marker
        for(j=0; j<4; j++){
            image2[j] = new googleMap.MarkerImage("icons/Marker_Blue/blue_Marker"+j+".png",
            new googleMap.Size(20.0, 34.0),
            new googleMap.Point(0, 0),
            new googleMap.Point(10.0, 17.0)
            );

            my_Marker2[j] = new googleMap.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
            position: Blatlng[j],  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
            map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
            icon: image2[j],
            shadow: shadow,
            title: "Click to view info"
        });
        }

        //loop for GREEN marker
        for (k = 0; k < 3; k++) {
            image3[k] = new googleMap.MarkerImage("icons/Marker_Green/green_Marker" + k + ".png",
            new googleMap.Size(20.0, 34.0),
            new googleMap.Point(0, 0),
            new googleMap.Point(10.0, 17.0)
            );

            my_Marker3[k] = new googleMap.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
                position: Glatlng[k],  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
                map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
                icon: image3[k],
                shadow: shadow,
                title: "Click to view info"
            });

            infowindow3[k] = new googleMap.InfoWindow({
                content: info1
            });

            GGM.event.addListener(my_Marker3[k], 'click', function () { // เมื่อคลิกตัว marker แต่ละตัว
                if (infowindowTmp) { // ให้ตรวจสอบว่ามี infowindow ตัวไหนเปิดอยู่หรือไม่
                    infowindow3[infowindowTmp].close();  // ถ้ามีให้ปิด infowindow ที่เปิดอยู่
                }
                infowindow3[k].open(map, my_Marker3[k]); // แสดง infowindow ของตัว marker ที่คลิก
                infowindowTmp = k; // เก็บ infowindow ที่เปิดไว้อ้างอิงใช้งาน
            });
        }

      }


      $(function () {
        // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
        // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
        // v=3.2&sensor=false&language=th&callback=initialize
        //	v เวอร์ชัน่ 3.2
        //	sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
        //	language ภาษา th ,en เป็นต้น
        //	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize	
        $("<script/>", {
            "type": "text/javascript",
            src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=en&callback=initialize"
        }).appendTo("body");
    });


</script>
</body>
</html>