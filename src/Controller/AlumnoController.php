<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AlumnoController extends Controller
{
    /**
     * @Route("/alumnos", name="alumnos")
     */
    public function index()
    {
        return $this->render("alumno/index.html.twig");
    }

    public function new(Request $request)
    {

    }
}
