<?php

namespace App\Controller;

use App\Entity\Ciclo;
use App\Entity\Fct;
use App\Form\FctType;
use App\Repository\FctRepository;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
     * @param Request $request
     * @param FctRepository $fcts
     * @return Response
     * @Security("has_role('ROLE_USER')")
     */
    public function index(Request $request, FctRepository $fcts): Response
    {
        $ciclos = $this->getDoctrine()->getRepository(Ciclo::class)->findAll();
        $pagina = $request->query->getInt('p', 1);
        $ciclo = $request->query->get('c');
        if ($ciclo){
            $fcts = $fcts->findByCiclo($pagina, $ciclo);
        }
        else{
            $fcts = $fcts->findByNombre($pagina);
        }
        return $this->render('fct/index.html.twig', [
            'fcts' => $fcts,
            'ciclos' => $ciclos
        ]);
    }

    /**
     * @param Request $request
     * @Route("/agregar", name="fcts_new")
     * @Method({"GET", "POST"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Security("has_role('ROLE_ADMIN')")
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

    /**
     * @Route("/actualizar/{id}", name="fcts_edit")
     * @param Request $request
     * @param Fct $fct *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit(Request $request, Fct $fct)
    {
        $form = $this->createForm(FctType::class, $fct)
            ->add('editar', SubmitType::class, [
                'label' => 'label.editarFCT',
                'attr' => [
                    'class' => 'btn btn-success',
                ],
            ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $this->addFlash('success', 'flash.editF');
            return $this->redirectToRoute('fcts');
        }

        return $this->render('fct/edit.html.twig', [
           'fct' => $fct,
           'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/eliminar/{id}", name="fcts_delete")
     * @param Request $request
     * @param Fct $fct
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete(Request $request, Fct $fct)
    {
        if ($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();
            $em->remove($fct);
            $em->flush();
            $this->addFlash('success', 'flash.borrarA');
            return $this->redirectToRoute('fcts');
        }

        return $this->render('fct/delete.html.twig',[
            'fct' => $fct,
        ]);
    }

    /**
     * @Route("/pdf", name="pdf_fcts")
     * @return Response
     * @Security("has_role('ROLE_USER')")
     */
    public function pdf(): Response
    {
        $fctRepositorio = $this->getDoctrine()->getRepository(Fct::class);
        $fcts = $fctRepositorio->findAll();
        $html = $this->renderView('pdf/fcts.html.twig', [
            'fcts' => $fcts
        ]);

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'listadofcts.pdf'
        );
    }

    /**
     * @Route("/email/{id}", name="fcts_email")
     * @param Fct $fct
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function email(Fct $fct, \Swift_Mailer $mailer)
    {
        $mensaje = (new \Swift_Message('FCT'))
            ->setFrom('admin@mail.com')
            ->setTo('profesres@mail.com')
            ->setBody(
                $this->renderView('fct/email.html.twig', [
                    'fct' => $fct,
                ]),
                'text/html'
            );

        $mailer->send($mensaje);
        $this->addFlash('success', 'flash.emailFCT');
        return $this->redirectToRoute('fcts');
    }
}
