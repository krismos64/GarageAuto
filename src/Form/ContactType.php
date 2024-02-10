<?php

namespace App\Form;

use App\Entity\Messages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', null, [
                'label' => 'Prénom',
            ])
            ->add('lastName', null, [
                'label' => 'Nom',
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
            ])
            ->add('phoneNumber', TelType::class, [
                'required' => true,
                'label' => 'Numéro de téléphone',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^(\+33|0)[1-9](\d{2}){4}$/',
                        'message' => 'Le numéro de téléphone doit être valide.',
                    ]),
                ],
            ])
            ->add('content', null, [
                'label' => 'Votre demande',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Messages::class,
        ]);
    }
}
