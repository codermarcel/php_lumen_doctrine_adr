<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/27/2017
 * Time: 5:26 AM
 */

namespace Domain\Actions;

use Domain\Exceptions\ClientExceptions\NullException;
use Domain\Exceptions\ClientExceptions\ParameterNotSuppliedException;

/**
 * Class AbstractAction
 * @package Domain\Actions
 */
abstract class AbstractAction
{
    /**
     * @param array $array
     * @param $key
     * @return mixed
     * @throws ParameterNotSuppliedException
     */
    public function getArrayValue(array $array, $key)
    {
        if ( ! isset($array[$key]))
        {
            throw ParameterNotSuppliedException::notSupplied($key);
        }

        return $array[$key];
    }

    /**
     * @param array $array
     * @param $key
     * @return mixed
     * @throws NullException
     * @throws ParameterNotSuppliedException
     */
    public function getArrayValueAndValueIsNotNullOrEmpty(array $array, $key)
    {
        $value = $this->getArrayValue($array, $key);

        if ($value === null || empty($value))
        {
            throw NullException::inputParameterIsNull($key);
        }

        return $value;
    }
}