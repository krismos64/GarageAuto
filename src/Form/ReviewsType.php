<?php

namespace App\Form;

use App\Entity\Reviews;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
            ])
            ->add('rating', IntegerType::class, [
                'label' => 'Note sur 5',
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Contenu du message',
            ])
            ->add('publishedAt', DateTimeType::class, [
                'label' => 'Date de publication',
            ])
            ->add('isApproved', CheckboxType::class, [
                'label' => 'Approuvé',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reviews::class,
        ]);
    }
}
