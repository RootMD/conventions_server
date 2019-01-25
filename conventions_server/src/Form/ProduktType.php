<?php

namespace App\Form;

use App\Entity\Produkt;
use App\Entity\Stoisko;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduktType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nazwa')
            ->add('cena')
            ->add('ilosc')
            ->add('stoisko', EntityType::class, [
                'class' => Stoisko::class,
                'choice_label' => 'lokalizacja'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produkt::class,
        ]);
    }
}
