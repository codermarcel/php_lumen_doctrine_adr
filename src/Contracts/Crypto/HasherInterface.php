<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 9:34 AM
 */

namespace Domain\Contracts\Crypto;

interface HasherInterface
{
    /**
     * @param $input
     * @param null $salt
     * @return String
     */
    public function hashPassword($input) : string;

    /**
     * @param $plaintextPassword
     * @param $hashedPassword
     * @param null $salt
     * @return bool
     */
    public function verifyPassword($plaintextPassword, $hashedPassword) : bool;
}