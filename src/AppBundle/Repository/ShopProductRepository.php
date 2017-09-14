<?php

namespace AppBundle\Repository;

use AppBundle\Entity\ShopProduct;
use Doctrine\ORM\EntityRepository;

/**
 * Class ShopPurchaseRepository
 * 
 * @package AppBundle\Repository
 */
class ShopProductRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAllAndOrdered()
    {
        return $this->createQueryBuilder('sp')
            ->orderBy('sp.priority')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param int $id
     *
     * @return ShopProduct
     */
    public function findById($id)
    {
        return $this->createQueryBuilder('sp')
            ->andWhere('sp.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
