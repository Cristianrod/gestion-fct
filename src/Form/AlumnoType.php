<?php

namespace App\Form;

use App\Entity\Alumno;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('fotografia', FileType::class, [
                'label' => 'label.foto',
            ])
            ->add('direccion', null, [
                'label' => 'label.direccion',
            ])
            ->add('poblacion', null, [
                'label' => 'label.poblacion'
            ])
            ->add('codpostal', null, [
                'label' => 'label.codpostal'
            ])
            ->add('provincia', null, [
                'label' => 'label.provincia'
            ])
            ->add('movil', null, [
                'label' => 'label.movil'
            ])
            ->add('fijo', null, [
                'label' => 'label.tlf'
            ])
            ->add('correo', null, [
                'label' => 'label.correo'
            ])
            ->add('crear', SubmitType::class, [
                'label' => 'label.crearAlumno',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Alumno::class,
        ]);
    }
}
