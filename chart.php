<? 
//ตัวอย่างกราฟ ห้ามแก้ไข
include 'menu.php'; 




?>
 
    
    <script src="libraries/RGraph.common.effects.js" ></script>
    <script src="libraries/RGraph.common.key.js" ></script>
    <script src="libraries/RGraph.line.js" ></script>
    <script src="libraries/jquery.min.js" ></script>
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
            
    <form class="form-inline" name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
     
    <div>
     <label>หมู่บ้าน</label>
           <?php echo sql_dropdown("Hi_villcode", "village", "village_name","village_code", $r["village_code"]); ?>
                                     <?//ตัวที่ต้องการบันทึก ตาราง  ?>  
        </div>
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
       
        <?php
        /**
         * Change these to your own credentials
         */
        $v = $_GET["Hi_villcode"];
echo $v;

if($_GET["Hi_villcode"] != "")
	{

        $result = mysql_query("select hi_date as day ,hi_value  as c
from hi
where Hi_villcode = $v");
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
        ?>


        <!-- Don't forget to update these paths -->

        
 <div class="box-content">
        <canvas id="cvs" width="600" height="450">[No canvas support]</canvas>
 </div>
              <script>
        window.onload = function ()
        {
            var line = new RGraph.Line('cvs', [70,60,80,50,50,60,70,60,50,40,50,50], [20,30,50,40,30,50,40,30,60,50,10,20]);
            line.Set('gutter.left', 45);
            line.Set('gutter.right', 100);
            line.Set('background.grid.autofit.numvlines', 11);
            line.Set('background.grid.autofit.numhlines', 8);
            line.Set('noxaxis', true);
            line.Set('stepped', true);
            line.Set('units.pre', '$');
            line.Set('units.post', 'K');
            line.Set('ylabels.count', 8);
            line.Set('labels', ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']);
            line.Set('key', ['Credit limit','MTM + AR','AR','MTM']);
            line.Set('key.position.graph.boxed', false);
            line.Set('key.position.x', line.canvas.width - line.Get('chart.gutter.right'));
            line.Set('key.color.shape', 'circle');
            line.Set('linewidth', 3);
            
            line.ondraw = function (obj)
            {
                var y  = Math.round(obj.getYCoord(50));
                var x1 = obj.Get('chart.gutter.left');
                var x2 = obj.canvas.width - obj.Get('chart.gutter.right');

                obj.context.beginPath();
                    obj.context.strokeStyle = 'orange';
                    RGraph.DashedLine(obj.context, x1, y, x2, y);
                obj.context.stroke();
            }

            //line.Draw();
            RGraph.Effects.Line.jQuery.Trace(line);
        }
    </script>

    
        </body>

    
      