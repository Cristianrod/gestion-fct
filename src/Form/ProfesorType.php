<?php

namespace App\Form;

use App\Entity\Ciclo;
use App\Entity\Profesor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseProfileFormType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

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
            ->add('username', null, [
                'label' => 'label.usuario',
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'label.correo',
                'constraints' => [
                    new Email(),
                    new NotBlank(),
                ]
            ])
            ->add('movil', null, [
                'label' => 'label.movil',
            ])
            ->add('fijo', null, [
                'label' => 'label.tlf',
            ])
            ->add('ciclos', EntityType::class, [
                'label' => 'label.ciclo',
                'class' => Ciclo::class,
                'choice_label' => 'nombre',
                'multiple' => true,
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'label.roles',
                'choices' => [
                    'choice.profesor' => 'ROLE_USER',
                    'choice.direccion' => 'ROLE_ADMIN'
                ],
                'multiple' => true,
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('enabled', CheckboxType::class, [
                'label' => 'label.activo',
                'attr' => ['checked'   => 'checked'],
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
