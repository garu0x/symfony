<?php

function capital_city_from( $state ) {
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

if (!isset( $states[ $state ] ) )
    return "Unknown";
if (!isset( $capitals[$states[$state]]))
    return "Unknown";
return $capitals[$states[$state]];
}

function get_state( $city ) {
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

    return array_search(array_search( $city, $capitals, true ), $states, true);
}

function is_a_state( $state ) {
    $states = [
    'Oregon' => 'OR',
    'Alabama' => 'AL',
    'New Jersey' => 'NJ',
    'Colorado' => 'CO',
    ];
    return isset($states[$state]);
}

function search_by_states( $string ) {
    $res = [];
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
    $arr = explode(',', $string);
    for ($i = 0; $i < count($arr); $i++ ) {
        $arr[$i] = trim($arr[$i]);
        if (isset($states[$arr[$i]])) {
            array_push($res, capital_city_from($arr[$i])."is the capital of ".$arr[$i].".");
            continue;
        }
        if (get_state( $arr[$i])) {
            array_push($res, $arr[$i]." is the capital of ".get_state( $arr[$i]).".");
        }
        else {
            array_push($res, $arr[$i]." is neither a capital nor a state.");
        }
    }
    return $res;
}
?>