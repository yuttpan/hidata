<? include_once 'menu.php'; ?>
<body>
<form class="form-inline" name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
    <div>
     <label>หมู่บ้าน</label>
           <?php echo sql_dropdown("Hi_villcode", "village", "village_name","village_code", $r["village_code"]); ?>
                                     <?//ตัวที่ต้องการบันทึก ตาราง  ?>  
        </div>
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
<?
$v = $_GET["Hi_villcode"];
echo $v;
if($_GET["Hi_villcode"] != "")
	{
	
	// Search By Name or Email
	$strSQL = "SELECT * FROM hi WHERE hi_villcode = $v order by hi_date";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
        //echo $strSQL;
	?>
	<table width="600" border="1">
	  <tr>
		<th width="91"> <div align="center">วันที่สำรวจ</div></th>
		<th width="98"> <div align="center">ค่า HI</div></th>
		
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?=$objResult["Hi_date"];?></div></td>
		
		<td><?=$objResult["Hi_value"];?></td>
		
	  </tr>
	<?
	}
	?>
	</table>
	<?
	mysql_close();
}
?>
</body>
</html>