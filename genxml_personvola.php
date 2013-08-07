<?php 
header("Content-type: text/xml");
$dbserver = 'localhost';
$dbuser = 'root' ; 
$dbpass= "";
$dbname= 'hi';
error_reporting(E_ALL ^ E_NOTICE);
mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล
mysql_query("SET NAMES UTF8");

           
                        

//$opid = $_GET[pid];
//$ohid = $_GET[hid];
//$villcode = $_GET[villcode];
	$sql = "SELECT
h.Hi_villcode,
last_day(h.Hi_date),
h.Hi_value,
village.village_name,
village.village_moo,
thaiaddress.`name`,
village.latitude,
village.longitude
FROM
hi AS h
INNER JOIN village ON h.Hi_villcode = village.village_code
INNER JOIN thaiaddress ON village.address_id = thaiaddress.addressid
where  date_add(curdate(),interval -30 day))";
$result = mysql_query($sql);
$xml = '<markers>';
while($row=mysql_fetch_array($result)) {
	$moo = $row[village_moo];
	$vill = $row[Hi_villcode];
	
	if($row[Hi_value] <= '10'){
		$type = 'c2';}
	else{
		$type = 'c1';
	}
  $xml .= '<marker ';
  $xml .= 'hono="'.$row[Hi_villcode].'" ';
  $xml .= 'moo="'.$row[village_moo].'" ';
  $xml .= 'vill="'.$row[village_name].'" ';
  $xml .= 'hhouse="'.$row[name].'" ';
  $xml .= 'hi_date="'.$row[Hi_date].'" ';
   $xml .= 'hi_date="'.$row[Hi_value].'" ';
  $xml .= 'lat="'.$row[latitude].'" ';
  $xml .= 'lng="'.$row[longitude].'" ';
  $xml .= 'type="'.$type.'" ';
  $xml .= '/>';
}
$xml .= '</markers>';
echo $xml;
?>

