<?php

namespace App\Providers;

use App\Implementation\Repository\DoctrineUserRepository;
use App\Service\BcryptHasher;
use Doctrine\ORM\EntityManagerInterface;
use Domain\Contracts\Crypto\HasherInterface;
use Domain\Contracts\Repository\UserRepository;
use Domain\Entities\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $em = app(EntityManagerInterface::class);
//
//        $this->app->bind(UserRepository::class, function() use($em){
//            return new DoctrineUserRepository(
//                $em->getRepository(User::class)
//            );
//        });
//
//        $this->app->bind(HasherInterface::class, BcryptHasher::class);
    }
}
