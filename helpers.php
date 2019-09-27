<?php

function format_node(Array $achievements){
    array_map( function ($achievements){
        return $achievements->achievement;
    }, $achievements->toArray());
}
