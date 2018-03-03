<?php

namespace App\Form;

use App\Entity\Alumno;
use App\Entity\Ciclo;
use App\Entity\Empresa;
use App\Entity\Fct;
use App\Entity\Profesor;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FctType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ciclo', EntityType::class, [
                'label' => 'label.ciclo',
                'class' => Ciclo::class,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.nombre', 'ASC');
                },
                'choice_label' => function ($ciclo){
                    /* @var \App\Entity\Ciclo $ciclo*/
                    return $ciclo->getNombre() .' (' . $ciclo->getCodigo() . ')';
                },
                'placeholder' => '',
            ])
            ->add('empresa', EntityType::class, [
                'label' => 'label.empresa',
                'class' => Empresa::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.nombre', 'ASC');
                },
                'choice_label' => 'nombre',
                'placeholder' => '',
            ])
            ->add('anio', null, [
                'label' => 'label.anio',
            ])
            ->add('periodo', ChoiceType::class, [
                'label' => 'label.periodo',
                'choices' => [
                    'Periodo 1' => 'Periodo 1',
                    'Periodo 2' => 'Periodo 2',
                    'Periodo 3' => 'Periodo 3',
                ],
                'placeholder' => ''
            ])
        ;

        $ajaxForm = function (FormInterface $form, Ciclo $ciclo = null){
            $alumnos = null === $ciclo ? [] : $ciclo->getAlumnos();
            $profesores = null === $ciclo ? [] : $ciclo->getProfesores();

            $form->add('alumno', EntityType::class, [
                'label' => 'label.alumno',
                'class' => Alumno::class,
                'placeholder' => '',
                'choices' => $alumnos,
                'choice_label' => 'nombre',
            ]);
            $form->add('profesor', EntityType::class, [
                'label' => 'label.profesor',
                'class' => Profesor::class,
                'placeholder' => '',
                'choices' => $profesores,
                'choice_label' => 'nombre',
            ]);
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($ajaxForm){
                $valores = $event->getData();
                $ajaxForm($event->getForm(), $valores->getCiclo());
            }
        );

        $builder->get('ciclo')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($ajaxForm){
                $ciclo = $event->getForm()->getData();
                $ajaxForm($event->getForm()->getParent(), $ciclo);
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fct::class,
        ]);
    }
}
