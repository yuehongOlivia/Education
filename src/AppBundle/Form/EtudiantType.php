<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class EtudiantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iNE', TextType::class, array(
                'label' => 'Numéros INE',
            ))
            ->add('mobile', TextType::class, array(
                'label' => 'Numéros de portable',
            ))
            ->add('mailaltern', EmailType::class, array(
                'label' => 'Mail de l\'université',
            ))
            ->add('diplomeEnCours',TextType::class, array(
                'label' => 'Diplôme en cours',
            ))
            ->add('departement', TextType::class, array(
                'label' => 'Departement UFR',
            ))
            ->add('adresse',TextType::class, array(
                'label' => 'Adresse',
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etudiant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_etudiant';
    }
}