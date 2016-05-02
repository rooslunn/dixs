<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 12:00 PM
 */

namespace Dixons\Rouse;

use Dixons\Rouse\ICacheDriver;

class FileSystemCacheDriver implements ICacheDriver
{

    public function get(int $id): array
    {
        return [];
    }

    public function put(int $id, array $info)
    {
        // TODO: Implement put() method.
    }
}