<?php

namespace App\Form;

use App\Entity\Utilisateurs;
//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Validator\Constraints\DateTime;

class UtilisateursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', 
                ChoiceType::class, 
                [
                    'choices' => 
                    [
                        'Homme' => 'Mr',
                        'Femme' => 'Me',
                    ],
                        'multiple'=>false,
                        'expanded'=>true,

            ])

           // ['label'=> 'Prenoms : '])
            ->add('nom', TextType::class, 
            ['label'=> 'Noms :'])
            ->add('prenoms', 
                TextType::class, 
                ['label'=> 'Prenoms : '])
            ->add('datenaiss')
            ->add('adresse', TextType::class, ['label'=> 'Adresse : '])
            ->add('email', EmailType::class, ['label'=> 'Email :'])
            ->add('status', 
                ChoiceType::class, 
                [
                    'choices' => 
                    [
                        'Public' => '1',
                        'Archivé' => '0',
                    ],
                        'multiple'=>false,
                        'expanded'=>true,

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}
