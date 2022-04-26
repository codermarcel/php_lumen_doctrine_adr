<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/25/2017
 * Time: 1:17 AM
 */

namespace App\Implementation\Validation;

use Domain\Exceptions\ClientExceptions\ValidationException;

class Validator
{
    /**
     * @param array $data
     * @param array $rules
     * @throws ValidationException
     * @return void
     */
    public function assertValid(array $data, array $rules)
    {
        $v = \Illuminate\Support\Facades\Validator::make($data, $rules);

        if ($v->fails())
        {
            throw ValidationException::error($v->errors()->first());
        }
    }
}