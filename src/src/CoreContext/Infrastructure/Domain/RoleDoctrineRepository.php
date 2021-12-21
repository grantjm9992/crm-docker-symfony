<?php

namespace App\CoreContext\Infrastructure\Domain;

use App\CoreContext\Domain\Model\Role;
use App\CoreContext\Domain\Model\RoleRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RoleDoctrineRepository extends ServiceEntityRepository implements RoleRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = Role::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function byId(string $id): ?Role
    {
        return $this->find($id);
    }

    public function save(Role $role): void
    {
        $this->_em->persist($role);
    }

    public function byName(string $name): ?Role
    {
        return $this->createQueryBuilder('role')
            ->andWhere('role.name = :name')
            ->setParameter('name', $name)
            ->getQuery()->getOneOrNullResult();
    }
}