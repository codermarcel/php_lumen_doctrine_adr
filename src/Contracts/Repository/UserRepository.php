<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 10:07 AM
 */

namespace Domain\Contracts\Repository;


interface UserRepository extends Repository
{
    public function getUserWithUsername($input);
    public function findAll();
}