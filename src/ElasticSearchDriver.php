<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 11:27 AM
 */

namespace Dixons\Rouse;


class ElasticSearchDriver implements IElasticSearchDriver
{
    /**
     * @param int $id
     * @return array
     */
    public function findById(int $id): array {
        return [];
    }
}