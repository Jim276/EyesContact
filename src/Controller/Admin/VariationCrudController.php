<?php

namespace App\Controller\Admin;

use App\Entity\Variation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class VariationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Variation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('product_id'),
            TextEditorField::new('type'),
            TextEditorField::new('value'),
        ];
    }
    
}
