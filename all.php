<?php

include 'include.php';

theme_header('All Students');
theme_navbar($verified_user, $roll);

if($verified_user) {
?>
            <div class="col-lg-6">
            <h2><i class="fa fa-list fa-fw"></i> All Students <small>Roll and Name of all students</small></h2>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-list-ol"> Roll</i></th>
                    <th><i class="fa fa-user"> Name</i></th>
                  </tr>
                </thead>
                <tbody>
                <?
                foreach(db_select('students', 'roll, name') as $student)
                {
                ?>
                  <tr>
                    <td><a class="btn btn-link" href="details.php?roll=<? echo $student['roll']; ?>"><? echo $student['roll']; ?></a></td>
                    <td><a class="btn btn-link" href="details.php?roll=<? echo $student['roll']; ?>"><? echo $student['name']; ?></a></td>
                  </tr>
                <?
                }
                ?>
                </tbody>
              </table>
              </div>
              </div>
<?
}

else
    access_error();
    
theme_footer();
db_close();

?>