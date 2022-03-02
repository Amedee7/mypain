<?php

namespace App\Tests;

use App\Entity\Blogpost;
use DateTimeImmutable;
use App\Entity\Peinture;
use App\Entity\Commentaire;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $commentaire = new Commentaire();
        $datetime = new DateTimeImmutable();
        $peinture = new Peinture();
        $blogpost = new BlogPost();

        $commentaire->setAuteur('auteur')
            ->setEmail('email@test.com')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setBlogpost($blogpost)
            ->setPeinture($peinture);

        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEmail() === 'email@test.com');
        $this->assertTrue($commentaire->getCreatedAt() === $datetime);
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getBlogpost() === $blogpost);
        $this->assertTrue($commentaire->getPeinture() === $peinture);
    }

    public function testIsfalse()
    {
        $commentaire = new Commentaire();
        $datetime = new DateTimeImmutable();
        $peinture = new Peinture();
        $blogpost = new BlogPost();

        $commentaire->setAuteur('false')
            ->setEmail('false@test.com')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setBlogpost($blogpost)
            ->setPeinture($peinture);

        $this->assertFalse($commentaire->getAuteur() === 'auteur');
        $this->assertFalse($commentaire->getEmail() === 'email@test.com');
        $this->assertFalse($commentaire->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($commentaire->getContenu() === 'contenu');
        $this->assertFalse($commentaire->getBlogpost() === $blogpost);
        $this->assertFalse($commentaire->getPeinture() === $peinture);
    }

    public function testIsEmpty()
    {
        $commentaire = new Commentaire();

        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEmail());
        $this->assertEmpty($commentaire->getCreatedAt());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getBlogpost());
        $this->assertEmpty($commentaire->getPeinture());
    }
}
