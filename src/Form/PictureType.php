<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', VichFileType::class, [
                'label' => 'Image'
            ])
            ->add('placeOrder', ChoiceType::class, [
                'placeholder' => 'Choisissez une note entre 1 et 5',
                'choices' => [
                    'null' => null,
                    '1' => 1, 
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => true
            ])
            ->add('updatedAt', DateTimeType::class, [
                'label' => 'Image publié le...',
                'widget' => 'single_text',
                'input' => 'datetime',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}