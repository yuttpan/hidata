<?php 
$cuser = $_SESSION[fullname];
$clevel = $_SESSION[level];
$cposition = $_SESSION[position];
$titleweb = "ระบบสารสนเทศสุขภาพ"; //
include("config.local.php");
//if($_SESSION[username]){
//$headweb2 = "<strong>ชื่อผู้ใช้งาน <br/> ".$cuser."</strong>";
//$lmenu = "menutop".$clevel.".php";
//}else{$lmenu = "menutop2.php";
//$headweb2 = "<strong>ชื่อผู้ใช้งาน <br/> บุคคลทั่วไป</strong>";
//}
//$sqloff =  "SELECT chospital.hosname,chospital.hoscode 
//				FROM office
//				Inner Join chospital ON office.offid = chospital.hoscode
//				WHERE chospital.hoscode <>  '0000x'";
//$resoff = mysql_query($sqloff);
//$rowoff = mysql_fetch_array($resoff);
//$hospitalname = $rowoff[hosname];
//$hospitalcode = $rowoff[hoscode];
//$offname = "หน่วยบริการ : ".$rowoff[hosname]	."(".$rowoff[hoscode]	.")";
//$version = "version 2.0.4 2012-08-11";			
//$headweb = "<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td><img src='images/logo.jpg'></td><td></td><td><div align='right'><strong>$offname</strong><br>$version</div></td></tr></table>";


$todays = date("Y-m-d");
$dtimenow = date("Y-m-d H:i:s");

$ThaiMonth = array( "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$ThaiSubMonth = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
/*ฟังก์ชั่นตัดสตริงแปลงวันที่เป็นไทยแบบสั้น ตัวอย่างรูปแบบสตริงนำเข้า 2001-07-16 23:53:11*/
function SortThaiDate($txt)
				 {
				      global $ThaiSubMonth;
							$Year = substr( substr( $txt,0 ,4)+543, -2);
							$Month = substr( $txt, 4, 2);
							$DayNo = substr( $txt, 6, 2);
							// $Month = $Month - 1;
						 return $DayNo."/".$Month."/".$Year;									 
				 }					
/*ฟังก์ชั่นตัดสตริงแปลงวันที่เป็นไทยแบบยาว ตัวอย่างรูปแบบสตริงนำเข้า 2001-07-16 23:53:11*/
function LongThaiDate($txt)
				 {
				      global $ThaiMonth;
							$Year = substr( $txt,0 ,4)+543;
							$Month = substr( $txt,5, 2);
							$DayNo = substr( $txt, 8, 2);
							$Month = $Month - 1;
						 return $DayNo."  ".$ThaiMonth[$Month]."  ".$Year;						 
				 }					
//หาวัสุดท้ายของเดือน
function lastday($mon){
list($y, $m) = explode("/", $mon);
$m = $m+1; if($m==13){ $y=$y+1; $m=1; }
$newdate = mktime(12, 0, 0, $m, 1, $y);
$newdate = strtotime("-1 day", $newdate);
$newdate = date("Y-m-d", $newdate);
return($newdate);
}
/*ฟังก์ชั่นสร้าง Dropdown รายการเดือนไทย ส่งค่า 1-12*/
function getThaiMonth()
				 {
				 global $ThaiMonth;
				 for ($i=0;$i<=11;$i++)
				      {
							     $a = $i +1;
								       echo "\t<option value=\"$a\">$ThaiMonth[$i]</option>\n";
							}
				 }				 
function retDate($add){ //แปลงค่าวันที่ จาก 01/12/2552 เป็น 2009-12-01
		$strd = substr($add,0,2);
		$strm = substr($add,3,2);
		$stryT = substr($add,6,4);
		$stry = $stryT - 543;
		$str = $stry."-".$strm."-".$strd;
		return $str;
}
function retDatets($add){ //แปลงค่าวันที่ จาก 2009-12-01  เป็น  01/12/2552  
		$strd = substr($add,8,2);
		$strm = substr($add,5,2);
		$stryT = substr($add,0,4);
		$stry = $stryT + 543;
		$str = $strd."/".$strm."/".$stry;
		return $str;
}
function redatexx($add){ //แปลงค่าวันที่ จาก 2009-12-01  เป็น  01/12/2552  
		$strd = substr($add,8,2);
		$strm = substr($add,5,2);
		$stryT = substr($add,0,4);
		$stry = $stryT + 543;
		$stryto = substr($stry,2,2);
		$str = $strd."/".$strm."/".$stryto;
		return $str;
}

function retDatet18($add){ //แปลงค่าวันที่ จาก 20091201  เป็น  01/12/2552  
	if($add != ''){
		$strd = substr($add,6,2);
		$strm = substr($add,4,2);
		$stryT = substr($add,0,4);
		$stry = $stryT + 543;
		$str = $strd."/".$strm."/".$stry;
		return $str;
	}
}
function retDatet19($add){ //แปลงค่าวันที่ จาก 01/12/2552  เป็น  20091201
	if($add != ''){
		$strd = substr($add,0,2);
		$strm = substr($add,3,2);
		$stryT = substr($add,6,4);
		$stry = $stryT - 543;
		$str = $stry."".$strm."".$strd;
		return $str;
	}
}
function retDatet20($add){ //แปลงค่าวันที่ จาก 20091201  เป็น  2009-12-01
	if($add != ''){
		$strd = substr($add,6,2);
		$strm = substr($add,4,2);
		$stryT = substr($add,0,4);
		$stry = $stryT;
		$stry = substr($stry,-2);
		$str = $stryT."-".$strm."-".$strd;
		return $str;
	}
}							 
/*ฟังก์ชั่นคืนค่าเตรียมก่อนบันทึกกลับ*/
function get_reDate($gyear ,$gmonth ,$gday)
				 {
				 						if (strlen($gmonth)==1) {
											$gmonth = "0".$gmonth;
										}

										if (strlen($gday)==1){
											 $gday = "0".$gday;
										}
										$reDate = $gyear."-".$gmonth."-".$gday;
										return $reDate;
				 }
				 
/*ฟังก์ชั่นสร้าง DropDown รายการวัน 1-31 ส่งค่า 1-31*/
function getDay1to31()
				 {
				      for($i=1;$i<=31;$i++)
							     {
											      echo "\t<option valu>$i</option>\n";
									 }
				 }

/*ฟังก์ชั่นสร้าง DropDown ปีปัจจุบันย้อนไป 100 ปี โดย Auto Update ไม่ต้องมานั่งเปลี่ยน*/				 
 function get2Year()
 					{
					     $today = getdate();
							 $year = $today[year];
							 for ($x=$year-20;$x<=$year;$x++)
							      {
										     $z=$x+543;
												     echo "\t<option value=\"$x\">$z</option>\n";			
										}
					}
				

function getPersonName($id){
		$sql ="SELECT CONCAT(t.titlename,p.fname,' ',p.lname) AS n 
		FROM person AS p
		Inner Join ctitle AS t ON p.prename = t.titlecode
		 WHERE pid='$id'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$ret = $row[n];
		return $ret;
}	
function getusername($xx){
		$sql ="select concat(c.titlename,user.fname,'  ',user.lname) as n FROM `user` Inner Join ctitle c ON `user`.prename = c.titlecode WHERE `user`.markdelete IS NULL and `user`.username = '$xx'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$ret = $row[n];
		return $ret;
}	
function getosmname($osm){
		$sql ="SELECT CONCAT(t.titlename,p.fname,' ',p.lname) AS n 
		FROM person AS p
		Inner Join ctitle AS t ON p.prename = t.titlecode
		 WHERE pid='$osm'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$ret = $row[n];
		return $ret;
}	
function getTitle($titlecode){
		$sql ="SELECT t.titlename AS n 
		FROM ctitle AS t
		 WHERE t.titlecode='$titlecode'";
		$result=mysql_query($sql);
		if($result){
		$row=mysql_fetch_array($result);
		$ret = $row[n];
		}else{
			$ret = $titlecode;	
		}
		return $ret;
}
function getMooVillage($vid){
		$sql ="SELECT CONCAT(villno,' ',villname) AS n FROM village WHERE villcode='$vid'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$ret = $row[n];
		return $ret;
}
function getvillagename($villname){
		$sql ="SELECT CONCAT('หมู่ที่ ',villno,' บ้าน',villname) AS n FROM village where village.villcode = '$villname'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$ret = $row[n];
		return $ret;
}
function gethospname($pcucode){
		$sql ="SELECT concat(chospital.hoscode,'  ',chospital.hosname) as n  FROM office Inner Join chospital ON office.offid = chospital.hoscode WHERE chospital.hoscode <>  '0000x' and chospital.hoscode = '$pcucode'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$ret = $row[n];
		return $ret;
}		
function getLatHouse($v,$h){
		$sql ="SELECT ygis FROM house WHERE villcode='$v' AND hno='$h'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) > 0){
			$row=mysql_fetch_array($result);
			$ret =$row[ygis];	
		}
		return $ret;
}
function getLngHouse($v,$h){
		$sql ="SELECT xgis FROM house WHERE villcode='$v' AND hno='$h'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) > 0){
			$row=mysql_fetch_array($result);
			$ret =$row[xgis];	
		}
		return $ret;
}
/*
function getVillLatLng($v){
				$sqla ="SELECT lat,lon FROM village WHERE mooban='$v'";
				$resa = mysql_query($sqla);
				if($rowa = mysql_fetch_array($resa)){
					$n = $rowa[lat].",".$rowa[lon];
					return $n;
				}
}	
function getVillLat($v){
				$sqla ="SELECT lat FROM village WHERE mooban='$v'";
				$resa = mysql_query($sqla);
				if($rowa = mysql_fetch_array($resa)){
					$n = $rowa[lat];
					return $n;
				}
}	
function getVillLng($v){
				$sqla ="SELECT lon FROM village WHERE mooban='$v'";
				$resa = mysql_query($sqla);
				if($rowa = mysql_fetch_array($resa)){
					$n = $rowa[lon];
					return $n;
				}
}
function getLatLng($i,$c){
	if($i == 1){
				$sqla ="SELECT lat as lat ,lon as lng FROM amphur WHERE amphurcode='$c'";
				$resa = mysql_query($sqla,$link);
				$rowa = mysql_fetch_array($resa);
				$n = $rowa[lat].",".$rowa[lng];
				return $n;
	}else if($i == 2){
				$sqla ="SELECT lat as lat ,lon as lng FROM tambon WHERE tambon='$c'";
				$resa = mysql_query($sqla);
				$rowa = mysql_fetch_array($resa);
				$n = $rowa[lat].",".$rowa[lng];
				return $n;
	}else if($i == 3){
				$sqla ="SELECT lat as lat ,lon as lng FROM village WHERE mooban='$c'";
				$resa = mysql_query($sqla);
				$rowa = mysql_fetch_array($resa);
				$n = $rowa[lat].",".$rowa[lng];
				return $n;
	}else if($i == 4){
				$sqla ="SELECT lat as lat ,lng as lng FROM hospitals WHERE off_id='$c'";
				$resa = mysql_query($sqla);
				$rowa = mysql_fetch_array($resa);
				$n = $rowa[lat].",".$rowa[lng];
				return $n;
	}
}
function getHsFromVill($v){
				$sqla ="SELECT hs FROM village WHERE mooban='$v'";
				$resa = mysql_query($sqla);
				if($rowa = mysql_fetch_array($resa)){
					$n = $rowa[hs];
					return $n;
				}
}	

function getLatLngHouse($v,$h){
		$sql ="SELECT lat,lng FROM tbhouse WHERE mooban='$v' AND house_no='$h'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) > 0){
			$row=mysql_fetch_array($result);
			$ret =$row[0].",".$row[1];	
		}
		return $ret;
}
*/
?>
