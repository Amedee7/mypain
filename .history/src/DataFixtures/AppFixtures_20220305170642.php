<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use App\Entity\Blogpost;
use App\Entity\Peinture;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;


    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        // utilisation de Faker
        $faker = Factory::create('fr_FR');

        $user = new User();
        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setAPropos($faker->text())
            ->setInstagram('instagram');

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);
        $manager->persist($user);

        //creation de 10 blogposts
        for ($i = 0; $i < 10; $i++) {
            $blogpost = new Blogpost();

            $blogpost->setTitre($faker->words(3, true))
                ->setCreatedAt($faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now')->format('Y-m-d'))
                ->setContenu($faker->text(350))
                ->setSlug($faker->slug(3))
                ->setUser($user);

            $manager->persist($blogpost);
        }


         //creation de 5 categories
         for ($i = 0; $i < 10; $i++) {
            $categorie = new Categorie();

            $categorie->setNom($faker->words())
            ->setDescription($faker->text())
            ->setSlug($faker->slug());

            $manager->persist($categorie);
        
        //creation de 2 peintures/categories
        for ($i = 0; $i < 10; $i++) {
            $peinture = new Peinture();

            $peinture->setNom($faker->words(3, true))
                ->setLargeur($faker->randomFloat(2, 20, 60))
                ->setHauteur($faker->randomFloat(2, 20, 60))
                ->setEnVente($faker->randomElement(true, false))
                ->setDateRealisation($faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now'))
                ->setCreatedAt($faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now'))
                ->setDescription($faker->text())
                ->setPortfolio($faker->randomElement(true, false))
                ->setSlug($faker->slug())
                ->setFile('/img/placeholder.jpg')
                ->addCategorie($categorie)
                ->setPrix($faker->randomFloat(2, 100, 9999))
                ->setUser($user);

            $manager->persist($peinture);
        }


        $manager->flush();
    }
}
