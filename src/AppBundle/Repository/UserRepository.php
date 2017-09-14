<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use UnexpectedValueException;
use Doctrine\ORM\EntityRepository;

/**
 * Class UserRepository
 *
 * @package AppBundle\Repository
 */
class UserRepository extends EntityRepository
{
    /**
     * @param int $id
     *
     * @return User
     */
    public function findById(int $id): User
    {
        $user = $this->createQueryBuilder('u')
            ->where('u.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getOneOrNullResult();
        if (!$user instanceof User) {
            throw new UnexpectedValueException('User Not found! Check ID parameter please');
        }

        return $user;
    }
}
