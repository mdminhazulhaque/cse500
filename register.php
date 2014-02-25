<?php

include 'include.php';


$user_exists = false;
$field_incomplete = false;
$register_success = false;

if($_POST)
{
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    if(empty($roll) or empty($name)) {
        $field_incomplete = true;
    }
    else {
        $result = db_select_where('students', 'roll', 'roll='.$roll);
        if($result) {
            $user_exists = true;
        }
        else {
        $register_query = sprintf('insert into students (roll,name,password) values (%d, "%s", md5("%s"))', $roll, $name, $password);
        if(db_exec_only($register_query)) {
            $register_success = true;
            }
        }
    }
}

theme_header('Register');
theme_navbar($verified_user, $roll);

?>
        <div class="col-lg-5">
        <h2><i class="fa fa-plus fa-fw"></i> Register <small>Add a new student to database</small></h2>
        <?
        if($user_exists) {
            reg_already_exists();
            theme_reg_form();
        } else if($field_incomplete) {
            reg_field_error();
            theme_reg_form();
        } else if($register_success) {
            reg_success();
            
        } else {
            echo $register_query;
            theme_reg_form();
        }
        ?>
        </div>
<?
theme_footer();
db_close();

?>
