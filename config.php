<?php

//
// TODO: connect db
//
$db_name = "hi";
$db_user = "sa";
$db_pass = "sa";
$db_host = "localhost";

$conn = mysql_connect($db_host, $db_user, $db_pass);

if ($conn) {
    mysql_select_db($db_name);
    mysql_query("SET NAMES utf8");
} else {
    echo mysql_error();
}


//
// TODO: config variable
//
$arr_day = array("จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์");

//
// TODO: my function
//
$sql = "";

function sql_insert($table_name, $pk, $arr = null) {
    global $sql;

    if (empty($arr)) {
        $arr = $_POST;
    }

    $field = "";
    $values = "";
    $i = 0;
    $pk_value = $arr[$pk];

    foreach ($arr as $key => $value) {
        if ($key != $pk) {
            $field .= $key;
            $values .= "'$value'";

            if ($i < count($arr) - 2) {
                $field .= ",";
                $values .= ",";
            }
            $i++;
        }
    }

    $sql = "INSERT INTO $table_name($field) VALUES($values)";
    return $sql;
}

function sql_update($table, $pk, $arr = null) {
    $fields = "";
    $i = 0;

    if (empty($arr)) {
        $arr = $_POST;
    }
    $pk_value = $_POST[$pk];

    foreach ($arr as $key => $value) {
        if ($key != $pk) {
            $fields .= "$key = '$value'";

            if ($i < count($arr) - 2) {
                $fields .= ",";
            }
            $i++;
        }
    }

    $sql = "
        UPDATE $table SET 
            $fields
        WHERE $pk = $pk_value";
    return $sql;
}

function sql_save($table, $pk = null, $arr = null) {
    global $sql;

    if ($_POST[$pk] == null) {
        if (empty($arr)) {
            $arr = $_POST;
        }
        return mysql_query(sql_insert($table, $pk));
    }
    if (empty($arr)) {
        $arr = $_POST;
    }

    return mysql_query(sql_update($table, $pk, $arr));
}

function sql_dropdown($name, $table, $value_text, $value_key, $default_value = null) {
    global $sql;
    global $conn;

    $sql = "SELECT * FROM $table order by $value_key ";
    $rs = mysql_query($sql);

    $html = "<select name='$name' id='$name'>";
    while ($r = mysql_fetch_array($rs)) {
        $html .= "<option value='$r[$value_key]'";

        // default value
        if (!empty($default_value)) {
            if ($r[$value_key] == $default_value) {
                $html .= " selected";
            }
        }

        $html .= ">";
        $html .= $r[$value_text];
        $html .= "</option>";
    }
    $html .= "</select>";

    return $html;
}

function sql_delete($table, $pk) {
    $pk_value = $_GET[$pk];
    $sql = "DELETE FROM $table WHERE $pk = $pk_value";

    return mysql_query($sql);
}

function sql_find_all($table) {
    return mysql_query("SELECT * FROM $table");
}

function sql_find_by_pk($table, $pk) {
    $pk_value = $_REQUEST[$pk];

    if (!empty($pk_value)) {
        $sql = "SELECT * FROM $table WHERE $pk = $pk_value";
        $rs = mysql_query($sql);

        if ($rs) {
            return mysql_fetch_array($rs);
        } else {
            echo mysql_error();
        }
    }
    return array();
}

function sql_error() {
    global $sql;
    $error = mysql_error();

    $html = "
        <div style='padding: 10px; border: red 1px solid; background-color: #ffffcc'>
        $sql<br />
        $error
        </div>";
    return $html;
}

function dropdown_manual($name, $min, $max, $default_value = null) {
    $html = "<select name='$name' id='$name'>";

    for ($i = $min; $i <= $max; $i++) {
        $html .= "<option value='$i'";

        if (!empty($default_value)) {
            if ($default_value == $i) {
                $html .= " selected";
            }
        }

        $html .= ">";
        $html .= $i;
        $html .= "</option>";
    }
    $html .= "</select>";

    return $html;
}

function dropdown_from_array($name, $arr, $default_value = null) {
    $html = "<select name='$name' id='$name'>";
    foreach ($arr as $k => $v) {
        $html .= "<option value='$k'";

        if (!empty($default_value)) {
            if ($default_value == $k) {
                $html .= " selected";
            }
        }

        $html .= ">";
        $html .= $v;
        $html .= "</option>";
    }
    $html .= "</select>";

    return $html;
}

function form_header($text) {
    $html = "
        <div class='btn-success btn-large'>
            <i class='icon-tasks icon-white'></i>
            <strong>$text</strong>
        </div>
        <br />";
    return $html;
}

function form_button($id_value) {
    $html = "
        <div>
            <label></label>
            <a class=\"btn btn-success btn-large\" onclick=\"form1.submit()\">
                <i class=\"icon icon-check icon-white\"></i>
                บันทึก
            </a>
            <a class=\"btn btn-danger btn-large\" onclick=\"form1.reset()\">
                <i class=\"icon icon-trash icon-white\"></i>
                ยกเลิก
            </a>
        </div>
        <input type=\"hidden\" name=\"id\" value=\"$id_value\" />";
    return $html;
}

function get_subject($level_id, $teacher_id, $hour, $day) {
    $sql = "
        SELECT 
            tb_table_lern.*, 
            tb_subject.subject_code,
            tb_subject.subject_name,
            tb_room.room_name
        FROM tb_table_lern
        INNER JOIN tb_subject ON tb_subject.id = tb_table_lern.subject_id
        INNER JOIN tb_room ON tb_room.id = tb_table_lern.room_id
        WHERE table_lern_hour = $hour
        AND table_lern_day = $day";
    if (!empty($level_id)) {
        $sql .= " AND tb_table_lern.level_id = $level_id";
    }
    if (!empty($teacher_id)) {
        $sql .= " AND tb_table_lern.teacher_id = $teacher_id";
    }
    
    $rs = mysql_query($sql);
    
    if (!$rs) {
        return $sql;
    }
    if (mysql_num_rows($rs) > 0) {
        $r = mysql_fetch_array($rs);
        return "
            <center title='$r[subject_name] \nห้องเรียน $r[room_name]'>
                <a class='btn btn-inverse' href='index.php?url=room_info.php&id=$r[id]'>$r[subject_code]</a>
            </center>";
    }
    return "";
}

function get_day_name($index) {
    $arr = array("จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์");
    return $arr[$index];
}

function delete_by_pk($table, $pk) {
    global $sql;
    
    $pk_value = $_REQUEST[$pk];
    $sql = "DELETE FROM $table WHERE $pk = $pk_value";
    if (mysql_query($sql)) {
        return true;
    }
    echo sql_error();
}

function to_thai_date($sql_date) {
    $arr_all_date = explode(" ", $sql_date);
    $arr_date = explode("-", $arr_all_date[0]);
    $y = $arr_date[0];
    $m = $arr_date[1];
    $d = $arr_date[2];
    
    $time = " ";
    if (!empty($arr_all_date[1])) {
        $time = $arr_all_date[1];
    }
    
    return "{$d}/{$m}/{$y}{$time}";
}

function to_mysql_date($thai_date) {
    $arr_date = explode("/", $thai_date);
    $y = $arr_date[2];
    $m = $arr_date[1];
    $d = $arr_date[0];
    
    return "{$y}-{$m}-{$d}";
}

function get_check_value($value) {
    $arr = array(
        "normal" => "มาเรียน",
        "no" => "ไม่มาเรียน",
        "late" => "มาสาย",
        "leave" => "ลา"
    );
    return $arr[$value];
}
?>

<?php
function thaiDate($date) {

	

//list($date,$time) = split(' ',$datetime); // แยกวันที่ กับ เวลาออกจากกัน

	

//list($H,$i,$s) = split(':',$time); // แยกเวลา ออกเป็น ชั่วโมง นาที วินาที

	

list($Y,$m,$d) = split('-',$date); // แยกวันเป็น ปี เดือน วัน

	

$Y = $Y+543; // เปลี่ยน ค.ศ. เป็น พ.ศ.

	


	

switch($m) {

	

	

case "01":

	

$m = "ม.ค."; break;

	

	

case "02":

	

$m = "ก.พ."; break;

	

	

case "03":

	

$m = "มี.ค."; break;

	

	

case "04":

	

$m = "เม.ย."; break;

	

	

case "05":

	

$m = "พ.ค."; break;

	

	

case "06":

	

$m = "มิ.ย."; break;

	

	

case "07":

	

$m = "ก.ค."; break;

	

	

case "08":

	

$m = "ส.ค."; break;

	

	

case "09":

	

$m = "ก.ย."; break;

	

	

case "10":

	

$m = "ต.ค."; break;

	

	

case "11":

	

$m = "พ.ย."; break;

	

	

case "12":

	

$m = "ธ.ค."; break;

	

}

	

	

return $d." ".$m." ".$Y;
}


function thaiMonth($date) {

	

//list($date,$time) = split(' ',$datetime); // แยกวันที่ กับ เวลาออกจากกัน

	

//list($H,$i,$s) = split(':',$time); // แยกเวลา ออกเป็น ชั่วโมง นาที วินาที

	

list($Y,$m,$d) = split('-',$date); // แยกวันเป็น ปี เดือน วัน

	

$Y = $Y+543; // เปลี่ยน ค.ศ. เป็น พ.ศ.

	


	

switch($m) {

	

	

case "01":

	

$m = "ม.ค."; break;

	

	

case "02":

	

$m = "ก.พ."; break;

	

	

case "03":

	

$m = "มี.ค."; break;

	

	

case "04":

	

$m = "เม.ย."; break;

	

	

case "05":

	

$m = "พ.ค."; break;

	

	

case "06":

	

$m = "มิ.ย."; break;

	

	

case "07":

	

$m = "ก.ค."; break;

	

	

case "08":

	

$m = "ส.ค."; break;

	

	

case "09":

	

$m = "ก.ย."; break;

	

	

case "10":

	

$m = "ต.ค."; break;

	

	

case "11":

	

$m = "พ.ย."; break;

	

	

case "12":

	

$m = "ธ.ค."; break;

	

}

	

	

return $m." ".$Y;
}

?>
