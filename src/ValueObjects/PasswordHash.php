<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 9:32 AM
 */

namespace Domain\ValueObjects;


use Domain\Contracts\Crypto\HasherInterface;

/**
 * Class PasswordHash
 * @package Domain\ValueObjects
 */
final class PasswordHash
{
    /**
     * @var
     */
    private $hashedPassword;

    /**
     * PasswordHash constructor.
     * @param $hashedPassword
     */
    private function __construct($hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }

    /**
     * @param string $password
     * @param HasherInterface $hasherInterface
     * @return static
     */
    public static function fromPlaintextPasswordString(string $password, HasherInterface $hasherInterface)
    {
        return new static($hasherInterface->hashPassword($password));
    }

    /**
     * @param $hashedPassword
     * @return static
     */
    public static function fromPasswordHashString($hashedPassword)
    {
        return new static($hashedPassword);
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->hashedPassword;
    }
}