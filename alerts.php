<?php
function reg_already_exists() {
?>
<div class="alert alert-danger">
    An user already exists with provided roll or email
</div>
<?
}

function reg_field_error() {
?>
<div class="alert alert-danger">
    Please complete all fields
</div>
<?
}

function reg_success() {
?>
<div class="alert alert-success">
    Roll successfully registered
</div>
<?
}

function login_success() {
?>
<div class="alert alert-success">
    You have been successfully logged in
</div>
<?
}

function login_error() {
?>
<div class="alert alert-danger">
    Login failed
</div>
<?
}

function logout_success() {
?>
<div class="alert alert-success">
    You have been successfully logged out
</div>
<?
}

function logout_error() {
?>
<div class="alert alert-danger">
    You are not logged in
</div>
<?
}

function access_error() {
?>
<div class="col-lg-4">
    <div class="alert alert-danger">
        You must log in to access the page
    </div>
</div>    
<?
}

function chpasswd_error() {
?>
<div class="alert alert-danger">
    Failed to change password
</div>
<?
}

function chpasswd_success() {
?>
<div class="alert alert-success">
    Password successfully changed
</div>
<?
}
