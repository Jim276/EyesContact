<?php

namespace App\Controller\Admin;

use App\Entity\Variation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class VariationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Variation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('product'),
            TextEditorField::new('type'),
            TextEditorField::new('value'),
        ];
    }
    
}
