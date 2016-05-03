<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 11:27 AM
 */

namespace Dixons\Rouse;


class ElasticSearchRepository implements IElasticSearchDriver, IProductRepository
{
    use SingletonTrait;
    
    /**
     * @param int $id
     * @return array
     */
    public function findById(int $id): array {
        return [
            'id' => 1,
            'driver' => 'elastic',
            'name' => 'Name',
            'price' => 1.00,
        ];
    }
}