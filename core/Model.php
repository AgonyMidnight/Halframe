<?php

namespace Core;

class Model
{
    public $arrayDate;
    private static $obj_DB;

    public function __construct()
    {
        self::$obj_DB = new DB();
    }

    public function getTable(int $number) : array
    {
        $this->arrayDate[] = array();
        foreach (self::$obj_DB->getArayDate($number) as $value) {
            $this->arrayDate[] = $value;
        }
        return $this->arrayDate;
    }

}