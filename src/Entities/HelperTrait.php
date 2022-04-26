<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/27/2017
 * Time: 5:14 AM
 */

namespace Domain\Entities;

use Ramsey\Uuid\Uuid;
use DateTime;
use Domain\Services\Time;

/**
 * Class HelperTrait
 * @package Domain\Entities
 */
trait HelperTrait
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     * @var DateTime
     */
    private $created_at;

    /**
     * @ORM\Column(name="updated_at", type="integer", nullable=false)
     * @var DateTime
     */
    private $updated_at;

    /**
     * Set up default values.
     */
    public function setup()
    {
        $this->id = Uuid::uuid4();
        $this->created_at = $this->now();
        $this->updated_at = $this->now();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return (string) $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param DateTime|null $updated_at
     */
    public function update(DateTime $updated_at = null)
    {
        $updated_at = ($updated_at === null) ? $this->now() : $updated_at;

        $this->updated_at = $updated_at;
    }

    /**
     * @return int
     */
    private function now()
    {
        return time();
    }
}