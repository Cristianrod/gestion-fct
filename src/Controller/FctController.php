<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FctController
 * @package App\Controller
 * @Route("/fcts")
 */
class FctController extends Controller
{
    /**
     * @Route("/", name="fcts")
     */
    public function index()
    {
        return $this->render('fct/index.html.twig');
    }
}
