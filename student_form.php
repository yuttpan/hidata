
<? include_once "menu.php"; ?>
<div>
   
    <form method="post" action="student_save.php" name="form1">
        <div>
            <label>รหัสประจำตัว</label>
            <input class="input" type="text" name="student_code" style="width: 80px" value="<?php echo $r["student_code"]; ?>" />
        </div>
        <div>
            <label>ชื่อ สกุลนักเรียน</label>
            <input class="input" type="text" name="student_name" value="<?php echo $r["student_name"]; ?>" />
        </div>
        <div>
            <label>วันเกิด</label>
            <input type="text" name="student_b_date_day" value="<?php echo $r["student_b_date_day"]; ?>" class="input span1" />
            <span>เดือน</span>
            <input type="text" name="student_b_date_month" value="<?php echo $r["student_b_date_month"]; ?>" class="input span2" />
            <span>ปี</span>
            <input type="text" name="student_b_date_year" value="<?php echo $r["student_b_date_year"]; ?>" class="input span1" />
        </div>
        <div>
            <label>ชื่อ-สกุล บิดา</label>
            <input type="text" name="student_father_name" value="<?php echo $r["student_father_name"]; ?>" class="input span3" />
            <label>ชื่อ-สกุล มารดา</label>
            <input type="text" name="student_mother_name" value="<?php echo $r["student_mother_name"]; ?>" class="input span3" />
        </div>
        <div>
            <label>ที่อยู่</label>
            <textarea class="input" name="student_address" style="width: 500px; height: 50px;"><?php echo $r["student_address"]; ?></textarea>
        </div>
        <div>
            <label>เบอร์โทร</label>
            <input class="input" type="text" name="student_tel" value="<?php echo $r["student_tel"]; ?>" />
        </div>
        <div>
            <label>อีเมล์</label>
            <input class="input" type="text" name="student_email" value="<?php echo $r["student_email"]; ?>" />
        </div>
        <div>
            <label>หมู่บ้าน</label>
            <?php echo sql_dropdown("village_code", "village", "village_name", $r["village_code"]); ?>
        </div>
        <div>
            <label>ชั้นเรียน</label>
            <?php echo sql_dropdown("level_id", "tb_level", "level_name", "id", $r["level_id"]); ?>
        </div>
        <?php echo form_button($r["id"]); ?>
    </form>

    <?php
    $sql = "
        SELECT 
            tb_student.*,
            tb_level.level_name,
            tb_room.room_name
        FROM tb_student
        INNER JOIN tb_room ON tb_room.id = tb_student.room_id
        INNER JOIN tb_level ON tb_level.id = tb_student.level_id
    ";
    $rs = mysql_query($sql);
    ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>รหัสนักเรียน</th>
                <th>ชื่อนักเรียน</th>
                <th>เบอร์โทร</th>
                <th>อีเมล์</th>
                <th>ชั้นเรียน</th>
                <th>ห้องเรียน</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = mysql_fetch_array($rs)): ?>
                <tr>
                    <td align="center"><?php echo $r["student_code"]; ?></td>
                    <td><?php echo $r["student_name"]; ?></td>
                    <td><?php echo $r["student_tel"]; ?></td>
                    <td><?php echo $r["student_email"]; ?></td>
                    <td><?php echo $r["level_name"]; ?></td>
                    <td><?php echo $r["room_name"]; ?></td>
                    <td align="center">
                        <a href="index.php?url=student_form.php&id=<?= $r["id"] ?>" class="btn btn-primary">
                            <i class="icon icon-check icon-white"></i>
                            แก้ไข
                        </a>
                        <a href="student_delete.php?id=<?= $r["id"] ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ')">
                            <i class="icon icon-trash icon-white"></i>
                            ลบ
                        </a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>