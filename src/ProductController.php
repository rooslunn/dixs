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
        return json_encode($repository->findById($id));
    }

    /**
     * @return string
     */
    public function registerReport(): string {
        $repository = ProductRepository::getInstance();
        return json_encode($repository->requestRegister()->items());
    }
}