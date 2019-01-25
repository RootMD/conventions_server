<?php

namespace App\Form;

use App\Entity\Plan;
use App\Entity\Stoisko;
use App\Entity\Zespol;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZespolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nazwa')
            ->add('plan', EntityType::class, [
                'class' => Plan::class,
                'choice_label' => 'czas_rozpoczecia'
            ])
            ->add('stoisko', EntityType::class, [
                'class' => Stoisko::class,
                'choice_label' => 'lokalizacja'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Zespol::class,
        ]);
    }
}
