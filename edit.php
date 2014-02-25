<?php

include 'include.php';

$success = false;

if($_POST)
{
    $querystr = "update students set ";
    $params = array();
    foreach($_POST as $key => $value)
    {
        if($key != 'roll')
            $params[] = $key . '="' . mysql_escape_string($value) . '"';
    }
    $querystr = $querystr . join(', ', $params) . ' where roll = ' . $roll;
    $success = db_exec_only($querystr);
}

$student = db_select_where('students', 'roll,name,birthdate,email,cell_number,emergency_number,hall_name,room_no,address', 'roll='.$roll);
$student = $student[0];
$fields = array_keys($student);

foreach(db_select('icons', 'field,icon') as $icon)
    $icons[$icon['field']] = $icon['icon'];

theme_header('Edit Profile | ' . $student['name']);
theme_navbar($verified_user, $roll);

if($verified_user) {
?>
        <div class="col-lg-9">
        <h2><i class="fa fa-user fa-fw"></i><? echo $student['name']; ?><small> Edit details</small></h2>
        </div>
        <div class="col-lg-5">
        <?
        if($_POST) {
        if($success) {
        ?>
        <div class="alert alert-success">
              Details successfully updated
        </div>
        <?
        }
        else {
        ?>
        <div class="alert alert-danger">
              Details update failed
        </div>
        <?
        }
        }
        ?>
        <form role="form" method="post">
            <?
            foreach($fields as $key)
            {
                $label = ucfirst(str_replace('_', ' ',$key))
                ?>
                <div class="form-group" <? if($key=='birthdate') echo 'id="date"' ?>>
                    <label><i class="fa <? echo $icons[$key]; ?> fa-lg"> <? echo $label; ?></i></label>
                    <?
                    if($key == 'address') {
                    ?>
                    <textarea class="form-control" name="address" placeholder="Enter Address" rows="3"><? echo $student[$key]; ?></textarea>
                    <?
                    } else {
                    ?>
                    <input class="form-control" name="<? echo $key ?>" placeholder="Enter <? echo $label ?>" value="<? echo $student[$key]; ?>" <? if($key=='roll') echo 'disabled'; ?>>
                    <?
                    }
                    ?>
                </div>
                <?
            }
            ?>
            <div class="form-group">
                <button class="btn btn-info" type="submit">Save</button>
                <a class="btn btn-danger" href="delete.php">Delete Account</a>
            </div>
        </form>
        </div>
<?
}

else
    access_error();
    
theme_footer();
db_close();

?>