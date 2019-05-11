<?php

namespace App\Components;

class QueryBuilderComponent{
    
    public function select($table, $columns = [], $order_by = []) {
        if (count($columns) && count($order_by)) {
            return "select ". implode(', ', $columns)." from $table order by ". implode(' ',$order_by);
        }
        if (count($columns)) {
            return "select ". implode(', ', $columns)." from $table";
        }
        return "select * from $table";
    }
}