<?php
include_once 'business.class.php';
class View{
    public static function  start($title){
        $html = "<!DOCTYPE html>
<html>
<head>
<meta charset=\"utf-8\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"estilos.css\">
<script src=\"scripts.js\"></script>
<title>$title</title>
</head>
<body>";
        User::session_start();
        echo $html;
    }
    public static function navigation(){
        echo '<nav>';
        echo '</nav>';
    }
    public static function end(){
        echo '</body>
</html>';
    }
}
