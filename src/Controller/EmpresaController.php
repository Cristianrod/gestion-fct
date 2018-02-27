<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Form\EmpresaType;
use App\Repository\EmpresaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @param EmpresaRepository $empresas
     * @return Response
     */
    public function index(Request $request, EmpresaRepository $empresas): Response
    {
        $pagina = $request->query->getInt('p', 1);
        $empresas = $empresas->findByNombre($pagina);
        return $this->render('empresa/index.html.twig', [
           'empresas' => $empresas,
        ]);
    }

    /**
     * @Route("/nuevo", name="empresas_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function new(Request $request)
    {
        $empresa = new Empresa();

        $form = $this->createForm(EmpresaType::class, $empresa)
            ->add('crear', SubmitType::class, [
                'label' => 'label.crearEmpresa',
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
            ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $empresa = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();
            $this->addFlash('success', 'flash.creadoE');
            return $this->redirectToRoute('empresas');
        }

        return $this->render('empresa/new.html.twig', [
           'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="empresas_show")
     * @param Empresa $empresa
     * @return Response
     */
    public function show(Empresa $empresa): Response
    {
        return $this->render('empresa/show.html.twig', [
           'empresa' => $empresa
        ]);
    }
}
