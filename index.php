<?php

include 'include.php';

theme_header('Home');
theme_navbar($verified_user, $roll);

?>
    <div class="col-lg-8 ">
    <img src="img/csebuilding.jpg" alt="..." class="img-thumbnail">
    <br />
    <br />
    
                <table class="table table-hover">
                <thead>
                  <tr>
                    <td  class="warning" colspan="2"><i class="fa fa-globe fa-lg"> CSE 500 Internet Programming Project</i></td>
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <td><i class="fa fa-star"> Project Superviser</i></td>
                    <td><strong>Boshir Ahmed</strong>,  Assistant Professor, CSE, RUET
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-tag"> Project Name</i></td>
                    <td>Student Information Registration and Browsing System
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-user"> Project Member 1</i></td>
                    <td><a href="details.php?roll=103001">Md. Minhazul Haque</a>, Roll # 103001
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-user"> Project Member 2</i></td>
                    <td><a href="details.php?roll=103022">Md. Omar Faruk</a>, Roll # 103022
                    </td>
                </tr>
                </tbody>
    
    </div>
<?
theme_footer();
db_close();

?>