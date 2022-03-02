<?php

namespace App\Tests;

use DateTime;
use App\Entity\User;
use App\Entity\Peinture;
use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class PeintureUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $peinture = new Peinture();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
            ->setLargeur(20.20)
            ->setHauteur(20.20)
            ->setEnVente(true)
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setPrix(20.20)
            ->setUser($user);;

        $this->assertTrue($peinture->getNom() === 'nom');
        $this->assertTrue($peinture->getLargeur() === 20.20);
        $this->assertTrue($peinture->getHauteur() === 20.20);
        $this->assertTrue($peinture->getEnVente() === true);
        $this->assertTrue($peinture->getDateRealisation() === $datetime);
        $this->assertTrue($peinture->getCreatedAt() === $datetime);
        $this->assertTrue($peinture->getDescription() === 'description');
        $this->assertTrue($peinture->getPortfolio() === true);
        $this->assertTrue($peinture->getSlug() === 'slug');
        $this->assertTrue($peinture->getFile() === 'file');
        $this->assertTrue($peinture->getPrix() === 20.20);
        $this->assertContains($categorie, $peinture->getCategories());
    }

    public function testIsfalse()
    {
        $categorie = new Categorie();
        $categorie->setNom('nom')
            ->setDescription('description')
            ->setSlug('slug');

        $this->assertFalse($peinture->getNom() === 'false');
        $this->assertFalse($peinture->getDescription() === 'false');
        $this->assertFalse($peinture->getSlug() === 'false');
    }
    public function testIsEmpty()
    {
        $categorie = new categorie();

        $this->assertEmpty($peinture->getNom());
        $this->assertEmpty($peinture->getDescription());
        $this->assertEmpty($peinture->getSlug());
    }
}
