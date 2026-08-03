<?php
$myfile =fopen("ex01.txt", "r");
$parsedfile = fgetcsv($myfile);
for ($i = 0; $i < count($parsedfile); $i++)
    {
        echo $parsedfile[$i]."\n";
    }
fclose($myfile);
?>