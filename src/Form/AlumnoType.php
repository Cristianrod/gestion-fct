<?php

namespace App\Form;

use App\Entity\Alumno;
use App\Entity\Ciclo;
use App\Entity\Provincia;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlumnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nif', null, [
                'label' => 'label.nif',
            ])
            ->add('nombre', null, [
                'label' => 'label.nombre',
            ])
            ->add('apellido1', null, [
                'label' => 'label.apellido1',
            ])
            ->add('apellido2', null, [
                'label' => 'label.apellido2',
            ])
            ->add('fichero', FileType::class, [
                'label' => 'label.foto',
            ])
            ->add('direccion', null, [
                'label' => 'label.direccion',
            ])
            ->add('poblacion', null, [
                'label' => 'label.poblacion',
            ])
            ->add('codpostal', null, [
                'label' => 'label.codpostal',
            ])
            ->add('provincia', EntityType::class, [
                'label' => 'label.provincia',
                'class' => Provincia::class,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.nombre', 'ASC');
                },
                'choice_label' => 'nombre',
            ])
            ->add('movil', null, [
                'label' => 'label.movil',
            ])
            ->add('fijo', null, [
                'label' => 'label.tlf',
            ])
            ->add('correo', null, [
                'label' => 'label.correo',
            ])
            ->add('ciclo', EntityType::class, [
               'label' => 'label.ciclo',
               'class' => Ciclo::class,
               'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.nombre', 'ASC');
               },
                'choice_label' => function ($ciclo)
                {
                    /* @var \App\Entity\Ciclo $ciclo*/
                    return $ciclo->getNombre() .' (' . $ciclo->getCodigo() . ')';
                },
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Alumno::class,
        ]);
    }
}
