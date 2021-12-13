<?php

namespace App\Form;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Auteurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', 
                TextType::class, [
                    'label'=> 'Titre',
                    'attr' => ['placeholder' => 'Titre'],
                ])

            ->add('category', EntityType::class, [
                // Label du champ    
                'label'  => 'Categorie',
                'placeholder' => 'Categorie',
        
                // looks for choices from this entity
                'class' => Categories::class,
            
                // Sur quelle propriete je fais le choix
                'choice_label' => 'titre',
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                //'expanded' => true,
            ])
        
            ->add('auteurs', EntityType::class, [
                // Label du champ    
                'label'  => 'Auteurs',
                'placeholder' => 'Auteurs',
        
                // looks for choices from this entity
                'class' => Auteurs::class,
            
                // Sur quelle propriete je fais le choix
                'choice_label' => 'noms',
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                //'expanded' => true,
            ])
        
            ->add('resume', 
                TextareaType::class, [
                    'label'=> 'Resume',
                    'attr' => ['placeholder' => 'Un resumé pour cet article'],
                ])


            ->add('contenu', 
                TextareaType::class, [
                    'label'=> 'Contenu',
                    'attr' => ['placeholder' => 'Contenu '],
                ])

            ->add('date',            
                DateType::class, 
                ['label'=> 'Date'])


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
            'data_class' => Articles::class,
        ]);
    }
    
}
