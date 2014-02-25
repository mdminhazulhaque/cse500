<?php

include 'include.php';

if(empty($_GET['roll']))
    $_GET['roll'] = $roll;

$student = db_select_where('students', 'roll,name,birthdate,email,cell_number,emergency_number,hall_name,room_no,address', 'roll='.$_GET['roll']);
$student = $student[0];
$fields = array_keys($student);

foreach(db_select('icons', 'field,icon') as $icon)
    $icons[$icon['field']] = $icon['icon'];

theme_header($student['name']);
theme_navbar($verified_user, $roll);

if($verified_user) {
?>
            <div class="col-lg-9">
            <h2><i class="fa fa-user fa-fw"></i><? echo $student['name']; ?> <small>Details</small></h2>
            </div>
            <div class="col-lg-8">
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                <?
                foreach($fields as $key)
                {
                ?>
                  <tr>
                    <td><i class="fa <? echo $icons[$key]; ?>"> <? echo ucfirst(str_replace('_', ' ',$key)); ?></i></td>
                    <td><?
                    if($key=='birthdate')echo date("d-F-Y", strtotime($student[$key])); else echo $student[$key]; ?></td>
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