<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 12:31 PM
 */

namespace Dixons\Rouse;


class RequestRegisterFile implements IRequestRegister
{
    use SingletonTrait;

    const FILE_NAME = 'requests.rep';

    protected $register = [];

    protected function init() {
        if (! file_exists(self::FILE_NAME)) {
            touch(self::FILE_NAME);
            $this->register = [];
        } else {
            $registerString = file_get_contents(self::FILE_NAME);
            if ($registerString === FALSE) {
                throw new \RuntimeException(sprintf("Can't open file %s", self::FILE_NAME));
            }
            $this->register = unserialize($registerString);
        }
    }

    public function __destruct()
    {
        file_put_contents(self::FILE_NAME, serialize($this->register));
    }

    public function increment(int $id)
    {
        if (! array_key_exists($id, $this->register)) {
            $this->register[$id] = 0;
        }
        ++$this->register[$id];
    }

    public function items(): array {
        return $this->register;
    }
}