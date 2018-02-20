<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlumnoController extends Controller
{
    /**
     * @Route("/alumnos", name="alumnos")
     */
    public function index()
    {
        return $this->render("alumno/index.html.twig");
    }
}
