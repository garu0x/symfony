<?php
echo "My first variables:";
$a = 10;
$b = "10";
$c = "ten";
$d = doubleval( $a );
printf("a contains: %s and has type: %s\n", $a, gettype($a));
printf("b contains: %s and has type: %s\n", $b, gettype($b));
printf("c contains: %s and has type: %s\n", $c, gettype($c));
printf("d contains: %s and has type: %s\n", $d, gettype($d));
?>