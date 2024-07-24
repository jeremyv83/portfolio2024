<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }

    // Ici pour paramètrer les input dans le crud, donc directement dans la page add projet
    
    public function configureFields(string $pageName): iterable
    {
        // return [
        //     IdField::new('id')->hideOnForm(),
        //     TextField::new('name', 'Nom du projet'),
        //     TextField::new('description', 'Description Intro'),
        //     TextEditorField::new('description_2', 'Description du projet')->hideOnIndex(),
        //     TextEditorField::new('description_3', 'Description du projet (après l\'image pour la mise en page)')->hideOnIndex(),
        //     ImageField::new('image', 'Screen de présentation')
        //         ->setBasePath('uploads/images')
        //         ->setUploadDir('public/uploads/images')
        //         ->setUploadedFileNamePattern('[randomhash].[extension]')
        //         ->setRequired(true),
        //     ImageField::new('image_2', 'Screen de présentation')
        //         ->hideOnIndex()
        //         ->setBasePath('uploads/images')
        //         ->setUploadDir('public/uploads/images')
        //         ->setUploadedFileNamePattern('[randomhash].[extension]')
        //         ->setRequired(false),
        //     ImageField::new('image_3', 'Screen de présentation')
        //         ->hideOnIndex()
        //         ->setBasePath('uploads/images')
        //         ->setUploadDir('public/uploads/images')
        //         ->setUploadedFileNamePattern('[randomhash].[extension]')
        //         ->setRequired(false),
        //     DateField::new('date_creation', 'Date de création')->hideOnForm(),
        //     DateField::new('date_modif', 'Date de modification')->hideOnForm(),
        // ];
        // Champs d'image actuels
        $image = ImageField::new('image', 'Screen de présentation')
            ->setBasePath('/uploads/images')
            ->onlyOnIndex();

        $image2 = ImageField::new('image_2', 'Screen de présentation 2')
            ->setBasePath('/uploads/images')
            ->onlyOnIndex();

        $image3 = ImageField::new('image_3', 'Screen de présentation 3')
            ->setBasePath('/uploads/images')
            ->onlyOnIndex();

        $imageFile = ImageField::new('image', 'Screen de présentation')
            ->hideOnIndex()
            ->setUploadDir('public/uploads/images')
            ->setBasePath('/uploads/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('attr', ['data-widget' => 'image-field'])
            ->setRequired(false);  // Rendre le téléchargement facultatif

        $imageFile2 = ImageField::new('image_2', 'Screen de présentation 2')
            ->hideOnIndex()
            ->setUploadDir('public/uploads/images')
            ->setBasePath('/uploads/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('attr', ['data-widget' => 'image-field'])
            ->setRequired(false);

        $imageFile3 = ImageField::new('image_3', 'Screen de présentation 3')
            ->hideOnIndex()
            ->setUploadDir('public/uploads/images')
            ->setBasePath('/uploads/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('attr', ['data-widget' => 'image-field'])
            ->setRequired(false);

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom du projet'),
            TextField::new('description', 'Description Intro'),
            TextEditorField::new('description_2', 'Description du projet')->hideOnIndex(),
            TextEditorField::new('description_3', 'Description du projet (après l\'image pour la mise en page)')->hideOnIndex(),
            $image,
            $image2,
            $image3,
            $imageFile,
            $imageFile2,
            $imageFile3,
            DateField::new('date_creation', 'Date de création')->hideOnForm(),
            DateField::new('date_modif', 'Date de modification')->hideOnForm(),
        ];
    }
}
