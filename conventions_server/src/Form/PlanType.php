<?php

namespace App\Form;

use App\Entity\Plan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('czas_rozpoczecia')
            ->add('czas_zakonczenia')
            ->add('konwent')
            ->add('zespol')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plan::class,
        ]);
    }
}
