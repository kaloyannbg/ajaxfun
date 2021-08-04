<?php
error_reporting(0);

date_default_timezone_set('Europe/Sofia');

session_start();

$link = mysqli_connect("localhost", "root", "***", "4at") or die("DB conn error!");

function query($sql)
{
    $link = mysqli_connect("localhost", "root", "***", "4at") or die("DB conn error!");
    $newsql = mysqli_query($link, $sql)or die("<h1>Error in your SQL: $sql <br />".mysqli_error($link).'</h1>');
    return $newsql;
}
