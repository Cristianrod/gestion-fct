<?php

namespace App\Controller;

use App\Entity\Alumno;
use App\Form\AlumnoType;
use App\Repository\AlumnoRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/alumnos")
 * Class AlumnoController
 * @package App\Controller
 */
class AlumnoController extends Controller
{

    /**
     * @Route("/", name="alumnos")
     * @param AlumnoRepository $alumnos
     * @return Response
     */
    public function index(AlumnoRepository $alumnos): Response
    {
        $alumnos = $alumnos->findByNombre();
        return $this->render("alumno/index.html.twig",[
            'alumnos' => $alumnos
        ]);
    }

    /**
     * @Route("/nuevo", name="alumnos_new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $alumno = new Alumno();

        $form = $this->createForm(AlumnoType::class, $alumno);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $alumno = $form->getData();
             $em = $this->getDoctrine()->getManager();
             $em->persist($alumno);
             $em->flush();
            return $this->redirectToRoute('alumnos');
        }

        return $this->render("alumno/new.html.twig", [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/{id}", name="alumnos_show")
     * @Method("GET")
     * @param Alumno $alumno
     * @return Response
     */
    public function show(Alumno $alumno): Response
    {
        return $this->render('alumno/show.html.twig', [
            'alumno' => $alumno,
        ]);
    }
}
