<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 10:20 AM
 */

namespace App\Implementation\Repository;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Domain\Contracts\Repository\Repository;
use Domain\Exceptions\Http\ClientException;

/**
 * Class AbstractDoctrineRepository
 * @package App\Implementation\Repository
 */
class AbstractDoctrineRepository implements Repository
{
    /**
     * @var ObjectRepository
     */
    protected $genericRepository;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var \Doctrine\ORM\QueryBuilder
     */
    protected $queryBuilder;

    /**
     * AbstractRepository constructor.
     *
     * @param ObjectRepository $genericRepository
     * @param EntityManagerInterface $em
     */
    public function __construct(ObjectRepository $genericRepository, EntityManagerInterface $em = null)
    {
        $this->genericRepository = $genericRepository;
        $this->em = $em ?: app(EntityManagerInterface::class);
        $this->queryBuilder = $this->em->createQueryBuilder();
    }

    /**
     * @param $identifier
     * @return mixed
     */
    public function find($identifier)
    {
        return $this->genericRepository->find($identifier);
    }

    /**
     * @param $identifier
     * @throws ClientException
     * @return mixed
     */
    public function get($identifier)
    {
        $result = $this->find($identifier);

        if (is_null($result))
        {
            throw ClientException::notFound();
        }

        return $result;
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function add($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function delete($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        return $this->add($entity);
    }
}