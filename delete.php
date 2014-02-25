<?php

include 'include.php';

if($_POST)
{
    $confirm = $_POST['confirm'];
    $delete_query = 'delete from students where roll='.$roll;

    if(db_exec_only($delete_query)) {
        header('Location: index.php');
    }
        
}

theme_header('Delete Account');
theme_navbar($verified_user, $roll);

?>
        <div class="col-lg-9">
        <h2><i class="fa fa-ban fa-fw"></i>Delete Account <small>Remove your all details</small></h2>
        <h3>Are you sure that you want to delete your account?</h3>
        <?
        theme_delete_form();
        ?>
        </div>
<?
theme_footer();
db_close();

?>
