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
        $fh = fopen(self::FILE_NAME, 'c+');
        if (false === $fh) {
            throw new \RuntimeException(sprintf("Can't open file %s", self::FILE_NAME));
        }
        $registerString = fread($fh, max(filesize(self::FILE_NAME), 1));
        $this->register = unserialize($registerString);
        if (false === $this->register) {
            $this->register = [];
        }
        fclose($fh);
    }

    public function __destruct()
    {
        $registerString = serialize($this->register);
        $fh = fopen(self::FILE_NAME, 'w');
        fwrite($fh, $registerString);
        fclose($fh);
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