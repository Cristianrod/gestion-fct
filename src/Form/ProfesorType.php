<?php

namespace App\Form;

use App\Entity\Ciclo;
use App\Entity\Profesor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfesorType extends AbstractType
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
            ->add('usuario', null, [
                'label' => 'label.usuario',
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
            ->add('ciclos', EntityType::class, [
                'class' => Ciclo::class,
                'choice_label' => 'nombre',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profesor::class,
        ]);
    }
}
