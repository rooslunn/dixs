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

    public function storeInCache(int $id, array $product) {
        $this->cacheDriver->put($id, $product);    
    }
    
    public function findInCache(int $id): array {
        $this->requestRegister->increment($id);
        return $this->cacheDriver->get($id);
    }

    public function findInMySQL(int $id): array {
        $this->requestRegister->increment($id);
        return $this->mysqlDriver->findProduct($id);
    }

    public function findInElastic(int $id): array {
        $this->requestRegister->increment($id);
        return $this->elasticSearchDriver->findById($id);
    }
    
    public function requestRegister(): IRequestRegister {
        return $this->requestRegister;
    }
}