<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomCours', TextType::class, array(
            'label' => 'Nom Cours',
        ))
            ->add('nomEns', TextType::class, array(
                'label' => 'Nom Enseignant',
            ))
            ->add('idEns', TextType::class, array(
                'label' => 'Id Enseignant',
            ))
            ->add('nombreChx', TextType::class, array(
                'label' => 'Nombre place réservé',
            ))
            ->add('nombreTotal', TextType::class, array(
                'label' => 'Nombre place disponible',
            ))
            ->add('heure', TextType::class, array(
                'label' => 'Heure',
            ))
            ->add('jour', TextType::class, array(
                'label' => 'Jour',
            ))
            ->add('lieu', TextType::class, array(
                'label' => 'Lieu',
            ))
            ->add('credit', TextType::class, array(
                'label' => 'Crédit ECTS',
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cours'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cours';
    }


}
