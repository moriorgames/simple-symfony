<?php

namespace AppBundle\Repository;

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
    public function findAllOrdered()
    {
        return $this->createQueryBuilder('sp')
            ->orderBy('sp.priority')
            ->getQuery()
            ->getResult();
    }
}
