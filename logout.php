<?php

include 'include.php';

$logout_success = false;
$roll = $_COOKIE['roll'];

if($roll) {
    setcookie("roll","");
    setcookie("token","");

    $logout_query = 'update students set token="" where roll='.$roll;

    $logout_success = db_exec_only($logout_query);
}
        
theme_header('Logout');
theme_navbar();

?>
        <div class="col-lg-5">
            <h2>Logout <small>End your session</small></h2>
            <?
            if($logout_success)
                logout_success();
            else
                logout_error();           
            
            ?>
        </div>
<?
theme_footer();
db_close();

?>
