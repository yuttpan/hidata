<?php 
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $titleweb; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.1.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.1.offset.datepicker.min.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
var map;
var infoWindow;
var markers=[];
var customIcons = {
	c0: {
	icon: 'images/c001.png',
	},
	c1: {
	icon: 'images/c003.png',
	},
	c2: {
	icon: 'images/c006.png',
	},
	c3: {
	icon: 'images/c001.png',
	}
};
  function initialize() {
        map = new google.maps.Map(document.getElementById("pright"), {
        center: new google.maps.LatLng<?php if($_POST[ccenter]){echo $_POST[ccenter];}else{echo $dfmapcenter;}?>,
        zoom: <?php if($_POST[czoom]){echo $_POST[czoom];}else{echo $dfmapzoom;}?>,
        mapTypeId: google.maps.MapTypeId.<?php if($_POST[cmapview]){echo strtoupper($_POST[cmapview]);}else{echo $dfmapview;}?>,
		mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_RIGHT
    },
    navigationControl: true,
    navigationControlOptions: {
        style: google.maps.NavigationControlStyle.ZOOM_PAN,
        position: google.maps.ControlPosition.TOP_RIGHT
    },
    scaleControl: true,
    scaleControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
    }
    });
  getDatavola();
}

function getData(pid,hid){
		    var html;
			var html2;
			var simg;
			deleteOverlays();
			
			var url = "genxml_personvola.php?pid="+pid+"&hid="+hid+"&villcode="+villcode;
			downloadUrl(url, function(data) {
				var xml = parseXml(data);
				var xmldata = xml.documentElement.getElementsByTagName("marker");
				infoWindow = new google.maps.InfoWindow;
				//var sidebar = document.getElementById('slidebar');
				var bounds = new google.maps.LatLngBounds();
				//sidebar.innerHTML = "";
			
				// Creating a loop
		  for (var i = 0; i < xmldata.length; i++) {
          var hono = xmldata[i].getAttribute("hono");
          var moo = xmldata[i].getAttribute("moo");
          var vill = xmldata[i].getAttribute("vill");
		  var hhouse = xmldata[i].getAttribute("hhouse");
		  var lat = xmldata[i].getAttribute("lat");
		  var lng = xmldata[i].getAttribute("lng");
		  var type = xmldata[i].getAttribute("type");
		  var latlng = new google.maps.LatLng(lat, lng);
			if(lat != ''){simg = "success.png";}else{simg = "s_really.png";}
		   	html2 = "บ้านเลขที่ "+hono+" หมู่ " +vill + "<br>" + hhouse;
					var icon = customIcons[type];
			if(lat != ""){					
					var marker = new google.maps.Marker({
						map : map,
						position: latlng,
						icon: icon.icon,
						title: hono+"หมู่ "+moo
					});
					bounds.extend(latlng);	
					bindInfoWindow(marker, map, infoWindow, html2);
					markers.push(marker);
				}
					//var sidebarEntry = createSidebarEntry(marker,html,lat);
					//sidebar.appendChild(sidebarEntry);					
				} 
				var checkMarkers = markers.length;
				if(checkMarkers > 0){
					map.fitBounds(bounds);
				}
		});
}

function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
	new ActiveXObject('Microsoft.XMLHTTP') :
	new XMLHttpRequest;
	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			callback(request.responseText, request.status);
		}
	};
	request.open('GET', url, true);
	request.send(null);
}
function parseXml(str) {
	if (window.ActiveXObject) {
		var doc = new ActiveXObject('Microsoft.XMLDOM');
		doc.loadXML(str);
		return doc;
	} else if (window.DOMParser) {
		return (new DOMParser).parseFromString(str, 'text/xml');
	}
}

function bindInfoWindow(marker, map, infoWindow, html) {
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
}

function deleteOverlays() {
   if (markers) {
	  for (i in markers) {
		markers[i].setMap(null);
	  }
		markers.length = 0;
	}
}
google.maps.event.addDomListener(window, 'load', initialize); 

function getDatavola(){
	var villcode = document.getElementById('village').value;
	createXMLHttpRequest();
	  var url = "execute.php?chk=vola&villcode="+villcode;
            xmlHttp.open("get", url, true);
			xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
						document.getElementById("slidebar").innerHTML = xmlHttp.responseText;
                    } 
                }            
            };
            xmlHttp.send(null);	
}
</script>
</head>

<body  onload="adjustWindow();">


</body>
</html>