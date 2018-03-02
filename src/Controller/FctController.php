<?php

namespace App\Controller;

use App\Entity\Fct;
use App\Form\FctType;
use App\Repository\FctRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, FctRepository $fcts): Response
    {
        $pagina = $request->query->getInt('p', 1);
        $fcts = $fcts->findByNombre($pagina);
        return $this->render('fct/index.html.twig', [
            'fcts' => $fcts,
        ]);
    }

    /**
     * @param Request $request
     * @Route("/agregar", name="fcts_new")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public  function new(Request $request)
    {
        $fct = new Fct();

        $form = $this->createForm(FctType::class, $fct)
            ->add('crear', SubmitType::class, [
                'label' => 'label.crearFct',
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
            ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $fct = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($fct);
            $em->flush();
            $this->addFlash('success', 'flash.creadoA');
            return $this->redirectToRoute('fcts');
        }

        return $this->render('fct/new.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
