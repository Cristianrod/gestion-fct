<?php

namespace App\Form;

use App\Entity\Empresa;
use App\Entity\Provincia;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpresaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cif', null, [
                'label' => 'label.cif',
            ])
            ->add('nombre', null, [
                'label' => 'label.nombre',
            ])
            ->add('nombreTutor', null, [
                'label' => 'label.tutor',
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresa::class,
        ]);
    }
}
