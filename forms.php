<?php

function theme_reg_form() {
?>
        <form role="form" method="post">
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-star fa-lg"> Roll Number</i></label>
                    <input class="form-control" name="roll" placeholder="Enter your roll number" />
                </div>
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-user fa-lg"> Name</i></label>
                    <input class="form-control" name="name" placeholder="Enter your name" />
                </div>
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-key fa-lg"> Password</i></label>
                    <input class="form-control" name="password" placeholder="Enter a password" value="<? echo rand_pass(); ?>" />
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">Register</button>
                </div>
        </form>
<?
}

function theme_login_form() {
?>
        <form role="form" method="post">
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-star fa-lg"> Roll Number</i></label>
                    <input class="form-control" name="roll" placeholder="Enter your roll number" />
                </div>
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-key fa-lg"> Password</i></label>
                    <input type="password" class="form-control" name="password" placeholder="Enter a password" />
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit">Login</button>
                </div>
        </form>
<?
}

function theme_chpasswd_form() {
?>
        <form role="form" method="post">
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-unlock fa-lg"> Password</i></label>
                    <input type="password" class="form-control" name="password" placeholder="Enter new password" />
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Change Password</button>
                </div>
        </form>
<?
}

function theme_delete_form() {
?>
        <form role="form" method="post">
                <div class="form-group">
                    <input type="hidden" name="confirm" value="yes" />
                    <button class="btn btn-danger" type="submit">Yes, Delete My Account</button>
                    <a class="btn btn-success" href="details.php">No, Take Me To My Profile</a>
                </div>
        </form>
<?
}


