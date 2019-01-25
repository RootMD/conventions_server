<?php

namespace App\Form;

use App\Entity\Gra;
use App\Entity\Konkurs;
use App\Entity\Konwent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KonkursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nagroda')
            ->add('data')
            ->add('nazwa')
            ->add('konwent', EntityType::class, [
                'class' => Konwent::class,
                'choice_label' => 'nazwa'
            ])
            ->add('gra', EntityType::class, [
                'class' => Gra::class,
                'choice_label' => 'nazwa'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Konkurs::class,
        ]);
    }
}
