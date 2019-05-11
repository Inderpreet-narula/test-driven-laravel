<?php

namespace App\Components;

class QueryBuilderComponent{
    
    public function select($table, $columns = []) {
        if (count($columns)) {
            return "select ". implode(', ', $columns)." from $table";
        }
        return "select * from $table";
    }
}