<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/25/2017
 * Time: 6:29 AM
 */

namespace Domain\Exceptions\Http;


use Domain\Exceptions\Http\HttpException;

class ServerException extends HttpException
{
    public function __construct($message = 'An internal error has occurred.', $code = 500)
    {
        parent::__construct($message, $code);
    }
}