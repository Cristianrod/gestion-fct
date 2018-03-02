<?php

namespace App\Form;

use App\Entity\Alumno;
use App\Entity\Ciclo;
use App\Entity\Empresa;
use App\Entity\Fct;
use App\Entity\Profesor;
use Doctrine\ORM\EntityRepository;
use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
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
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.nombre', 'ASC');
                },
                'choice_label' => function ($ciclo){
                    /* @var \App\Entity\Ciclo $ciclo*/
                    return $ciclo->getNombre() .' (' . $ciclo->getCodigo() . ')';
                },
            ])
            ->add('alumno', EntityType::class, [
                'label' => 'label.alumno',
                'class' => Alumno::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.nombre', 'ASC');
                },
                'choice_label' => function ($alumno){
                    /* @var Alumno $alumno*/
                    return $alumno->getNombre() . ' ' . $alumno->getApellido1() . ' ' . $alumno->getApellido2();
                },
            ])
            ->add('profesor', EntityType::class, [
                'label' => 'label.profesor',
                'class' => Profesor::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.nombre', 'ASC');
                },
                'choice_label' => function ($profesor){
                    /* @var Profesor $profesor*/
                    return $profesor->getNombre() . ' ' . $profesor->getApellido1() . ' ' . $profesor->getApellido2();
                },
            ])
            ->add('empresa', EntityType::class, [
                'label' => 'label.empresa',
                'class' => Empresa::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.nombre', 'ASC');
                },
                'choice_label' => 'nombre',
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
                ]
            ])
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fct::class,
        ]);
    }
}
