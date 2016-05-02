<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 11:30 AM
 */

namespace Dixons\Rouse;

use Dixons\Rouse\ProductRepository;

class ProductController
{
    /**
     * @param int $id
     * @return string
     */
    public function detail(int $id): string {
        $repository = ProductRepository::getInstance();
        $result = $repository->findInCache($id);
        if (0 === count($result)) {
            $result = $repository->findInElastic($id); // or $repository->findInMySQL($id);
            $repository->storeInCache($id, $result);
        }
        return json_encode($result);
    }

    public function registerReport(): string {
        $repository = ProductRepository::getInstance();
        return json_encode($repository->requestRegister()->items());
    }
}