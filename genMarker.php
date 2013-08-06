<?php
header("Content-type:text/xml; charset=UTF-8");              
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   
mysql_connect("localhost","root","") or die("Cannot connect the Server");
mysql_select_db("hi") or die("Cannot select database");
mysql_query("set character set utf8");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<markers>
<?php
$q="SELECT * FROM village ";
$qr=mysql_query($q);
while($rs=mysql_fetch_array($qr)){
?>
	<marker id="<?=$rs['village_moo']?>">
        <name><?=$rs['village_name']?></name>
        <latitude><?=$rs['latitude']?></latitude>
        <longitude><?=$rs['longitude']?></longitude>
    </marker>
<?php } ?>
</markers>
