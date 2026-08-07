<?php
require_once "TemplateEngine.php";
require_once "Elem.php";
try {
$elem = new Elem('html');
$engine = new TemplateEngine($elem);
$body = new Elem('body');
$body->pushElement(new Elem('p', 'Lorem ipsum', ['class' => 'text-muted']));
} catch (MyException $e) {
    echo $e->getMessage();
}
$elem->pushElement($body);
echo $elem->getHTML();
if ($elem->validPage())
    echo 'True';
else
    echo 'False';
$engine->createFile("test.html");
?>