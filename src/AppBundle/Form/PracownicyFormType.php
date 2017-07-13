<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpKernel\Tests\Controller;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PracownicyFormType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('imie', TextType::class, ['label' => 'Imię', 'attr' => ['class' => 'form-control']])
            ->add('nazwisko', TextType::class, ['label' => 'Naziwsko', 'attr' => ['class' => 'form-control']])
            ->add('oddzialy', null, ['label' => 'Oddział', 'attr' => ['class' => 'form-control']])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Pracownicy'
        ]);
    }


}