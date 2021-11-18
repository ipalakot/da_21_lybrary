<?php

namespace App\Form;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', 
                TextType::class, 
                ['label'=> 'Titre'])

            ->add('contenu')
            ->add('categories', EntityType::class, [
                // looks for choices from this entity
                'class' => Categories::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'title',
            
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])

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
