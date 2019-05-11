<?php

namespace App\Components;

class QueryBuilderComponent{
    
    public function select($table) {
        return "select * from $table";
    }
}