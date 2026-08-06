<?php
require "TemplateEngine.php";
require_once "Text.php";
$engine = new TemplateEngine();
$text = new Text(["auteur","Thomas", "nom","Hello", "10"]);
$engine->createFile("test.html", $text);
?>