<?php
require_once "TemplateEngine.php";
require_once "Coffee.php";
$engine = new TemplateEngine();
$Coffee = new Coffee();
$Tea = new Tea();
$engine->createFile($Coffee);
$engine->createFile($Tea);
?>