<?php

include 'include.php';

$login_success = false;

if($_POST)
{
    $roll = $_POST['roll'];
    $password = $_POST['password'];
    
    $result = db_select_where('students', 'roll,name', 'roll='.$roll.' and md5("'.$password.'")=password');
    
    if($result) {
        $token = uniqid();
        
        setcookie("roll",$roll);
        setcookie("token",$token);
        
        $login_query = 'update students set token="'.$token.'" where roll='.$roll;
        
        if(db_exec_only($login_query))
            $login_success = true;
    }
}

theme_header('Login');
theme_navbar($login_success, $roll);

?>
        <div class="col-lg-5">
        <h2><i class="fa fa-sign-in fa-fw"></i> Login <small>Get access student database</small></h2>
        <?
        if($login_success)
            login_success();
        else {
            if($_POST) {
                login_error();
            }
            theme_login_form();
        }
        ?>
        </div>
<?
theme_footer();
db_close();

?>
