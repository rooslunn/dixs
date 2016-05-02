<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 4:45 PM
 */

namespace Dixons\Rouse;


class FindProductUseCase
{
    protected $repository;
    protected $cacheDriver;
    protected $requestRegister;

    public function __construct(IProductRepository $repository, ICacheDriver $cacheDriver, IRequestRegister $requestRegister)
    {
        $this->repository = $repository;
        $this->cacheDriver = $cacheDriver;
        $this->requestRegister = $requestRegister;
    }

    public function execute(int $id): array {
        $result = $this->cacheDriver->get($id);
        if (0 === count($result)) {
            $result = $this->repository->findById($id);
            $this->cacheDriver->put($id, $result);
        }
        $this->requestRegister->increment($id);
        return $result;
    }
}