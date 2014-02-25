<?php

include 'include.php';

$chpasswd_success = false;

if($_POST)
{
    $password = $_POST['password'];
    $chpasswd_query = 'update students set password=md5("'.$password.'") where roll='.$roll;

    if(db_exec_only($chpasswd_query))
        $chpasswd_success = true;
}

theme_header('Change Password');
theme_navbar($verified_user, $roll);

?>
        <div class="col-lg-8">
        </div>
        <h2><i class="fa fa-sign-in fa-fw"></i> Change Password <small>Change your login credential</small></h2>
        <div class="col-lg-5">
        <?
        if($chpasswd_success)
            chpasswd_success();
        else {
            if($_POST) {
                chpasswd_error();
            }
            theme_chpasswd_form();
        }
        ?>
        </div>
<?
theme_footer();
db_close();

?>
