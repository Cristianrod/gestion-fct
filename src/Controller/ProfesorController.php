<?php

namespace App\Controller;

use App\Entity\Profesor;
use App\Form\ProfesorType;
use App\Repository\ProfesorRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProfesorController
 * @package App\Controller
 * @Route("/profesores")
 */
class ProfesorController extends Controller
{
    /**
     * @Route("/", name="profesores")
     * @param ProfesorRepository $profesores
     * @return Response
     */
    public function index(ProfesorRepository $profesores): Response
    {
        $profesores = $profesores->findByNombre();
        return $this->render('profesor/index.html.twig', [
            'profesores' => $profesores,
        ]);
    }

    /**
     * @Route("/nuevo", name="profesores_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function new(Request $request): Response
    {
        $profesor = new Profesor();
        $form = $this->createForm(ProfesorType::class, $profesor)
            ->add('crear', SubmitType::class, [
                'label' => 'label.crearProfesor',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $profesor = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($profesor);
            $em->flush();
            $this->addFlash('success', 'flash.creadoP');
            return $this->redirectToRoute('profesores');
        }


        return $this->render('profesor/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
