<?php
require "TemplateEngine.php";
$engine = new TemplateEngine();
$engine->createFile("test.html", "book_description.html", array("auteur" => "Thomas", "nom" => "Hello", "description" => "Ok", "prix" => "10"));
?>