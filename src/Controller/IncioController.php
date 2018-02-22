<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IncioController extends Controller
{
    /**
     * @Route("/", name="incio")
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }
}
