<?php

namespace App\Components;

class QueryBuilderComponent{
    
    public function select($table, $option_1 = [], $option_2 = []) {
        if (gettype($option_1) === 'integer' && !count($option_2)) {
            return "select * from $table limit $option_1";
        }
        if (count($option_1) && !count($option_2)
            && is_array($option_1[0]) && is_array($option_1[1])) {
            return "select * from $table order by ". implode(' ', $option_1[0]).', '.implode(' ', $option_1[1]);
        }
        if (count($option_1) && count($option_2) && strtoupper($option_2[1]) == $option_2[1]) {
            return "SELECT ". implode(', ', $option_1)." FROM $table ORDER BY ". implode(' ',$option_2);
        }
        if (count($option_1) && count($option_2)) {
            return "select ". implode(', ', $option_1)." from $table order by ". implode(' ',$option_2);
        }
        if (count($option_1) && gettype($option_1[0]) === 'integer') {
            return "select * from $table limit $option_1[0] offset $option_1[1]";
        }
        if (count($option_1) && $option_1[0] == 'count') {
            return "select *, count(\"$option_1[1]\") from $table";
        }
        if (count($option_1) && $option_1[0] == 'max') {
            return "select max('$option_1[1]') from $table";
        }
        if (count($option_1) && $option_1[0] == 'group by') {
            return "select max('$option_1[1]') from $table group by $option_1[1]";
        }
        if (count($option_1)) {
            return "select ". implode(', ', $option_1)." from $table";
        }
        return "select * from $table";
    }
}