<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/26/2017
 * Time: 3:22 AM
 */

namespace Domain\Api;


use Domain\Exceptions\ClientExceptions\NoRouteException;
use Domain\Exceptions\Http\HttpException;
use Domain\Exceptions\ServerExceptions\ServerException;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExceptionConverter
{
    /**
     * @param Exception $e
     * @return HttpException
     */
    public function convert(Exception $e)
    {
        if ($e instanceof HttpException)
        {
            return $e;
        }

        $e = $this->convertOtherExceptions($e);

        // Transform other unknown exceptions to ServerExceptions without passing the message along,
        // since the message might contain sensitive data that we dont want to expose.
        return new ServerException();
    }

    /**
     * Transform Framework or library Exceptions to Domain HttpExceptions in order to use them for the API response.
     *
     * @param $e
     * @return Exception
     */
    private function convertOtherExceptions($e)
    {
        if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException)
        {
            return new ClientException($e->getMessage(), $e->getStatusCode());
        }


        return $e;
    }
}