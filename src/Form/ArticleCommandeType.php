<?php

namespace App\Form;

use App\Entity\ArticleCommande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleCommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qteArt')
            ->add('prixUArt')
            ->add('prixTotalArt')
            ->add('idcmd')
            ->add('idart')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleCommande::class,
        ]);
    }
}
