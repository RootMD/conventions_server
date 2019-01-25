<?php

namespace App\Form;

use App\Entity\Konwent;
use App\Entity\Plan;
use App\Entity\Zespol;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('konwent', EntityType::class, [
                'class' => Konwent::class,
                'choice_label' => 'nazwa'
            ])
            ->add('zespol', EntityType::class, [
                'class' => Zespol::class,
                'choice_label' => 'nazwa'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plan::class,
        ]);
    }
}
