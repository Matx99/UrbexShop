<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // categories
        $categoryMasques = new Category();
        $categoryMasques->setName('Masques')
                    ->setDescription('Des masques pour vos explorations les plus folles !')
                    ->setMedia('//cdn.shopify.com/s/files/1/0086/9341/5972/collections/urban-1513868_1280_420x.jpg?v=1574636270')
                    ->setMediaAlt('Masques Urbex');
        $manager->persist($categoryMasques);

        $categoryLampes = new Category();
        $categoryLampes->setName('Lampes')
                    ->setDescription("On se retrouve souvent dans le noir, alors rien de tel qu'une lampe frontale !")
                    ->setMedia('//cdn.shopify.com/s/files/1/0086/9341/5972/collections/HTB1DVvmaI_vK1Rjy0Foq6xIxVXal_420x.jpg?v=1574636541')
                    ->setMediaAlt('Lampes Urbex');
        $manager->persist($categoryLampes);

        $categoryVetements = new Category();
        $categoryVetements->setName('Vêtements')
                    ->setDescription('Faire de l\'Urbex c\'est bien, mais avec du style c\'est encore mieux !')
                    ->setMedia('//cdn.shopify.com/s/files/1/0086/9341/5972/collections/Vetement_urbex_420x.jpg?v=1574636563')
                    ->setMediaAlt('Vêtements Urbex');
        $manager->persist($categoryVetements);

        $manager->flush();

        // produits categorie masques
        $product = new Product();
        $product->setName('Masque a Gaz Urbex 3M 6200')
                ->setDescription("Partez à la conquête de l'Urbex en toute sécurité avec ce Masque à Gaz Urbex 3M 6200 professionnel par Urbex-Boutique ! Explorez et protégez vous avec ce masque respiratoire.")
                ->setPrice(79.90)
                ->setAvailable(0)
                ->setCategory($categoryMasques)
                ->setMedia('https://urbexsession.com/wp-content/uploads/2013/12/masque-gaz.jpg')
                ->setMediaAlt('Masque a Gaz Urbex 3M 6200');
        $manager->persist($product);
        $manager->flush();

        $product = new Product();
        $product->setName('Masque à gaz militaire français 2.0')
                ->setDescription("Partez à la conquête de l'exploration urbaine en toute sécurité avec ce masque à gaz militaire par Urbex-Boutique ! Restez dans l'anonymat et protégez vous avec ce masque respiratoire.")
                ->setPrice(49.90)
                ->setAvailable(1)
                ->setCategory($categoryMasques)
                ->setMedia('https://cdn.shopify.com/s/files/1/0086/9341/5972/products/HLB1.gRuaK6sK1RjSsrbq6xbDXXao_0daa1028-743f-49de-aa12-7cf496b20090_1200x1200.jpg?v=1575293107')
                ->setMediaAlt('Masque à gaz militaire français 2.0');
        $manager->persist($product);
        $manager->flush();

        $product = new Product();
        $product->setName('Masque à Gaz Intégral Chimique')
                ->setDescription("Masque à Gaz identique 3M 6800 de qualité professionnelle. Idéal pour vos explorations urbaines dans des lieux abandonnés avec ou sans risque chimique.")
                ->setPrice(64.90)
                ->setAvailable(1)
                ->setCategory($categoryMasques)
                ->setMedia('https://cdn.shopify.com/s/files/1/0086/9341/5972/products/product-image-819292586_720x.jpg?v=1584373209')
                ->setMediaAlt('Masque à Gaz Intégral Chimique');
        $manager->persist($product);
        $manager->flush();

        // produits categorie lampes
        $product = new Product();
        $product->setName('Lampe Frontale 30000 Lumens')
                ->setDescription("Equipe toi de cette Lampe Frontale 30000 Lumens et explore les lieux urbains de nuit sans te soucier de la visibilité! Avec cette puissante lampe LED la nuit te paraîtra lumineuse comme la journée.")
                ->setPrice(59.90)
                ->setAvailable(1)
                ->setCategory($categoryLampes)
                ->setMedia('https://images-na.ssl-images-amazon.com/images/I/615XZmdLWML._AC_SX522_.jpg')
                ->setMediaAlt('Lampe Frontale 30000 Lumens');
        $manager->persist($product);
        $manager->flush();

        $product = new Product();
        $product->setName('Lampe frontale professionnelle')
                ->setDescription("Enfile cette Lampe Frontale Profesionnelle Urbex et visite l'Urbex de nuit sans te soucier de la visibilité! Avec cette lampe professionnelle la nuit te paraîtra lumineuse comme le jour.")
                ->setPrice(39.90)
                ->setAvailable(1)
                ->setCategory($categoryLampes)
                ->setMedia('https://cdn.shopify.com/s/files/1/0086/9341/5972/products/Lampe_Frontale_Profesionnelle_Urbex_720x.png?v=1573656062')
                ->setMediaAlt('Lampe frontale professionnelle');
        $manager->persist($product);
        $manager->flush();

        $product = new Product();
        $product->setName('Lampe torche UV led pour exploration urbaine')
                ->setDescription("En quête d'empreintes ? Cette Lampe Torche UV LED pour Exploration Urbaine sera ton accessoire favori pour tes sessions d'Urbex.")
                ->setPrice(17.90)
                ->setAvailable(1)
                ->setCategory($categoryLampes)
                ->setMedia('https://cdn.shopify.com/s/files/1/0086/9341/5972/products/HTB1HbvyX6LuK1Rjy0Fhq6xpdFXaR_1f201e7e-c628-4f05-ab59-7ec7391599c9_360x.jpg?v=1573671950')
                ->setMediaAlt('Lampe torche UV led pour exploration urbaine');
        $manager->persist($product);
        $manager->flush();

        // produits categorie vêtements
        $product = new Product();
        $product->setName('T-Shirt urban explorers')
                ->setDescription("Fais connaître ta passion d'exploration urbaine autour de toi avec ce T-shirt Urbex Urban Explorers.")
                ->setPrice(24.90)
                ->setAvailable(1)
                ->setCategory($categoryVetements)
                ->setMedia('https://images-na.ssl-images-amazon.com/images/I/615XZmdLWML._AC_SX522_.jpg')
                ->setMediaAlt('T-Shirt urban explorers');
        $manager->persist($product);
        $manager->flush();

        $product = new Product();
        $product->setName('Casquette militaire américaine')
                ->setDescription("Camoufle-toi dans la nature avec cette casquette militaire.")
                ->setPrice(24.90)
                ->setAvailable(1)
                ->setCategory($categoryVetements)
                ->setMedia('https://cdn.shopify.com/s/files/1/0086/9341/5972/products/HTB1RrZ1SFXXXXbPXFXXq6xXFXXXy_c298a64b-d0bd-45f5-9e77-205e16334834_360x.jpg?v=1573862685')
                ->setMediaAlt('Casquette militaire américaine');
        $manager->persist($product);
        $manager->flush();

        $product = new Product();
        $product->setName('Gants tactiques')
                ->setDescription("Rien de tel que des gants tactiques pour protéger ses mains.")
                ->setPrice(29.90)
                ->setAvailable(1)
                ->setCategory($categoryVetements)
                ->setMedia('https://cdn.shopify.com/s/files/1/0086/9341/5972/products/Hc73a315357a543f68ace0e6983d496afp_360x.jpg?v=1573864189')
                ->setMediaAlt('Gants tactiques');
        $manager->persist($product);
        $manager->flush();
        
    }
}
