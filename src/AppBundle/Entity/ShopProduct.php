<?php

namespace AppBundle\Entity;

use UnexpectedValueException;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\IdentifiableTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ShopProduct
 *
 * @ORM\Entity
 * @ORM\Table(name="shop_product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShopProductRepository")
 *
 * @package AppBundle\Entity
 */
class ShopProduct
{
    use IdentifiableTrait;

    // This part is to replace very small relations OR to simulate ENUM field. It simply works
    const PRODUCT_TYPE_GEM = 'gem';

    const PRODUCT_TYPE_JADE = 'jade';

    const PRODUCT_TYPE_DIAMOND = 'diamond';

    const PRODUCTS_TYPE_AVAILABLE = [
        self::PRODUCT_TYPE_GEM,
        self::PRODUCT_TYPE_JADE,
        self::PRODUCT_TYPE_DIAMOND,
    ];

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="general.blank")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Assert\NotNull()
     */
    private $productType;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     */
    private $quantity;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     */
    private $priority;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $availableInShop;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductType(): string
    {
        return $this->productType;
    }

    /**
     * @param string $productType
     *
     * @return $this
     */
    public function setProductType(string $productType)
    {
        if (!in_array($productType, self::PRODUCTS_TYPE_AVAILABLE)) {
            throw new UnexpectedValueException('Product "' . $productType . '" is not allowed');
        }

        $this->productType = $productType;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     *
     * @return $this
     */
    public function setPrice(int $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     *
     * @return $this
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getAvailableInShop(): bool
    {
        return $this->availableInShop;
    }

    /**
     * @param boolean $availableInShop
     *
     * @return $this
     */
    public function setAvailableInShop(bool $availableInShop)
    {
        $this->availableInShop = $availableInShop;

        return $this;
    }
}
