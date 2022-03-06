<?php

namespace App\DataFixtures;

use App\Entity\Blogpost;
use Faker\Factory;
use App\Entity\User;
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

            $blogpost->setTitre($faker->word(3, true))
                ->setcreatedAt($faker->dateTimeBetween('-6 mouth', 'now'))
                ->setContenu($faker->text(350))
                ->setSlug($faker->slug(3));
        }

        $manager->flush();
    }
}
