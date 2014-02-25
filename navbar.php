<?php

function theme_navbar($show_profile = false, $roll = 0)
{
?>
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><i class="fa fa-keyboard-o fa-lg"> <?php echo site_name; ?></i></a>
        </div>

        <!-- Page Links -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <?
            foreach(db_select('pages', 'name, path, icon') as $page) {
                echo '<li';
                if(basename($_SERVER['PHP_SELF']) == $page['path'])
                    echo ' class="active"';
                echo '><a href="' . $page['path'] . '"><i class="fa ' . $page['icon']. ' fa-lg"> ' . $page['name'] . '</i></a></li>' . PHP_EOL;
            }
            ?>
          </ul>
          
          <!-- Profile -->
          <?
          if($show_profile) {
          $name = db_select_where('students', 'name', 'roll='.$roll);
          $name = $name[0];
          ?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <? echo $name['name'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="details.php?roll=<? echo $roll; ?>"><i class="fa fa-user"></i> View My Profile</a></li>
                <li><a href="edit.php"><i class="fa fa-edit"></i> Edit My Profile</a></li>
                <li><a href="change.php"><i class="fa fa-unlock"></i> Change Password</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
          <?
          }
          ?>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
<?php
}