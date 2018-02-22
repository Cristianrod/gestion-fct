<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class InicioController extends Controller
{
    /**
     * @Route("/", name="incio")
     * @Method("GET")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }
}
