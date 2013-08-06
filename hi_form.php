<?php
ob_start();
session_start();
 include_once "menu.php"; ?>


    <style type="text/css">  
    .ui-datepicker{  
        width:250px;  
        font-family:tahoma;  
        font-size:11px;  
        text-align:center;  
    }  
    </style>  

   
    <form method="post" action="student_save.php" name="form1">
        
        <div class="container">    
      
        <div>
            <label>หมู่บ้าน</label>
           <?php echo sql_dropdown("Hi_villcode", "village", "village_name","village_code", $r["village_code"]); ?>
                                     <?//ตัวที่ต้องการบันทึก ตาราง  ?>  
        </div>
        <div>
            <label>วันที่สำรวจ</label>
            <input type="text" name="Hi_date" id="dateInput" value="<?php echo $r["Hi_date"]; ?>" />
        </div>
        <div>
            <label>ค่า HI</label>
            <input class="input" type="text" name="Hi_value" style="width: 100px" value="<?php echo $r["hi_value"]; ?>" />
        </div>
        
        <?php echo form_button($r["id"]); ?>
    </form>


</div>
    <?php
    $sql = "
        SELECT
        Hi_id,
h.Hi_villcode,
h.Hi_date,
h.Hi_value,
village.village_name,
thaiaddress.`name`
FROM
hi AS h
INNER JOIN village ON h.Hi_villcode = village.village_code
INNER JOIN thaiaddress ON village.address_id = thaiaddress.addressid

    ";
    $rs = mysql_query($sql);
    ?>
<div class="container"> 
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>วันที่</th>
                <th>หมู๋บ้าน</th>
                <th>ตำบล</th>
                <th>ค่า Hi</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = mysql_fetch_array($rs)): ?>
                <tr>
                    <td align="center"><?php echo thaidate($r["Hi_date"]); ?></td>
                    <td><?php echo $r["village_name"]; ?></td>
                    <td><?php echo $r["name"]; ?></td>
                    <td><?php echo $r["Hi_value"]; ?></td>
                    
                    <td align="center">
                        
                        <a href="hi_delete.php?Hi_id=<?= $r["Hi_id"] ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ')">
                            <i class="icon icon-trash icon-white"></i>
                            ลบ
                        </a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>

