<?php

namespace App\Form;

use App\Entity\Alumno;
use Symfony\Component\Form\AbstractType;
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
                'label' => 'label.apellido1'
            ])
            ->add('apellido2', null, [
                'label' => 'label.apellido2'
            ])
            ->add('crear', SubmitType::class, [
                'label' => 'label.crearAlumno'
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
