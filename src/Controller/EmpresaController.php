<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class EmpresaController
 * @package App\Controller
 * @Route("/empresas")
 */
class EmpresaController extends Controller
{
    /**
     * @Route("/", name="empresas")
     */
    public function index()
    {

    }
}
