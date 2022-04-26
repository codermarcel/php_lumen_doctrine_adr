<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 12.02.17
 * Time: 07:00
 */

namespace Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use Domain\ValueObjects\Money\Usd;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
    use HelperTrait;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, unique=false)
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products")
     * @var User
     */
    private $owner;

    /**
     * Product constructor.
     * @param $name
     * @param $description
     * @param Usd $price
     * @param User $owner
     */
    public function __construct($name, $description = null, Usd $price, User $owner)
    {
        $this->setup();

        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Usd
     */
    public function getPrice()
    {
        return (string) $this->price;
    }

    /**
     * @param Usd $price
     * @return Product
     */
    public function setPrice(Usd $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return User
     */
    public function getOwnerIdentifier()
    {
        return $this->owner->getIdentifier();
    }
}