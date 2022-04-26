<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 9:32 AM
 */

namespace Domain\ValueObjects;


class EmailAddress
{
    private $email;

    private function __construct($email)
    {
        $this->email = $email;
    }

    public static function fromString($input)
    {
        return new static($input);
    }

    public function __toString() : string
    {
        return $this->email;
    }
}