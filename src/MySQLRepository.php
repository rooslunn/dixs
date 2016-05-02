<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 11:29 AM
 */

namespace Dixons\Rouse;


class MySQLRepository implements IMySQLDriver, IProductRepository
{
    use RepositorySingleInstanceTrait;
    
    /**
     * @param int $id
     * @return array
     */
    public function findProduct(int $id): array 
    {
        return [
            'id' => 1,
            'driver' => 'mysql',
            'name' => 'Name',
            'price' => 1.00,
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function findById(int $id): array
    {
        return $this->findProduct($id);
    }

}