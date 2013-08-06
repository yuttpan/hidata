<?php
session_start();
?>


<body>
    
<?php 

include("includes/conndb.php"); 


$villcode = $_GET[village];
//echo $villcode;
if($villcode == '00000000'){
	$wt = " ";
        //echo $villcode;
}else{
	$wt = "where v.addressid='$villcode' ";
           // echo $villcode;
}
$sql = "select count(h.house_id) as h ,v.village_name,v.village_moo from house h
left outer join village v on h.village_code = v.village_code
 $wt GROUP BY v.village_code order by v.village_code ";
//echo $sql;

$result = mysql_query($sql);
?>
<div class="row-fluid">	
				<div class="box span10">
					<div class="box-header well" data-original-title>
						<h2>Combined All</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
                                    <?
$txt .= "<table width='95%' border='0' cellspacing='1' cellpadding='1' class='table table-bordered table-striped table-condensed'>
  <tr class='success'>
    <th width='2%' scope='col'>ลำดับ</th>
  	<th width='2%' scope='col'>หมู่</th>
	<th  scope='col'>ชื่อหมู่บ้าน</th>
        <th  scope='col'>หลังคาเรือน</th>
      </tr>";
while($row=mysql_fetch_array($result)) {
	//$moo = substr($row[villcode],6,2);
	//$vill = getMooVillage($row[villcode]);
	//$hhouse = getPersonName($row[pid]);
	//$osm = getosmname($row[pidvola]);
    $s = $s+$row[h];
++$x;
	if(($x%2) == 1){$cr = " class='altrow'";}else{$cr = "";}
$txt .="  <tr $cr>
    <td><div align='center'>$x</div></td>
   
    <td><div align='center'>&nbsp;$row[village_moo]</td>
    <td><div align='center'>&nbsp;$row[village_name]</td>
	<td><div align='center'>&nbsp;$row[h]</td>
    
  </tr>";
}

$txt .= "<tr><td colspan='3' <div align='right'>รวม</td>
<td><div align='center'>&nbsp;$s</td>    
</tr>
    </table>";  
echo $txt;

?>
                                </div>
    

 
