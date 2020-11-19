<?php
// Set session variables
// $_SESSION["name"] = "Nguyễn Đức Huy";
// $_SESSION["id"] = "Nguyenduchuyhn811@gmail.com";
// $_SESSION["pass"] = "huydeptrai";
echo "Session variables are set.";
// print_r($_SESSION);
session_destroy();  //xóa session ra khỏi bộ nhớ trên web
header("Location:". base_url()."/index.php",3);
die;
?>