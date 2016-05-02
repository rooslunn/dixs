<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 12:30 PM
 */

namespace Dixons\Rouse;


interface IRequestRegister
{
    public function increment(int $id);
    public function items(): array;
}