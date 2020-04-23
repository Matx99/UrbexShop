<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // product 1
        $category = new Category();
        $category->setName('categorie1')
                    ->setDescription('blabla');
        
        $manager->persist($category);

        $product1 = new Product();
        $product1->setName('oui')
                ->setDescription('100')
                ->setPrice(7)
                ->setAvailable(0)
                ->setCategory($category);
        $manager->persist($product1);

        // product 2
        $category2 = new Category();
        $category2->setName('categorie2')
                    ->setDescription('bloublou');

        $manager->persist($category2);

        $product2 = new Product();
        $product2->setName('oui')
                ->setDescription('frnektr,ekg,tkLore')
                ->setPrice(700)
                ->setAvailable(1)
                ->setCategory($category2);

        $manager->persist($product2);

        $manager->flush();
    }
}
