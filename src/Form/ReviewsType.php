<?php

namespace App\Form;

use App\Entity\Reviews;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => true,
                'attr' => ['maxlength' => 100],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'required' => true,
                'attr' => ['maxlength' => 100],
            ])
            ->add('rating', IntegerType::class, [
                'label' => 'Note sur 5',
                'required' => true,
                'attr' => ['min' => 1, 'max' => 5],
            ])
            ->add('content', TextType::class, [
                'label' => 'Contenu du message',
                'required' => true,
            ])
            ->add('createdAt', TextType::class, [
                'label' => 'Date de publication',
                'required' => true,
                'attr' => ['maxlength' => 19],
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\DateTime([
                        'format' => 'Y-m-d H:i:s',
                        'message' => 'Le format de la date doit être yyyy-MM-dd HH:mm:ss.'
                    ])
                ]
            ])
            ->add('isApproved', CheckboxType::class, [
                'label' => 'Approuvé',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reviews::class,
        ]);
    }
}
