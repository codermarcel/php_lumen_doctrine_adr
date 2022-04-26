<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 9:46 AM
 */

namespace Domain\ValueObjects;


class Username
{
    private $username;

    private function __construct($username)
    {
        $this->username = $username;
    }

    public static function fromString($input)
    {
        return new static($input);
    }

    public function __toString() : string
    {
        return $this->username;
    }
}