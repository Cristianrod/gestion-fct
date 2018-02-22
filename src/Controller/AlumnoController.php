<?php

namespace App\Controller;

use App\Entity\Alumno;
use App\Form\AlumnoType;
use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/alumnos")
 * Class AlumnoController
 * @package App\Controller
 */
class AlumnoController extends Controller
{
    /**
     * @Route("/", name="alumnos")
     */
    public function index()
    {
        return $this->render("alumno/index.html.twig");
    }

    /**
     * @Route("/nuevo", name="alumnos_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        $alumno = new Alumno();

        $form = $this->createForm(AlumnoType::class, $alumno);

        return $this->render("alumno/new.html.twig", [
            'form' => $form->createView()
        ]);

    }
}
