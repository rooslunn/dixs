<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 11:30 AM
 */

namespace Dixons\Rouse;


class ProductController
{
    /**
     * @param int $id
     * @return string
     */
    public function detail(int $id): string {
        $useCase = new FindProductUseCase(
            ElasticSearchRepository::getInstance(),
//            MySQLRepository::getInstance(),
            new FileSystemCacheDriver(),
            new RequestRegisterFile());
        return json_encode($useCase->execute($id));
    }

}