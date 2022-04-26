<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 10:07 AM
 */

namespace Domain\Contracts\Repository;

use Domain\Exceptions\ClientExceptions\NotFoundException;

/**
 * Interface Repository
 * @package Domain\Contracts\Repository
 */
interface Repository
{
    /**
     * @param $entity
     * @return mixed
     */
    public function add($entity);

    /**
     * @param $entity
     * @return mixed
     */
    public function delete($entity);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $id
     * @throws NotFoundException
     * @return mixed
     */
    public function get($id);
}