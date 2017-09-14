<?php

namespace AppBundle\Command;

use AppBundle\Entity\ShopProduct;

/**
 * Class FixturesShopProducts
 *
 * @package AppBundle\Command
 */
class Fixtures
{
    const USERS = [
        [
            'name' => 'Pablo Escobar',
        ],
    ];

    const SHOP_PRODUCTS = [
        [
            'description'       => 'Bag of Gems',
            'product_type'      => ShopProduct::PRODUCT_TYPE_GEM,
            'price'             => 60,
            'quantity'          => 1000,
            'priority'          => 1,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Chest of Gems',
            'product_type'      => ShopProduct::PRODUCT_TYPE_GEM,
            'price'             => 100,
            'quantity'          => 2000,
            'priority'          => 2,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Mountain of Gems',
            'product_type'      => ShopProduct::PRODUCT_TYPE_GEM,
            'price'             => 200,
            'quantity'          => 5000,
            'priority'          => 3,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Bag of Jade',
            'product_type'      => ShopProduct::PRODUCT_TYPE_JADE,
            'price'             => 120,
            'quantity'          => 500,
            'priority'          => 4,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Chest of Jade',
            'product_type'      => ShopProduct::PRODUCT_TYPE_JADE,
            'price'             => 200,
            'quantity'          => 1000,
            'priority'          => 5,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Mountain of Jade',
            'product_type'      => ShopProduct::PRODUCT_TYPE_JADE,
            'price'             => 500,
            'quantity'          => 2500,
            'priority'          => 6,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Bag of Diamonds',
            'product_type'      => ShopProduct::PRODUCT_TYPE_DIAMOND,
            'price'             => 250,
            'quantity'          => 125,
            'priority'          => 7,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Chest of Diamonds',
            'product_type'      => ShopProduct::PRODUCT_TYPE_DIAMOND,
            'price'             => 500,
            'quantity'          => 300,
            'priority'          => 8,
            'available_in_shop' => true,
        ],
        [
            'description'       => 'Mountain of Diamonds',
            'product_type'      => ShopProduct::PRODUCT_TYPE_DIAMOND,
            'price'             => 1000,
            'quantity'          => 700,
            'priority'          => 9,
            'available_in_shop' => true,
        ],
    ];
}
