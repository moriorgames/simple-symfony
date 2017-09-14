<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\DateTimeTrait;
use AppBundle\Entity\Traits\IdentifiableTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ShopPurchase
 *
 * @ORM\Entity
 * @ORM\Table(name="shop_purchase")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShopPurchaseRepository")
 *
 * @package AppBundle\Entity
 */
class ShopPurchase
{
    use IdentifiableTrait;
    use DateTimeTrait;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="purchases")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

    /**
     * @var ShopProduct
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ShopProduct")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $shopProduct;

    /**
     * ShopPurchase constructor.
     */
    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return ShopProduct
     */
    public function getShopProduct(): ShopProduct
    {
        return $this->shopProduct;
    }

    /**
     * @param ShopProduct $shopProduct
     *
     * @return $this
     */
    public function setShopProduct(ShopProduct $shopProduct)
    {
        $this->shopProduct = $shopProduct;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'product_type'        => $this->shopProduct->getProductType(),
            'product_description' => $this->shopProduct->getDescription(),
            'product_price'       => $this->shopProduct->getPrice(),
            'product_quantity'    => $this->shopProduct->getQuantity(),
            'created_at'          => $this->createdAt,
            'updated_at'          => $this->updatedAt,
        ];
    }
}
