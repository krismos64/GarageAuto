<?php

namespace App\Form;

use App\Entity\Reviews;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rating', null, [
                'label' => 'Note sur 5', 
                'label_attr' => ['class' => 'white-bold-label'],
            ])
            ->add('content', null, [
                'label' => false, 
                'attr' => ['rows' => 5],
            ])
            ->add('firstname', null, [
                'label' => false, 
            ])
            ->add('lastname', null, [
                'label' => false, 
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reviews::class,
        ]);
    }
}
