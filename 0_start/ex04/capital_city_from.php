<?php

function capital_city_from( $city ) {
$states = [
'Oregon' => 'OR',
'Alabama' => 'AL',
'New Jersey' => 'NJ',
'Colorado' => 'CO',
];
$capitals = [
'OR' => 'Salem',
'AL' => 'Montgomery',
'NJ' => 'trenton',
'KS' => 'Topeka',
];

if (!isset( $states[ $city ] ) )
    return "Unknown";
if (!isset( $capitals[$states[$city]]))
    return "Unknown";
return $capitals[$states[$city]]."\n";
}
?>