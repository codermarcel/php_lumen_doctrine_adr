<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/24/2017
 * Time: 10:12 PM
 */

namespace Domain\Actions;

use Domain\Contracts\Crypto\HasherInterface;
use Domain\Contracts\Repository\UserRepository;
use Domain\Entities\User;
use Domain\ValueObjects\EmailAddress;
use Domain\ValueObjects\PasswordHash;
use Domain\ValueObjects\Username;

/**
 * Class CreateUserAction
 * @package Domain\Actions
 */
class CreateUserAction extends AbstractAction
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var HasherInterface
     */
    private $hasher;

    /**
     * CreateUserAction constructor.
     * @param UserRepository $users
     * @param HasherInterface $hasher
     */
    public function __construct(UserRepository $users, HasherInterface $hasher)
    {
        $this->users = $users;
        $this->hasher = $hasher;
    }

    /**
     * @param $username
     * @param $password
     * @param $email
     *
     * @return User
     */
    public function __invoke($username, $password, $email)
    {
        $pwhash   = PasswordHash::fromPasswordHashString($this->hasher->hashPassword($password));
        $username = Username::fromString($username);
        $email    = EmailAddress::fromString($email);

        $user = new User($username, $pwhash, $email);

        $this->users->add($user);

        return $user;
    }
}