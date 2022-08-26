<?php

namespace App\Controller\Admin;

use App\Entity\Address;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\ColorAttribute;
use App\Entity\Product;
use App\Entity\Variation;
use App\Entity\Order;
use App\Entity\Supplier;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Controller\HomeController;


class DashboardController extends AbstractDashboardController
{


    public function __construct(private AdminUrlGenerator $adminUrlGenerator )
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(UserCrudController::class)->generateUrl();
       return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('EyesContact');
    }

    // public function configureHomeController(): HomeController
    // {
    //     return HomeController::new()
    //         ->setsubTitle('Home');
    // }

    public function configureMenuItems(): iterable
    {
        // Menu du dashboard
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Catégorie', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Fournisseurs ', 'fas fa-list', Supplier::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-list', Order::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Variations de produit', 'fas fa-list', Variation::class);
        yield MenuItem::linkToCrud('Attributs Couleurs', 'fas fa-list', ColorAttribute::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Adresses utilisateur', 'fas fa-list', Address::class);
    }
}
