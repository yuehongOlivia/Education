<?php

namespace AppBundle\Form;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', CollectionType::class, array(
            'entry_type' => TextType::class,
            'entry_options' => array(
                'attr' => array(
                    'class' => 'email-box',
                    'label' => 'Nom',
                )
            )));
        $builder->add('prenom', TextType::class, array(
            'label' => 'Prénom',
        ));
        $builder->add('dnaiss', BirthdayType::class, array(
            'label' => 'Date de naissance',
            'placeholder' => 'Sélectionner une valeur',
            'widget' => 'single_text',
            'format' => 'dd-MM-yyyy',
        ));
        $builder->add('genre', RadioType::class, array(
            'label' => 'Genre',
        ));
        $builder->remove('username');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/3/3
 * Time: 10:35
 */