<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/25/2017
 * Time: 6:24 AM
 */

namespace Domain\Exceptions\Http;


/**
 * Class HttpException
 * @package Domain\Exceptions
 */
class HttpException extends \Exception
{
    /**
     * @var string
     */
    private $httpMessage;

    /**
     * @var int
     */
    private $httpStatusCode;

    /**
     * HttpException constructor.
     * @param string $httpMessage
     * @param int $httpStatusCode
     */
    public function __construct(string $httpMessage, int $httpStatusCode)
    {
        $this->httpMessage = $httpMessage;
        $this->httpStatusCode = $httpStatusCode;

        parent::__construct($httpMessage);
    }

    /**
     * @return string
     */
    public function getHttpMessage()
    {
        return $this->httpMessage;
    }

    /**
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
}