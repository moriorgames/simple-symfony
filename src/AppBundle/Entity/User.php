<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\NameSlugTrait;
use AppBundle\Entity\Traits\DateTimeTrait;
use AppBundle\Entity\Traits\IdentifiableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 *
 * @package AppBundle\Entity
 */
class User
{
    use IdentifiableTrait;
    use DateTimeTrait;
    use NameSlugTrait;

    /**
     * @var ShopPurchase
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ShopPurchase", mappedBy="user")
     */
    private $purchases;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
        $this->purchases = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getPurchases(): ArrayCollection
    {
        return $this->purchases;
    }

    /**
     * @param ShopPurchase $shopPurchase
     *
     * @return $this
     */
    public function addBattleSets(ShopPurchase $shopPurchase)
    {
        $this->purchases->add($shopPurchase);

        return $this;
    }

    /**
     * @param ShopPurchase $shopPurchase
     *
     * @return $this
     */
    public function removeBattleSets(ShopPurchase $shopPurchase)
    {
        $this->purchases->remove($shopPurchase);

        return $this;
    }

    private function purchasesToArray(): array
    {
        $purchases = [];
        /** @var ShopPurchase $purchase */
        foreach ($this->purchases as $purchase) {
            $purchases[] = $purchase->toArray();
        }

        return $purchases;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name'      => $this->name,
            'slug'      => $this->slug,
            'purchases' => $this->purchases,
        ];
    }
}
