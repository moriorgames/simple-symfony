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
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer")
     */
    private $productId;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     * @Assert\Type(type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     * @Assert\Type(type="integer")
     */
    private $level;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     * @Assert\Type(type="integer")
     */
    private $victory;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     * @Assert\Type(type="integer")
     */
    private $defeat;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     * @Assert\Type(type="integer")
     */
    private $draw;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     * @Assert\Type(type="integer")
     */
    private $gold;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     * @Assert\Type(type="integer")
     */
    private $valve;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=1})
     * @Assert\Type(type="integer")
     */
    private $diamonds;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     *
     * @return $this
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     *
     * @return $this
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     *
     * @return $this
     */
    public function setLevel(int $level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getVictory(): int
    {
        return $this->victory;
    }

    /**
     * @param int $victory
     *
     * @return $this
     */
    public function setVictory(int $victory)
    {
        $this->victory = $victory;

        return $this;
    }

    /**
     * @return int
     */
    public function getDefeat(): int
    {
        return $this->defeat;
    }

    /**
     * @param int $defeat
     *
     * @return $this
     */
    public function setDefeat(int $defeat)
    {
        $this->defeat = $defeat;

        return $this;
    }

    /**
     * @return int
     */
    public function getDraw(): int
    {
        return $this->draw;
    }

    /**
     * @param int $draw
     *
     * @return $this
     */
    public function setDraw(int $draw)
    {
        $this->draw = $draw;

        return $this;
    }

    /**
     * @return int
     */
    public function getGold(): int
    {
        return $this->gold;
    }

    /**
     * @param int $gold
     *
     * @return $this
     */
    public function setGold(int $gold)
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * @return int
     */
    public function getValve(): int
    {
        return $this->valve;
    }

    /**
     * @param int $valve
     *
     * @return $this
     */
    public function setValve(int $valve)
    {
        $this->valve = $valve;

        return $this;
    }

    /**
     * @return int
     */
    public function getDiamonds(): int
    {
        return $this->diamonds;
    }

    /**
     * @param int $diamonds
     *
     * @return $this
     */
    public function setDiamonds(int $diamonds)
    {
        $this->diamonds = $diamonds;

        return $this;
    }
}
