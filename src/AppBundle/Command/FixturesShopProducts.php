<?php

namespace AppBundle\Command;

use AppBundle\Entity\ShopProduct;

/**
 * Class FixturesShopProducts
 *
 * @package AppBundle\Command
 */
class FixturesShopProducts
{
    const PRODUCTS = [
        [
            'description'       => 'Small bag',
            'product_type'      => ShopProduct::PRODUCT_SOFT_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 60,
            'quantity'          => 1000,
            'priority'          => 7,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Medium Bag',
            'product_type'      => ShopProduct::PRODUCT_SOFT_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 500,
            'quantity'          => 10000,
            'priority'          => 8,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Big bag',
            'product_type'      => ShopProduct::PRODUCT_SOFT_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 4500,
            'quantity'          => 100000,
            'priority'          => 9,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Big Reward',
            'product_type'      => ShopProduct::PRODUCT_REWARD,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 250,
            'quantity'          => 1,
            'priority'          => 10,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Epic Reward',
            'product_type'      => ShopProduct::PRODUCT_REWARD,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 380,
            'quantity'          => 1,
            'priority'          => 11,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Special Reward',
            'product_type'      => ShopProduct::PRODUCT_REWARD,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 490,
            'quantity'          => 1,
            'priority'          => 12,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Medium Reward',
            'product_type'      => ShopProduct::PRODUCT_REWARD,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 24,
            'quantity'          => 1,
            'priority'          => 13,
            'available_in_shop' => false,
        ],
        [
            'description'       => 'Big Reward',
            'product_type'      => ShopProduct::PRODUCT_REWARD,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 48,
            'quantity'          => 1,
            'priority'          => 14,
            'available_in_shop' => false,
        ],
        [
            'description'       => 'Epic Reward',
            'product_type'      => ShopProduct::PRODUCT_REWARD,
            'currency_type'     => ShopProduct::CURRENCY_HARD,
            'price'             => 72,
            'quantity'          => 1,
            'priority'          => 15,
            'available_in_shop' => false,
        ],
        [
            'description'       => 'Small Diamonds',
            'product_type'      => ShopProduct::PRODUCT_HARD_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_REAL,
            'price'             => 1,
            'quantity'          => 80,
            'priority'          => 1,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Medium Diamonds',
            'product_type'      => ShopProduct::PRODUCT_HARD_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_REAL,
            'price'             => 2,
            'quantity'          => 500,
            'priority'          => 2,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Big Diamonds',
            'product_type'      => ShopProduct::PRODUCT_HARD_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_REAL,
            'price'             => 3,
            'quantity'          => 1200,
            'priority'          => 3,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Epic Diamonds',
            'product_type'      => ShopProduct::PRODUCT_HARD_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_REAL,
            'price'             => 4,
            'quantity'          => 2500,
            'priority'          => 4,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Legendary Diamonds',
            'product_type'      => ShopProduct::PRODUCT_HARD_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_REAL,
            'price'             => 5,
            'quantity'          => 6500,
            'priority'          => 5,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Hero Diamonds',
            'product_type'      => ShopProduct::PRODUCT_HARD_CURRENCY,
            'currency_type'     => ShopProduct::CURRENCY_REAL,
            'price'             => 6,
            'quantity'          => 15000,
            'priority'          => 6,
            'available_in_shop' => true,
        ],
    ];
}
