<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 4:39 PM
 */

namespace Dixons\Rouse;


interface IProductRepository
{
    public static function getInstance(): IProductRepository;
    public function findById(int $id): array;
}