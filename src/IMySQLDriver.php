<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 11:29 AM
 */

namespace Dixons\Rouse;


interface IMySQLDriver
{
    /**
     * @param int $id
     * @return array
     */
    public function findProduct(int $id): array;
}