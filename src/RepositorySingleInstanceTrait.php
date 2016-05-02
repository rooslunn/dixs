<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 5:00 PM
 */

namespace Dixons\Rouse;


trait RepositorySingleInstanceTrait
{
    static protected $instance;
    
    public static function getInstance(): IProductRepository
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

}