<?php

namespace App\Form;

use App\Entity\CzlonekZespolu;
use App\Entity\Zespol;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CzlonekZespoluType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stanowisko')
            ->add('imie')
            ->add('nazwisko')
            ->add('zespol', EntityType::class, [
                'class' => Zespol::class,
                'choice_label' => 'nazwa'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CzlonekZespolu::class,
        ]);
    }
}
