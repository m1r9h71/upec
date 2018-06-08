<?php
/**
 * Created by PhpStorm.
 * User: Matt_
 * Date: 12/10/2016
 * Time: 11:04
 */

namespace UPEC\Controllers;


use Interop\Container\ContainerInterface;

class Controller
{

    protected $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function __get($name)
    {
        if($this->ci->has($name)){
            return $this->ci->get($name);
        }
    }

}