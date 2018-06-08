<?php

/**
 * Created by PhpStorm.
 * User: Matt_
 * Date: 12/10/2016
 * Time: 11:08
 */

namespace  UPEC\Models;

class Model
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

}