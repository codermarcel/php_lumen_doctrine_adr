<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 10:20 AM
 */

namespace App\Implementation\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Domain\Contracts\Repository\UserRepository;
use Domain\Entities\User;

/**
 * Class AbstractDoctrineRepository
 * @package App\Implementation\Repositories
 */
class DoctrineUserRepository extends AbstractDoctrineRepository implements UserRepository
{
    public function findAll()
    {
        $queryBuilder = $this->queryBuilder
            ->select('u')
            ->from(User::class, 'u')
            ->setFirstResult(0)
            ->setMaxResults(2);

        return $paginator = new Paginator($queryBuilder, $fetchJoinCollection = true);
    }

    public function getUserWithUsername($input)
    {
        $query = $this->queryBuilder
            ->select('u.id')
            ->from('users', 'u')
            ->where('u.username', $input)
            ->getQuery();

        return $query->execute();
    }
}