<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('maiden_name')
            ->add('mail')
            ->add('adress')
            ->add('zip_code')
            ->add('city')
            ->add('phone_number')
            ->add('content')
            ->add('preferency')
            ->add('created_at')
            ->add('administrativeDepartment')
            ->add('babysittingService')
            ->add('housekeeping')
            ->add('personalAssistanceService')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
