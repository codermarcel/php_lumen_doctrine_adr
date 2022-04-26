<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/3/2017
 * Time: 9:31 AM
 */

namespace Domain\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Domain\ValueObjects\EmailAddress;
use Domain\ValueObjects\PasswordHash;
use Domain\ValueObjects\Username;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class User
{
    use HelperTrait;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=99, unique=false)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="users", cascade={"persist"})
     * @var ArrayCollection|Product[]
     */
    private $products;

    /**
     * User constructor.
     * @param $username
     * @param $email
     * @param $password
     * @param ArrayCollection|Product[] $products
     */
    public function __construct(Username $username, EmailAddress $email, PasswordHash $password)
    {
        $this->setup();

        $this->username = (string) $username;
        $this->email    = (string) $email;
        $this->password = (string) $password;
        $this->products = new ArrayCollection();
    }

    /**
     * @return Username
     */
    public function getUsername()
    {
        return Username::fromString($this->username);
    }

    /**
     * @param Username $username
     * @return $this
     */
    public function changeUsername(Username $username)
    {
        $this->username = $username;

        $this->update();

        return $this;
    }

    /**
     * @param PasswordHash $passwordHash
     * @return $this
     */
    public function changePassword(PasswordHash $passwordHash)
    {
        $this->password = $passwordHash;

        return $this;
    }

    /**
     * @return PasswordHash
     */
    public function getPassword()
    {
        return PasswordHash::fromPasswordHashString($this->password);
    }


    /**
     * @return EmailAddress
     */
    public function getEmailAddress()
    {
        return EmailAddress::fromString($this->email);
    }

    /**
     * @param EmailAddress $email
     * @return $this
     */
    public function changeEmailAddress(EmailAddress $email)
    {
        $this->email = $email;

        return $this;
    }
}