<?php

namespace App\Form;

use App\Entity\Articles;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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

            ->add('contenu')

            ->add('date',            
                DateType::class, 
                ['label'=> 'Date'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
    
}
