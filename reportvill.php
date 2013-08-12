<? 
//ตัวอย่างกราฟ ห้ามแก้ไข
include 'menu.php'; 




?>
 
    
    <script src="libraries/RGraph.common.core.js" ></script>
    <script src="libraries/RGraph.line.js" ></script>
<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>
        <body>
            <div class="grid">
                <div class="row">
                    <div class="span10"></div>
                    <div class="span10"></div>
                    <div class="span8 bg-color-redLight">
                        <img src="images/simple.png" class="place-right" style="margin: 10px;"/>
                        <h2 class="fg-color-white">&nbsp;แสดงค่า HI รายหมู่บ้าน</h2>
                    </div>

                    

                    
                </div>
            </div>
            
          <div class="page" id="page-index">
    <div class="page-region">
        <div class="page-region-content">
            <div class="grid">
                <div class="row">
                    <div class="span8">
    <form class="form-inline" name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
  
      
    <div>
     <label>หมู่บ้าน</label>
           <?php echo sql_dropdown("Hi_villcode", "village", "village_name","village_code", $r["village_code"]); ?>
                                     <?//ตัวที่ต้องการบันทึก ตาราง  ?>  
       
      <input type="submit" value="ตกลง">
       </div>
    
  
</form>
                
       </div>
                </div>
            </div>
        </div>
    </div>
          </div>
        
        
        <?php
        /**
         * Change these to your own credentials
         */
        $v = $_GET["Hi_villcode"];
//echo $v;


if($_GET["Hi_villcode"] != "")
	{
     $pcu=mysql_query("SELECT village_name
FROM village
WHERE village_code = $v;
");
while($s = mysql_fetch_array($pcu))
{
$pcu_name=$s[village_name] ;
}

        $result = mysql_query("select hi_date as day ,hi_value  as c
from hi
where Hi_villcode = $v order by hi_date ");
         
        

       
        
        if ($result) {

            $labels = array();
            $data = array();

            while ($row = mysql_fetch_assoc($result)) {
                $m = thaiMonth($row["day"]);
//echo $m;
                $labels[] = $m;
                $data[] = $row["c"];
            }

            // Now you can aggregate all the data into one string
            $data_string = "[" . join(", ", $data) . "]";
            $labels_string = "['" . join("', '", $labels) . "']";
         
        } else {
            print('MySQL query failed with error: ' . mysql_error());
        }
        }
        
        //echo $data_string;
       
        ?>


        <!-- Don't forget to update these paths -->

        
        <div class="row">
            <div class="span10">
                 

                    <ul class="listview">
                        <li class="bg-color-pinkDark fg-color-white">
                            <div class="icon">
                                <img src="images/onenote2013icon.png" />
                            </div>

                            <div class="data">
                                <h4 class="fg-color-white"><? echo "แสดงค่า HI บ้าน  ".$pcu_name ?></h4>
                               
                                    </li> 
                            </ul>
                              
                               
                           
                      
        

   
            
      
        <canvas id="cvs" width="600" height="450">[No canvas support]</canvas>
     </div>
                            </div>
             
 
               <script>
            
            chart = new RGraph.Line('cvs', <?php print($data_string) ?>);
            chart.Set('linewidth', 3)
            chart.Set('chart.background.grid.autofit', true);
            chart.Set('chart.gutter.left', 35);
            chart.Set('chart.gutter.right', 35);
            chart.Set('chart.hmargin', 10);
            chart.Set('chart.tickmarks', 'endcircle');
                 chart.Set('filled', true);
                chart.Set('fillstyle', 'rgba(128,255,128,0.5)');
            chart.Set('chart.labels', <?php print($labels_string) ?>);        
            
            chart.Draw();
              
            
           
        
        </script>

    
        </body>

    
      