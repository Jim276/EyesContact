<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('category'),
            AssociationField::new('supplier'),
            MoneyField::new('price', 'Price')->setCurrency('EUR'),
            TextareaField::new('description'),
            ImageField::new('image_product')
            ->setBasePath('products/')
                ->setUploadDir('public/uploads/products')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true),
            NumberField::new('weight'),
            SlugField::new('slug')->setTargetFieldName('name'),
            DateTimeField::new('creationDate'),
            DateTimeField::new('updateDate'), 
        ];
    }

}
