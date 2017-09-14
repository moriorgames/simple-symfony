<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/ping", name="ping")
     * @Method("GET")
     *
     * @return Response
     */
    public function pingAction()
    {
        return new Response('Success!');
    }
}
