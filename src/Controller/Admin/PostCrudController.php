<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;


class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['title', 'contend'])
            ->setDefaultSort(['id'=> 'DESC']);
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(), //Solo se vea en el index (se deben impoprtar el campo)
            AssociationField::new('category', 'Categoria'), //Este es el campo relacion y su nueva etiqueta
            TextField::new('title', 'Tiulo'), // en title salga es Titulo
            TextField::new('slug'), //es el campo para mostrar la relacion
            TextEditorField::new('content', 'Contenido de la publicación')->hideOnIndex(), // en el conten salga es contenido de la pubñicacion
        ];      // y con el hideOnIndex es para que se oculte en el index
    }
    
    
}
