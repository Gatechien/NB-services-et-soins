<?php

namespace App\Form;

use App\Entity\Recruitment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecruitmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('title_description', TextType::class, [
                'label' => 'Titre descriptif '
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description '
            ])
            ->add('title_description2', TextType::class, [
                'label' => 'Titre descriptif2 '
            ])
            ->add('description2', TextareaType::class, [
                'label' => 'Description2 '
            ])
            ->add('title_description3', TextType::class, [
                'label' => 'Titre descriptif3 '
            ])
            ->add('description3', TextareaType::class, [
                'label' => 'Description3 '
            ])
            ->add('we_search', TextareaType::class, [
                'label' => 'Nous recherchons '
            ])
            ->add('avantage', TextareaType::class, [
                'label' => 'Avantage'
            ])
            ->add('licence_requeried', TextareaType::class, [
                'label' => 'Diplôme requis',
               
            ])
            ->add('experience_requeried', TextareaType::class, [
                'label' => 'Expériences  requises'
            ])
            ->add('drive_license', ChoiceType::class, [
                'label' => 'Permis de conduire',
                'choices' => [
                    'Oui' => 1, 
                    'Non' => 0,
                ],
                'expanded' => true,
            ])
            ->add('deplacement_info', TextareaType::class, [
                'label' => 'info sur les déplacement'
            ])
            ->add('type_contrat', TextareaType::class, [
                'label' => 'Type de contrat'
            ])
            ->add('working_hour', TextareaType::class, [
                'label' => 'Horaire de travail'
            ])
            ->add('day_off', TextareaType::class, [
                'label' => 'Jour off'
            ])
            ->add('salary', TextareaType::class, [
                'label' => 'Salaire'
            ])
            ->add('opportunity', TextareaType::class, [
                'label' => 'Opportunité '
            ])
            ->add('published_on', DateTimeType::class, [
                'label' => 'Annonce publié le...',
                'widget' => 'single_text',
                'input' => 'datetime',
            ])
            ->add('visibility', ChoiceType::class, [
                'label' => 'Visibilitée de l\'annonce',
                'choices' => [
                    'Annonce visible' => 1, 
                    'Annonce non-visible' => 0
                ],
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recruitment::class,
        ]);
    }
}
