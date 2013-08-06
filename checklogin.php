<?
	session_start();
	mysql_connect("localhost","sa","sa");
	mysql_select_db("hi");
	$strSQL = "SELECT * FROM member WHERE Username = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and Password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			//echo "Username and Password Incorrect!";
                      header("location:index.php");
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:hi_form.php");
			}
			else
			{
				header("location:hi_form.php");
			}
	}
	mysql_close();
?>

