<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 11:36 AM
 */

namespace Dixons\Rouse;


interface ICacheDriver
{
    public function get(int $id): array;
    public function put(int $id, array $info);
}