<?php

class BaseModel extends BaseEntity {
    
    private $table;

    public function __construct($table){
        $this->table = (string) $table;
        parent::__construct($table);
    }
}