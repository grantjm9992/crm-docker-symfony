<?php

namespace App\CoreContext\Infrastructure\Domain;

use App\CoreContext\Domain\Model\User;
use App\CoreContext\Domain\Model\UserRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserDoctrineRepository extends ServiceEntityRepository implements UserRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = User::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function byId(string $id): ?User
    {
        return $this->find($id);
    }

    public function save(User $user): void
    {
        $this->_em->persist($user);
    }

    public function byEmail(string $email): ?User
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.email = :email')
            ->setParameter('email', $email)
            ->getQuery()->getOneOrNullResult();
    }


    public function byEmailAndPassword(string $email, string $password): ?User
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.email = :email')
            ->andWhere('user.password = :password')
            ->setParameter('email', $email)
            ->setParameter('password', $password)
            ->getQuery()->getOneOrNullResult();
    }

    public function byApiToken(string $apiToken): ?User
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.apiToken = :apiToken')
            ->setParameter('apiToken', $apiToken)
            ->getQuery()->getOneOrNullResult();
    }
}