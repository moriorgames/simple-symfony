<?php

namespace AppBundle\Repository;

use DateTime;
use AppBundle\Entity\User;
use AppBundle\Entity\ShopProduct;
use AppBundle\Entity\ShopPurchase;
use Doctrine\ORM\EntityRepository;

/**
 * Class ShopPurchaseRepository
 *
 * @package AppBundle\Repository
 */
class ShopPurchaseRepository extends EntityRepository
{
    /**
     * @param int $id
     *
     * @return ShopPurchase
     */
    public function findById($id)
    {
        return $this->createQueryBuilder('sp')
            ->andWhere('sp.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param ShopProduct $shopProduct
     * @param DateTime $now
     * @param User $user
     *
     * @return bool
     */
    public function isAbleToPurchase($shopProduct, $now, $user)
    {
        $isAble = false;

        if ($shopProduct->getCurrencyType() == ShopProduct::CURRENCY_HARD
            && $shopProduct->getPrice() <= $user->getDiamonds()
        ) {
            $isAble = true;
        }

        return $isAble;
    }

    /**
     * @param ShopProduct $shopProduct
     * @param DateTime $now
     * @param User $user
     * @param UserRepository $userRepo
     *
     * @return array
     */
    public function purchase($shopProduct, $now, $user, $userRepo)
    {
        $shopPurchase = new ShopPurchase;

        $purchase = [];

        $shopPurchase
            ->setProductId($shopProduct->getId())
            ->setUserId($user->getId())
            ->setDiamonds($user->getDiamonds())
            ->setDefeat($user->getDefeat())
            ->setDraw($user->getDraw())
            ->setGold($user->getGold())
            ->setValve($user->getValve())
            ->setLevel($user->getLevel())
            ->setVictory($user->getVictory())
            ->setCreatedAt($now)
            ->setUpdatedAt($now);

        if ($shopProduct->getProductType() == ShopProduct::PRODUCT_SOFT_CURRENCY) {
            $user->setGold($user->getGold() + $shopProduct->getQuantity());
            $purchase['purchase'] = [
                $shopProduct->getDescription() => $shopProduct->getQuantity()
            ];
        } else if ($shopProduct->getProductType() == ShopProduct::PRODUCT_HARD_CURRENCY) {
            $user->setGold($user->getDiamonds() + $shopProduct->getQuantity());

            $purchase['purchase'] = [
                $shopProduct->getDescription() => $shopProduct->getQuantity()
            ];
        } else if ($shopProduct->getProductType() == ShopProduct::PRODUCT_REWARD) {

            /** @var BoxRewardRepository $boxRewardRepo */
            $boxRewardRepo = $this->_em->getRepository('AppBundle:BoxReward');

            $purchase = $boxRewardRepo->composeReward($shopProduct->getDescription(), $user, $userRepo, $now);
        }

        if ($shopProduct->getCurrencyType() == ShopProduct::CURRENCY_HARD) {
            $user->setDiamonds($user->getDiamonds() - $shopProduct->getPrice());
        } else if ($shopProduct->getCurrencyType() == ShopProduct::CURRENCY_SOFT) {
            $user->setGold($user->getGold() - $shopProduct->getPrice());
        }

        $this->_em->persist($shopPurchase);
        $this->_em->persist($user);
        $this->_em->flush();


        return $purchase;
    }
}
