<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 14.02.17
 * Time: 03:15
 */

namespace Domain\Crypto\Hashing;



use Domain\Contracts\Crypto\HasherInterface;

/**
 * Class BcryptHasher
 * @package Domain\Crypto\Hashing
 */
class BcryptHasher implements HasherInterface
{
    /**
     * @param $input
     * @return string
     */
    public function hashPassword($input) : string
    {
        return password_hash($input, PASSWORD_BCRYPT);
    }

    /**
     * @param $plaintextPassword
     * @param $hashedPassword
     * @return bool
     */
    public function verifyPassword($plaintextPassword, $hashedPassword) : bool
    {
        return password_verify($plaintextPassword,$hashedPassword);
    }
}