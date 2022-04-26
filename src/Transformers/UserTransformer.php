<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/23/2017
 * Time: 7:37 PM
 */

namespace Domain\Transformers;


use Domain\Entities\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public static function transform(User $user)
    {
        return [
            'id'       => (string) $user->getIdentifier(),
            'username' => (string) $user->getUsername(),
            'email'    => (string) $user->getEmailAddress(),
        ];
    }
}