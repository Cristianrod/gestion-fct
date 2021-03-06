<?php

namespace App\Controller;

use App\Entity\Profesor;
use App\Form\ProfesorType;
use App\Repository\ProfesorRepository;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class ProfesorController
 * @package App\Controller
 * @Route("/profesores")
 */
class ProfesorController extends Controller
{
    /**
     * @Route("/", name="profesores")
     * @param Request $request
     * @param ProfesorRepository $profesores
     * @return Response
     * @Security("has_role('ROLE_USER')")
     */
    public function index(Request $request, ProfesorRepository $profesores): Response
    {
        $pagina = $request->query->getInt('p', 1);
        $profesores = $profesores->findByNombre($pagina);
        return $this->render('profesor/index.html.twig', [
            'profesores' => $profesores,
        ]);
    }

    /**
     * @Route("/agregar", name="profesores_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request): Response
    {
        $profesor = new Profesor();
        $form = $this->createForm(ProfesorType::class, $profesor)
            ->add('plainPassword', PasswordType::class, [
                'label' => 'label.contra',
                'constraints' => [
                    new NotBlank(),
                ]
            ])
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

    /**
     * @Route("/{id}", requirements={"id": "\d+"}, name="profesores_show")
     * @param Profesor $profesor
     * @return Response
     * @Security("has_role('ROLE_USER')")
     */
    public function show(Profesor $profesor): Response
    {
        return $this->render('profesor/show.html.twig', [
           'profesor' => $profesor,
        ]);
    }

    /**
     * @Route("/eliminar/{id}", name="profesores_delete")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Profesor $profesor
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete(Request $request, Profesor $profesor): Response
    {
        if ($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();
            $em->remove($profesor);
            $em->flush();
            $this->addFlash('success', 'flash.borrarP');
            return $this->redirectToRoute('profesores');
        }
        return $this->render('profesor/delete.html.twig', [
                'profesor' => $profesor,
            ]);
    }

    /**
     * @Route("/actualizar/{id}", name="profesores_edit")
     * @param Request $request
     * @param Profesor $profesor
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit(Request $request, Profesor $profesor): Response
    {
        $form = $this->createForm(ProfesorType::class, $profesor)
            ->add('plainPassword', PasswordType::class, [
                'label' => 'label.contra',
            ])
            ->add('editar', SubmitType::class, [
                'label' => 'label.editarProfesor',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $this->addFlash('success', 'flash.editP');
            return $this->redirectToRoute('profesores');
        }

        return $this->render('profesor/edit.html.twig',[
            'profesor' => $profesor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/pdf", name="pdf_profesores")
     * @return PdfResponse
     * @Security("has_role('ROLE_USER')")
     */
    public function pdf()
    {
        $profesorRepo = $this->getDoctrine()->getRepository(Profesor::class);
        $profesores = $profesorRepo->findAll();
        $html = $this->renderView('pdf/profesores.html.twig', [
            'profesores' => $profesores
        ]);

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'listadoprofesores.pdf'
        );
    }
}
