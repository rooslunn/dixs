<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 11:39 AM
 */

namespace Dixons\Rouse;


class ProductRepository
{
    static protected $instance;

    protected $cacheDriver;
    protected $mysqlDriver;
    protected $elasticSearchDriver;
    protected $requestRegister;

    public static function getInstance(): ProductRepository {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function __construct() {
        $this->cacheDriver = new FileSystemCacheDriver();
        $this->mysqlDriver = new MySQLDriver();
        $this->elasticSearchDriver = new ElasticSearchDriver();
        $this->requestRegister = new RequestRegisterFile();
    }

    protected function storeInCache(int $id, array $product) {
        $this->cacheDriver->put($id, $product);    
    }
    
    protected function findInCache(int $id): array {
        return $this->cacheDriver->get($id);
    }

    protected function findInMySQL(int $id): array {
        return $this->mysqlDriver->findProduct($id);
    }

    protected function findInElastic(int $id): array {
        return $this->elasticSearchDriver->findById($id);
    }
    
    public function findById(int $id): array {
        $result = $this->findInCache($id);
        if (0 === count($result)) {
            $result = $this->findInElastic($id); // or $repository->findInMySQL($id);
            $this->storeInCache($id, $result);
        }
        $this->requestRegister->increment($id);
        return $result;
    }
    
    public function requestRegister(): IRequestRegister {
        return $this->requestRegister;
    }
}