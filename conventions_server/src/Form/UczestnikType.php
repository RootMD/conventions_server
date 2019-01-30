<?php

namespace App\Form;

use App\Entity\Bilet;
use App\Entity\Konkurs;
use App\Entity\Uczestnik;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UczestnikType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imie')
            ->add('nazwisko')
            ->add('nick')
            ->add('email')
            ->add('konkurs', EntityType::class, [
                'class' => Konkurs::class,
                'choice_label' => 'nazwa'
            ])
            ->add('bilet', EntityType::class, [
                'class' => Bilet::class,
                'choice_label' => 'nazwa'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Uczestnik::class,
        ]);
    }
}
