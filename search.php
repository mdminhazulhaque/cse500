<?php

include 'include.php';

theme_header('Search Students');
theme_navbar($verified_user, $roll);

$success = false;

if($_POST)
{
    $search_text = $_POST['search'];
    if(strlen($search_text) != 0)
    {   
        $search_result = db_select_where('students', 'roll, name', 'concat(roll,name,birthdate,email,cell_number,emergency_number,hall_name,room_no,address) like \'%'. mysql_escape_string($search_text).'%\'');
        if($search_result)
            $success = true;
    }
}

if($verified_user) {
?>
        <div class="col-lg-9">
        <h2><i class="fa fa-search fa-fw"></i>Search Students <small>Find students by roll, name or any text</small></h2>
        </div>
        <div class="col-lg-5">
        <?
        if($_POST) {
        if($success) {
        ?>
        <div class="alert alert-success">
              The following records were found matching search criteria
        </div>
        <?
        }
        else {
        ?>
        <div class="alert alert-danger">
              No match found
        </div>
        <?
        }
        }
        ?>
        <form role="form" method="post">
                <div class="form-group input-group">
                    <input class="form-control" name="search" placeholder="Enter roll, name or any term to match" value="<? if($_POST) echo $search_text; ?>">
                    <span class="input-group-btn"><button class="btn btn-info" type="submit">Search</button></span>
            </div>
        </form>
        <?
        if($success) {
        ?>
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th><i class="fa fa-list-ol fa-lg"> Roll</i></th>
                    <th><i class="fa fa-male fa-lg"> Name</i></th>
                  </tr>
                </thead>
                <tbody>
                <?
                foreach($search_result as $student)
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
              <?
              }
              ?>              
        </div>
<?
}

else
    access_error();
    
theme_footer();
db_close();

?>