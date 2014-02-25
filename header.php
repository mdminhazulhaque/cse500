<?php

function theme_header($page_title = 'Page')
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><? echo $page_title . ' | ' . site_name; ?></title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/fa.css" rel="stylesheet" />
    <link href="css/datepicker3.css" rel="stylesheet" />
    <link rel="shortcut icon" href="favicon.ico?v=2" />
    <style>
    </style>
  </head>
  <body>
    <div id="wrapper">
<?php
}