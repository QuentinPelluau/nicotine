<?php


function al_example_filter($a, $b)
{

    $val = (int) $a + (int) $b;

    $val = apply_filters( 'al_filter_example_values', $val, $a, $b );

    return $val;

}