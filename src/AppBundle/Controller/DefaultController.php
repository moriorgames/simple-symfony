<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ShopProduct;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// Annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 *
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/ping", name="main_ping")
     * @Method("GET")
     *
     * @return JsonResponse
     */
    public function pingAction()
    {
        return new JsonResponse(['Success!']);
    }

    /**
     * @Route("/list-products", name="main_list_products")
     * @Method("GET")
     *
     * @return JsonResponse
     */
    public function listProductsAction()
    {
        $shopProducts = $this->get('app.shop_product_repository')->findAllOrdered();
        $products = [];
        /** @var ShopProduct $shopProduct */
        foreach ($shopProducts as $shopProduct) {
            $products[] = $shopProduct->toArray();
        }

        return new JsonResponse($products);
    }

    /**
     * @Route("/get-user-data/{id}", name="main_get_user_data")
     * @Method("GET")
     *
     * @return JsonResponse
     */
    public function getUserDataAction(int $id)
    {
        /** @var User $user */
        $user = $this->get('app.user_repository')->findById($id);

        return new JsonResponse($user->toArray());
    }
}
